<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
<script type="text/javascript">
function searchsisacuti() {
    document.getElementById("Button").disabled = false
    var _no_scan = document.getElementById('no_scan').value;
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    var _yyyy = yyyy - 1;
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;

    $.ajax({
        type: 'POST',
        url: '<?= base_url() . "pci/search_noscan" ?>/' + _no_scan + '/' + _yyyy,
        dataType: 'json',
        success: function(data) {
            document.getElementById('pemohon_nama').value = data[0].nama;
            document.getElementById('pemohon_jabatan').value = data[0].jabatan;
            if (data[0].status_karyawan == "Tetap") {
                const awal = new Date(data[0].periode_awal)
                var ye_awal = new Intl.DateTimeFormat('en', {
                    year: 'numeric'
                }).format(awal)
                var mo_awal = new Intl.DateTimeFormat('en', {
                    month: '2-digit'
                }).format(awal)
                var da_awal = new Intl.DateTimeFormat('en', {
                    day: '2-digit'
                }).format(awal)

                const akhir = new Date(data[0].periode_akhir)
                var ye_akhir = new Intl.DateTimeFormat('en', {
                    year: 'numeric'
                }).format(akhir)
                var mo_akhir = new Intl.DateTimeFormat('en', {
                    month: '2-digit'
                }).format(akhir)
                var da_akhir = new Intl.DateTimeFormat('en', {
                    day: '2-digit'
                }).format(akhir)

                // if (ye_awal != ye_akhir ) { // jika tahun awal dan tahun akhir TIDAK SAMA dan dari bulan Januari(1) - Juni(6)
                //     if(ye_awal == yyyy){
                //         var ye_awal = yyyy + 1
                //         var ye_akhir = yyyy + 1
                //     } else {
                //         if(data[0].awal_number == '1' || data[0].awal_number == '2' || data[0].awal_number == '3' || data[0].awal_number == '4' || data[0].awal_number == '5' || data[0].awal_number == '6'){
                //             var ye_awal = yyyy
                //             var ye_akhir = ye_awal + 1
                //         }else{
                //             var ye_awal = yyyy
                //             var ye_akhir = ye_awal + 1
                //         }
                //     }
                // } else if (ye_awal == ye_akhir) { // jika tahun awal dan tahun akhir SAMA dan dari bulan Januari(1) - Juni(6)
                //     if(ye_awal == yyyy){
                //         var ye_awal = yyyy + 1
                //         var ye_akhir = yyyy + 1
                //     } else {
                //         var ye_awal = yyyy
                //         var ye_akhir = ye_awal
                //     }
                // }
                // else if (ye_awal == ye_akhir) { //jika tahun awal dan tahun akhir SAMA dan dari bulan juli(7) - Desember(12)
                //     if(ye_awal == yyyy){
                //         var ye_awal = yyyy + 1
                //         var ye_akhir = yyyy + 1
                //     } else {
                //         var ye_awal = yyyy 
                //         var ye_akhir = ye_awal + 1
                //     }
                // }
                // else if (ye_awal != ye_akhir){ // jika tahun awal dan tahun akhir TIDAK SAMA dan dari bulan juli(7) - Desember(12)
                //     if(ye_awal == yyyy){
                //         var ye_awal = yyyy + 1
                //         var ye_akhir = yyyy + 1
                //     } else {
                //         var ye_awal = yyyy - 1
                //         var ye_akhir = ye_awal + 1
                //     }
                // }

                if (data[0].gaji == "atas") {
                    document.getElementById('sisa_cuti').innerHTML = "Sisa cuti karyawan sebanyak <b>" +
                        data[0].sisa_cuti + " Hari.</b> Periode pengambilan cuti yaitu bulan <b>" +
                        da_awal + '-' + mo_awal + '-' + ye_awal + "</b> s/d bulan <b>" + da_akhir + '-' +
                        mo_akhir + '-' + ye_akhir +
                        ".</b> Diluar periode bulan yang sudah ditentukan, maka cuti tidak berlaku (ganti keterangan menjadi izin)."
                    document.getElementById("tgl_mulai").setAttribute("min", "");

                    document.getElementById("tgl_mulai").setAttribute("max", "");

                    document.getElementById("tgl_selesai").setAttribute("min", "");
                    document.getElementById("tgl_selesai").setAttribute("max", "");
                } else {
                    if (data[0].tahun_tetap ==
                        yyyy
                    ) { //Jika tanggal pengangkatan ditahun yang sama, maka tidak bisa mengambil cuti
                        document.getElementById('sisa_cuti').innerHTML =
                            "Karyawan belum dapat mengambil hak cuti, minimal 1 tahun setelah tanggal karyawan tetap."

                        $('#tgl_mulai').attr('readonly', true);
                        $('#tgl_selesai').attr('readonly', true);
                    } else {
                        if (data[0].sisa_cuti) {
                            if (data[0].thn_generate ==
                                yyyy) { // jika sudah digenerate, periode cuti ditahun berikutnya
                                if (mo_akhir >= 2) {
                                    var ye_awal = yyyy
                                    var ye_akhir = ye_awal + 1
                                } else {
                                    var ye_awal = yyyy
                                    var ye_akhir = ye_awal + 1
                                }
                                console.log("a")

                                document.getElementById("tgl_mulai").setAttribute("min", ye_awal + '-' +
                                    mo_awal + '-' + da_awal);
                                document.getElementById("tgl_mulai").setAttribute("max", ye_akhir + '-' +
                                    mo_akhir + '-' + da_akhir);

                                console.log(ye_awal + '-' + mo_awal + '-' + da_awal)
                                console.log(ye_akhir + '-' + mo_akhir + '-' + da_akhir)

                                document.getElementById("tgl_selesai").setAttribute("min", ye_awal + '-' +
                                    mo_awal + '-' + da_awal);
                                document.getElementById("tgl_selesai").setAttribute("max", ye_akhir + '-' +
                                    mo_akhir + '-' + da_akhir);

                                document.getElementById('sisa_cuti').innerHTML =
                                    "Sisa cuti karyawan sebanyak <b>" + data[0].sisa_cuti +
                                    " Hari.</b> Periode pengambilan cuti yaitu bulan <b>" + da_awal + '-' +
                                    mo_awal + '-' + ye_awal + "</b> s/d bulan <b>" + da_akhir + '-' +
                                    mo_akhir + '-' + ye_akhir +
                                    ".</b> Diluar periode bulan yang sudah ditentukan, maka cuti tidak berlaku (ganti keterangan menjadi izin)."

                            } else { // jika belum digenerate, periode cuti ditahun sebelumnya
                                if (mo_akhir >= 2) {
                                    var ye_awal = yyyy - 1
                                    var ye_akhir = ye_awal + 1
                                } else {
                                    var ye_awal = yyyy
                                    var ye_akhir = ye_awal + 1
                                }
                                console.log("b")

                                document.getElementById("tgl_mulai").setAttribute("min", ye_awal + '-' +
                                    mo_awal + '-' + da_awal);
                                document.getElementById("tgl_mulai").setAttribute("max", ye_akhir + '-' +
                                    mo_akhir + '-' + da_akhir);

                                console.log(ye_awal + '-' + mo_awal + '-' + da_awal)
                                console.log(ye_akhir + '-' + mo_akhir + '-' + da_akhir)

                                document.getElementById("tgl_selesai").setAttribute("min", ye_awal + '-' +
                                    mo_awal + '-' + da_awal);
                                document.getElementById("tgl_selesai").setAttribute("max", ye_akhir + '-' +
                                    mo_akhir + '-' + da_akhir);

                                document.getElementById('sisa_cuti').innerHTML =
                                    "Sisa cuti karyawan sebanyak <b>" + data[0].sisa_cuti +
                                    " Hari.</b> Periode pengambilan cuti yaitu bulan <b>" + da_awal + '-' +
                                    mo_awal + '-' + ye_awal + "</b> s/d bulan <b>" + da_akhir + '-' +
                                    mo_akhir + '-' + ye_akhir +
                                    ".</b> Diluar periode bulan yang sudah ditentukan, maka cuti tidak berlaku (ganti keterangan menjadi izin)."
                                var _lama_izin = document.getElementById('lama_izin').value;
                            }
                        } else {
                            document.getElementById('sisa_cuti').innerHTML =
                                "SILAHKAN HUBUNGI WATI/INDAH UNTUK MELIHAT SISA CUTI.."
                        }
                    }
                    // if (data[0].sisa_cuti <= 7) {
                    //     document.getElementById("Button").disabled = true;
                    // }else{
                    //     document.getElementById("Button").disabled = false;
                    // }

                    // Ambil nilai sisa cuti dari data
                    var sisaCuti = data[0].sisa_cuti;
                    var gajiatas = data[0].gaji == "atas"
                    var noscan = document.getElementById('no_scan').value;
                    // Ambil nilai tanggal_tetap dari data (gantilah 'tanggal_tetap' dengan properti yang sesuai)
                    var tgl_generate_cuti = new Date(data[0].tgl_generate_cuti);

                    // Tanggal target (10 April 2024)
                    var targetDate = new Date("2024-05-10");

                    // Periksa kondisi untuk tombol saimpan cuti
                    //     if (sisaCuti <= 0 || satuTahunKemudian <= targetDate) {
                    //         document.getElementById("Button").disabled = true; // Tombol dinonaktifkan
                    //     } else if (sisaCuti <= 0 && satuTahunKemudian <= targetDate) {
                    //         document.getElementById("Button").disabled = true; // Tombol dinonaktifkan
                    //     } else if (sisaCuti <= 0 && satuTahunKemudian >= targetDate) {
                    //         document.getElementById("Button").disabled = true; // Tombol dinonaktifkan
                    //     }else if (sisaCuti <= 4 && satuTahunKemudian >= targetDate) {
                    //         document.getElementById("Button").disabled = true; // Tombol dinonaktifkan
                    //     } else if (sisaCuti <= 4 && satuTahunKemudian <= targetDate) {
                    //         document.getElementById("Button").disabled = false; // Tombol diaktifkan
                    //     }else   if (sisaCuti >= 0  && gajiatas === "atas") {
                    //         document.getElementById("Button").disabled = false; // Tombol diaktifkan    
                    //     }else if (sisaCuti <= 0  && gajiatas === "atas") {
                    //         document.getElementById("Button").disabled = true; // Tombol dinonaktifkan
                    //    } else {
                    //         document.getElementById("Button").disabled = false; // Tombol diaktifkan
                    //     }
                    var tgl_generate_cuti_final;

                    // Mendapatkan tahun dan bulan dari tgl_generate_cuti dan targetDate
                    var yearTglGenerate = tgl_generate_cuti.getFullYear();
                    var monthTglGenerate = tgl_generate_cuti.getMonth();
                    var yearTarget = targetDate.getFullYear();
                    var monthTarget = targetDate.getMonth();

                    // Membuat kondisi
                    if (yearTglGenerate <= yearTarget && monthTglGenerate <= monthTarget) {
                        // Tanggal generate cuti tidak perlu ditambah satu tahun
                        tgl_generate_cuti_final = tgl_generate_cuti;
                    } else {
                        // Tambahkan satu tahun ke tanggal generate cuti
                        var newYear = yearTglGenerate + 1;
                        tgl_generate_cuti_final = new Date(newYear, monthTglGenerate, tgl_generate_cuti
                            .getDate());
                    }

                    if (sisaCuti <= 0 && tgl_generate_cuti_final <= targetDate) {
                        document.getElementById("Button").disabled = true; // Tombol dinonaktifkan
                    } else if (sisaCuti <= 0 && tgl_generate_cuti_final <= targetDate) {
                        document.getElementById("Button").disabled = false; // Tombol diaktifkan
                    } else if (sisaCuti <= 0 && tgl_generate_cuti_final >= targetDate) {
                        document.getElementById("Button").disabled = true; // Tombol dinonaktifkan
                    } else if (sisaCuti >= 0 && gajiatas === "atas") {
                        document.getElementById("Button").disabled = false; // Tombol diaktifkan    
                    } else if (sisaCuti <= 0 && gajiatas === "atas") {
                        document.getElementById("Button").disabled = true; // Tombol dinonaktifkan
                    } else {
                        document.getElementById("Button").disabled = false; // Tombol diaktifkan
                    }


                }
            } else {
                document.getElementById("tgl_mulai").setAttribute("min", "");
                document.getElementById("tgl_mulai").setAttribute("max", "");
                document.getElementById("tgl_selesai").setAttribute("min", "");
                document.getElementById("tgl_selesai").setAttribute("max", "");

                document.getElementById('sisa_cuti').innerHTML = "Karyawan belum mandapatkan hak cuti."
                document.getElementById("Button").disabled = true;
            }
        }
    });
}

