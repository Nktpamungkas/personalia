<?php

defined('BASEPATH') or exit('No direct script access allowed');

//load package composer
require 'vendor/autoload.php';

//deklarasi package yang ingin digunakan
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UploadDataTraining extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', array('name' => $this->session->userdata('name')))->row_array();
		$data['tahun'] = 'tahunsekarang';
		$data['title'] = 'Upload and View Excel Data';

		// Ambil data dari session
		$imported_list = $this->session->userdata('imported_list');

		// Kirim $imported_list ke view
		$data['list'] = $imported_list;

		// Memuat view dengan input file di atas dan tabel di bawah
		$this->load->view('template/header', $data);
		$this->load->view('Training/upload_data_training', $data);
		$this->load->view('template/footer');
	}

	public function import()
	{
		// Path directory/folder untuk menyimpan file xls yang di upload
		$path = './assets/temp/files/';

		// Memanggil fungsi import_config() untuk inisialisasi fungsi upload
		$this->upload_config($path);
		if (!$this->upload->do_upload('file')) {
			//jika proses import gagal, set flash message error lalu redirect ke halaman form
			$this->session->set_flashdata(
				'error',
				'Gagal import pastikan format file sesuai'
			);
			redirect('/UploadDataTraining/index');
		} else {
			//get data file yang di upload
			$file_data = $this->upload->data();
			//get full path hingga ke filename
			$file_name = $path . $file_data['file_name'];
			//proses untuk get extension file
			$arr_file = explode('.', $file_name);
			$extension = end($arr_file);
			//cek dan validasi jika file yang di upload ber ekstensi xlsx
			if ($extension == 'xlsx') {
				// jika file xlsx, buat object reader xlsx.
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				// Set flashdata untuk notifikasi error
				$this->session->set_flashdata(
					'error',
					'Hanya bisa format xlsx'
				);
				redirect('/UploadDataTraining/index');
			}
			//proses extrac data yang ada pada file xlsx
			$spreadsheet = $reader->load($file_name);
			$sheet_data = $spreadsheet->getActiveSheet()->toArray();
			$list = [];
			foreach ($sheet_data as $key => $val) {
				if (
					$key != 0 &&
					!empty($val[0])
				) {
					$list[] = [
						'no_scan' => $val[3],
						'nama' => $val[4],
						'kode_training' => $val[0],
						'nama_training' => $val[1],
						'tgl_training' => $val[2],
						'kode_trainer' => $val[11],
						'external_trainer' => $val[12]
					];
				}
			}
			if (file_exists($file_name)) {
				//hapus kembali file, supaya tidak memenuhi server
				unlink($file_name);
			}

			if (count($list) > 0) {
				// Tampilkan array $list
				$this->session->set_userdata('imported_list', $list);
				// echo "<pre>";
				// print_r($list);
				// echo "</pre>";
				redirect('/UploadDataTraining/index');
			} else {
				// Set flashdata untuk notifikasi sukses
				$this->session->set_flashdata(
					'error',
					'Something went wrong'
				);

				redirect('/UploadDataTraining/index');
			}
		}
	}

	public function upload_config($path)
	{
		if (!is_dir($path))
			mkdir($path, 0755, TRUE);
		$config['upload_path'] = './' . $path;
		$config['allowed_types'] = 'xlsx|XLSX|xls|XLS';
		$config['max_filename'] = '255';
		$config['encrypt_name'] = TRUE;
		$config['max_size'] = 4096;
		$this->load->library('upload', $config);
	}

	public function clearList()
	{
		// Hapus data dari session
		$this->session->unset_userdata('imported_list');
		// Redirect kembali ke halaman utama
		redirect('/UploadDataTraining/index');
	}

	public function submitToDatabase()
	{
		// Ambil data dari session
		$list = $this->session->userdata('imported_list');

		// Simpan data ke dalam database
		foreach ($list as $item) {
			// Konversi tanggal dari 'd-M-Y' ke 'Y-m-d'
			// $tgl_training = DateTime::createFromFormat('d/mmm/yy', $item['tgl_training'])->format('Y-m-d');
			$timestamp = strtotime($item['tgl_training']);
			if ($timestamp) {
				$tgl_training = date('Y-m-d', $timestamp);
				echo $tgl_training;
			} else {
				echo "Format tanggal salah: " . $item['tgl_training'];
			}

			// Data yang akan disimpan ke database
			$data = [
				'no_scan' => $item['no_scan'],
				'kode_training' => $item['kode_training'],
				'tgl_training' => $tgl_training,
				'trainer' => $item['kode_trainer'],
				'external_trainer' => $item['external_trainer']
			];

			// Lakukan proses penyimpanan data ke database
			$this->db->insert('tbl_training', $data);
		}

		// Hapus data dari session setelah disimpan ke database
		$this->session->unset_userdata('imported_list');

		// Set flashdata untuk notifikasi sukses
		$this->session->set_flashdata(
			'success',
			'Data berhasil disimpan ke database.'
		);

		// Redirect kembali ke halaman utama
		redirect('/UploadDataTraining/index');
	}

	// public function submitToDatabase()
	// {
	//     // Ambil data dari session
	//     $list = $this->session->userdata('imported_list');


	//     echo "<pre>";
	//     print_r($list);
	//     echo "</pre>";

	//     // // Simpan data ke dalam database (gunakan fungsi yang sesuai)
	//     // foreach ($list as $item) {
	//     //     // Lakukan proses penyimpanan data ke database, contoh:
	//     //     $this->db->insert('tbl_training', $item);
	//     // }

	//     // // Hapus data dari session setelah disimpan ke database
	//     // $this->session->unset_userdata('imported_list');

	//     // // Redirect kembali ke halaman utama
	//     // redirect('/UploadDataTraining/index');
	// }
}