function searchsisacuti_disabled() {
    var _no_scan = document.getElementById('no_scan').value;
    var today = new Date();
    var yyyy = today.getFullYear();
    $.ajax({
        type: 'POST',
        url: '<?= base_url() . "pci/search_noscan" ?>/' + _no_scan + '/' + yyyy,
        dataType: 'json',
        success: function(data) {
            document.getElementById('pemohon_nama').value = data[0].nama;
            document.getElementById('pemohon_jabatan').value = data[0].jabatan;
            // document.getElementById('pemohon_role_id').value = data[0].role_id;
            document.getElementById('atasan1').value = data[0].nama_atasan;
            document.getElementById('jabatan_atasan').value = data[0].jabatan_atasan;
            // document.getElementById('no_scan_atasan').value = data[0].no_scan_atasan;/
            document.getElementById('atasan2').value = data[0].nama_atasan2;
            document.getElementById('jabatan_atasan2').value = data[0].jabatan2;
            // document.getElementById('no_scan_atasan2').value = data[0].no_scan2;
            //
            document.getElementById("tgl_mulai").setAttribute("min", "");
            document.getElementById("tgl_mulai").setAttribute("max", "");
            document.getElementById("tgl_selesai").setAttribute("min", "");
            document.getElementById("tgl_selesai").setAttribute("max", "");
            document.getElementById('sisa_cuti').innerHTML = " "
        }
    });
}

function search_atasan() {
    var _no_scan = document.getElementById('no_scan').value;
    var today = new Date();
    var yyyy = today.getFullYear();
    $.ajax({
        type: 'POST',
        url: '<?= base_url() . "pci/search_noscan" ?>/' + _no_scan + '/' + yyyy,
        dataType: 'json',
        success: function(data) {
            document.getElementById('pemohon_role_id').value = data[0].role_id;
            document.getElementById('disetujui_nama_1').value = data[0].nama_atasan;
            document.getElementById('disetujui_jabatan_1').value = data[0].jabatan_atasan;
            document.getElementById('no_scan_atasan').value = data[0].no_scan_atasan;
            document.getElementById('disetujui_nama_2').value = data[0].nama_atasan2;
            document.getElementById('disetujui_jabatan_2').value = data[0].jabatan2;
            document.getElementById('no_scan_atasan2').value = data[0].no_scan2;

        }
    });
}


function keterangan() {
    var _ket = document.getElementById('ket').value;

    $.ajax({
        type: 'POST',
        url: '<?= base_url() . "pci/search_cuti" ?>/' + _ket,
        dataType: 'json',
        success: function(data) {
            if (_ket == "B03") { //mangkir
                $('#disetujui_nama_1').attr('readonly', true);
                $('#disetujui_nama_2').attr('readonly', true);
                $('#mengetahui_nama').attr('readonly', true);
                $('#disetujui_jabatan_1').attr('readonly', true);
                $('#disetujui_jabatan_2').attr('readonly', true);
                $('#mengetahui_jabatan').attr('readonly', true);
                $('#tgl_diset_mengetehui').attr('readonly', true);
            } else {
                $('#disetujui_nama_1').removeAttr("readonly");
                $('#disetujui_nama_2').removeAttr("readonly");
                $('#mengetahui_nama').removeAttr("readonly");
                $('#disetujui_jabatan_1').removeAttr("readonly");
                $('#disetujui_jabatan_2').removeAttr("readonly");
                $('#mengetahui_jabatan').removeAttr("readonly");
                $('#tgl_diset_mengetehui').removeAttr("readonly");
            }
            if (_ket == "A05") { //pernikahan karyawan
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A06") { //pernikahan anak karyawan
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A07") { //khitanan anak karyawan
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A08") { //istri melahirkan / keguguran
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A09") { //cuti baptis
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A10") { //keluarga inti meninggal
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A11") { //saudara meninggal
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A12") { //keluarga serumah meninggal
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A02") { //cuti melahurkan
                $('#lama_izin').attr('readonly', true);
                $('#days_or_month').attr('readonly', true);
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A01") { //cuti tahunan
                $('#lama_izin').removeAttr("readonly");
                $('#days_or_month').removeAttr("readonly");
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = false;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti();
                search_atasan();
            } else if (_ket == "A13") { //izin dispensasi
                $('#lama_izin').removeAttr("readonly");
                $('#days_or_month').removeAttr("readonly");
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A14") { //sakit dengan surat dokter
                $('#lama_izin').removeAttr("readonly");
                $('#days_or_month').removeAttr("readonly");
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "B03") { //mangkir
                $('#lama_izin').removeAttr("readonly");
                $('#days_or_month').removeAttr("readonly");
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "B01") { //izin pribadi
                $('#lama_izin').removeAttr("readonly");
                $('#days_or_month').removeAttr("readonly");
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "B02") { //izin tanpan surat dokterr
                $('#lama_izin').removeAttr("readonly");
                $('#days_or_month').removeAttr("readonly");
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').required = false;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').required = false;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').required = false;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').required = false;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').required = false;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').required = false;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').required = false;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'block';
                document.getElementById('disetujui_label').style.display = 'block';
                searchsisacuti_disabled();
                search_atasan();
            } else if (_ket == "A15") { //perjalanan dinas
                $('#lama_izin').removeAttr("readonly");
                $('#days_or_month').removeAttr("readonly");
                $('#tgl_mulai').removeAttr("readonly");
                $('#tgl_selesai').removeAttr("readonly");
                document.getElementById('lama_izin').value = null;
                document.getElementById("Button").disabled = false;
                document.getElementById('disetujui_nama_1').disabled = true;
                document.getElementById('disetujui_nama_1').type = 'text'
                document.getElementById('disetujui_jabatan_1').disabled = true;
                document.getElementById('disetujui_jabatan_1').type = 'text'
                document.getElementById('disetujui_nama_2').disabled = true;
                document.getElementById('disetujui_nama_2').type = 'text'
                document.getElementById('disetujui_jabatan_2').disabled = true;
                document.getElementById('disetujui_jabatan_2').type = 'text'
                document.getElementById('mengetahui_nama').disabled = true;
                document.getElementById('mengetahui_nama').type = 'hidden'
                document.getElementById('mengetahui_jabatan').disabled = true;
                document.getElementById('mengetahui_jabatan').type = 'hidden'
                document.getElementById('tgl_diset_mengetehui').disabled = true;
                document.getElementById('tgl_diset_mengetehui').type = 'hidden'
                document.getElementById('mengetahui_label').style.display = 'none';
                document.getElementById('disetujui_label').style.display = 'none';
                document.getElementById('alasan').placeholder = 'Alasan Dinaas Minimal 30 karakter.';
                searchsisacuti_disabled();
                search_atasan();
            }
        }
    });
}

$(document).ready(function() {
    $('#no_scan').change(function() {
        var ket = document.getElementById('ket').value;
        if (ket) {
            keterangan();
        } else {
            alert("SILAHKAN ISI KETERANGAN TERLEBIH DAHULU.")
        }
    });

    $('#ket').change(function() {
        keterangan()
    });

    $('#tgl_mulai').change(function() {
        var _lama_izin = document.getElementById('lama_izin').value;
        var _days_or_month = document.getElementById('days_or_month').value;

        if (_lama_izin == 1) {
            if (_days_or_month == "Hari") {
                $('#tgl_selesai').attr('readonly', true);
                document.getElementById('tgl_selesai').value = document.getElementById('tgl_mulai')
                    .value;
            } else {
                $('#tgl_selesai').removeAttr("readonly");
            }
        } else {
            $('#tgl_selesai').removeAttr("readonly");
        }
    });

    $('#lama_izin').change(function() {
        var _lama_izin = document.getElementById('lama_izin').value;
        var _days_or_month = document.getElementById('days_or_month').value;
        var _no_scan = document.getElementById('no_scan').value;

        if (_lama_izin == 1) {
            if (_days_or_month == "Hari") {
                $('#tgl_selesai').attr('readonly', true);
                document.getElementById('tgl_selesai').value = document.getElementById('tgl_mulai')
                    .value;
            } else {
                $('#tgl_selesai').removeAttr("readonly");
            }
        } else {
            $('#tgl_selesai').removeAttr("readonly");
        }

        if (document.getElementById('ket').value == "A01") {
            $.ajax({
                type: 'POST',
                url: '<?= base_url() . "pci/search_noscan" ?>/' + _no_scan,
                dataType: 'json',
                success: function(data) {
                    if (parseFloat(data[0].sisa_cuti) < parseFloat(_lama_izin)) {
                        alert("Jumlah cuti tidak boleh melebihi sisa cuti.")
                        document.getElementById('lama_izin').value = data[0].sisa_cuti;
                    }
                }
            });
        }
    });

    $('#days_or_month').change(function() {
        var _lama_izin = document.getElementById('lama_izin').value;
        var _days_or_month = document.getElementById('days_or_month').value;

        if (_lama_izin == 1) {
            if (_days_or_month == "Hari") {
                $('#tgl_selesai').attr('readonly', true);
                document.getElementById('tgl_selesai').value = document.getElementById('tgl_mulai')
                    .value;
            } else {
                $('#tgl_selesai').removeAttr("readonly");
            }
        } else {
            $('#tgl_selesai').removeAttr("readonly");
        }
    });
});
</script>
<section id="main-content">
    <sect class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <!-- <div class="col-lg-12" style="color: red;">
				<CENTER><h3><b>HALAMAN SEDANG DALAM PERBAIKAN <u>PERIODE CUTI</u></b></h3></CENTER>
			</div> -->
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('pci'); ?>"> Time Attendance </a><i
                        class="fa fa-angle-right"></i> <a href="<?= base_url('pci'); ?>"> Form Izin Cuti </a><i
                        class="fa fa-angle-right"></i> Add Form Izin Cuti</h4>
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form"
                            action="<?= base_url('pci/add/') . $user['name']; ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Kode Cuti</label>
                                <div class="col-lg-10">
                                    <label class="control-label col-lg-4"><b>FIC-YYYYMMDD-XXXXXXX</b></label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Keterangan</label>
                                <div class="col-lg-2">
                                    <select name="ket" class="form-control input-sm" id="ket">
                                        <option value="" disabled selected>-Pilih Keterangan-</option>
                                        <?php
										$queryCuti = $this->db->query("SELECT * FROM cuti")->result_array();
										?>
                                        <?php foreach ($queryCuti as $dc): ?>
                                        <option value="<?= $dc['kode_cuti'] ?>" <?php if ($dc['kode_cuti'] == set_value('ket')) {
												  echo "SELECTED";
											  } ?>>
                                            <?= $dc['cuti']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="control-label col-lg-12" style="color: #26b72b;"><b><i>Note: *Cuti
                                                Khusus: tidak memotong cuti tahunan.</i></b></label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">NIP</label>
                                <div class="col-lg-10">
                                    <input type="hidden" name="dept" value="<?= $user['dept']; ?>">
                                    <select class="form-control input-sm select2"
                                        data-placeholder="Pilih NIP Karyawan..." tabindex="2" name="no_scan"
                                        id="no_scan" required>
                                        <option value="" disabled selected></option>
                                        <?php
										$dept = $user['dept'];
										// $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' AND NOT status_karyawan = 'perubahan_status' ORDER BY nama")->result_array();
										$queryShift = $this->db->query("SELECT 
																		tm.no_scan,
																		tm.nama,
																		tm.dept,
																		tm.jabatan,
																		tm.role_id,
																		tm.sisa_cuti,
																		tm.status_aktif,
																		tm.atasan1 AS nama_atasan,
																		tm2.jabatan AS jabatan_atasan
																	FROM tbl_makar tm                  
																	LEFT JOIN tbl_makar tm2 ON tm.atasan1 = tm2.nama 
																	WHERE tm.dept = '$dept' 
																		AND tm.status_aktif = 1 
																		AND tm2.status_aktif = 1 
																		AND NOT tm.status_karyawan = 'perubahan_status' 
																	ORDER BY tm.nama")->result_array();
										?>
                                        <?php foreach ($queryShift as $dk): ?>
                                        <option value="<?= $dk['no_scan'] ?>" data-role-id="<?= $dk['role_id'] ?>"
                                            data-atasan1="<?= $dk['nama_atasan'] ?>"
                                            data-jabatan_atasan1="<?= $dk['jabatan_atasan'] ?>" <?php if ($dk['no_scan'] == set_value('no_scan')) {
													  echo "SELECTED";
												  } ?>>
                                            <?= $dk['no_scan'] . ' - ' . $dk['nama']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select><br>
                                    <label class="control-label col-lg-12" style="color: red;" id="sisa_cuti"></label>
                                    <input type="hidden" name="sisa_cuti" id="_sisa_cuti "
                                        value="<?= $dk['sisa_cuti']; ?>">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Personnel Penggati</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm select2"
                                        data-placeholder="Pilih Personnel Pengganti..." tabindex="2"
                                        name="pengganti_kerja">
                                        <option value="" disabled selected></option>
                                        <option value="-" <?php if ("-" == set_value('pengganti_kerja')) {
											echo "SELECTED";
										} ?>>-</option>
                                        <?php
										$dept = $user['dept'];
										$queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' AND NOT status_karyawan = 'perubahan_status' ORDER BY nama")->result_array();
										?>
                                        <?php foreach ($queryShift as $dk): ?>
                                        <option value="<?= $dk['no_scan'] ?>" role_id="<?= $dk['role_id'] ?>" <?php if
												($dk['no_scan'] == set_value('pengganti_kerja')) {
													echo "SELECTED";
												} ?>>
                                            <?= $dk['no_scan'] . ' - ' . $dk['nama']; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Mulai Tanggal</label>
                                <div class="col-lg-2">
                                    <input type="date" name="tgl_mulai" data-date="" data-date-format="DD MMMM YYYY"
                                        class="form-control input-sm" id="tgl_mulai" required>
                                </div>
                                <label class="control-label col-lg-2">Lama Izin/Cuti</label>
                                <div class="col-lg-1">
                                    <input type="text" name="lama_izin" class="form-control input-sm" id="lama_izin"
                                        required>
                                </div>
                                <div class="col-lg-1">
                                    <select name="days_or_month" class="form-control input-sm" id="days_or_month">
                                        <option value="Hari" <?php if ("Hari" == set_value('days_or_month')) {
											echo "SELECTED";
										} ?>>Hari</option>
                                        <option value="Bulan" <?php if ("Bulan" == set_value('days_or_month')) {
											echo "SELECTED";
										} ?>>Bulan</option>
                                    </select>
                                </div>
                                <label class="control-label col-lg-2">Selesai Tanggal</label>
                                <div class="col-lg-2">
                                    <input type="date" name="tgl_selesai" class="form-control input-sm" id="tgl_selesai"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Alasan</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control input-sm" name="alasan"
                                        id="alasan"><?= set_value('alasan'); ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="control-label col-lg-2"></label>
                                <label class="control-label col-lg-2">
                                    <center>Pemohon : </center>
                                </label>
                                <label id="disetujui_label" class="control-label col-lg-4">
                                    <center>Disetujui Oleh:</center>
                                </label>
                                <label id="mengetahui_label" class="control-label col-lg-2">
                                    <center></center>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Nama</label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('pemohon_nama'); ?>" name="pemohon_nama" id="pemohon_nama"
                                        type="text" required>
                                    <input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('pemohon_role_id'); ?>" name="pemohon_role_id"
                                        id="pemohon_role_id" type="hidden">
                                    <input class="form-control input-sm col-lg-2" value="<?= set_value('atasan1'); ?>"
                                        name="atasan1" id="atasan1" type="hidden">
                                    <input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('jabatan_atasan'); ?>" name="jabatan_atasan"
                                        id="jabatan_atasan" type="hidden">
                                    <input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('no_scan_atasan'); ?>" name="no_scan_atasan"
                                        id="no_scan_atasan" type="hidden">
                                    <input class="form-control input-sm col-lg-2" value="<?= set_value('atasan2'); ?>"
                                        name="atasan2" id="atasan2" type="hidden">
                                    <input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('jabatan_atasan2'); ?>" name="jabatan_atasan2"
                                        id="jabatan_atasan2" type="hidden">
                                    <input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('no_scan_atasan2'); ?>" name="no_scan_atasan2"
                                        id="no_scan_atasan2" type="hidden">
                                </label>

                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('disetujui_nama_1'); ?>" name="disetujui_nama_1"
                                        id="disetujui_nama_1" type="text" disabled></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('disetujui_nama_2'); ?>" name="disetujui_nama_2"
                                        id="disetujui_nama_2" type="text" disabled></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="STEFANUS PRANJANA" name="mengetahui_nama" id="mengetahui_nama"
                                        type="hidden" disabled></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Jabatan</label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('pemohon_jabatan'); ?>" name="pemohon_jabatan"
                                        id="pemohon_jabatan" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('disetujui_jabatan_1'); ?>" name="disetujui_jabatan_1"
                                        id="disetujui_jabatan_1" type="text" disabled></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('disetujui_jabatan_2'); ?>" name="disetujui_jabatan_2"
                                        id="disetujui_jabatan_2" type="text" disabled></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="HRD MANAGER" name="mengetahui_jabatan" id="mengetahui_jabatan"
                                        type="hidden" disabled></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Tanggal</label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('tgl_surat_pemohon'); ?>" name="tgl_surat_pemohon"
                                        type="date" required></label>
                                <label class="control-label col-lg-6"><input class="form-control input-sm col-lg-2"
                                        value="<?= set_value('tgl_diset_mengetehui'); ?>" name="tgl_diset_mengetehui"
                                        id="tgl_diset_mengetehui" type="hidden"></label>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="submit"
                                        id="Button">Save</button>
                                    <a href="<?= base_url('pci'); ?>" class="btn btn-theme04">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
</section>
