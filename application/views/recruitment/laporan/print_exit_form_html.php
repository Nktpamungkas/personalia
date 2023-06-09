<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
    @page {
        size: A4;
        margin: 60px 60px 80px 60px;

    }

    @media print {
        @page {
            size: A4;
            margin: 60px 60px 80px 60px;
        }

        html,
        body {
            width: 210mm;
            /* height: 297mm; */
            height: 282mm;
            font-size: 12pt !important;
            background: #FFF;
            overflow: visible;
        }

        /* body {
            padding-top: 15mm;
        } */

        .table-ttd {
            border-collapse: collapse;
            width: 100%;
        }

        .table-ttd tr,
        .table-ttd tr td {

            border: 1px solid black;
            padding: 5px;

            padding: 5px;
        }
    }

    .table-ttd {
        border-collapse: collapse;
        width: 100%;
    }

    .table-ttd tr,
    .table-ttd tr td {

        border: 1px solid black;
        padding: 5px;

        padding: 5px;
    }

    .tablee {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        font-size: 12pt !important;
        border-collapse: collapse;
        width: 100%;
    }

    tr {
        page-break-before: always;
        page-break-inside: avoid;
    }

    .tablee td,
    .tablee th {
        /* border: 1px solid black; */
        padding: 5px;

    }

    li {
        list-style-type: none;
    }

    .tablee tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .tablee th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="print();">
    <table class="table-ttd">
        <tr>
            <td align="center"><img src="<?= base_url() . 'assets\logo.png' ?>" style="width: 50px; height:auto;"></td>
            <td>
                <li><strong>FORM EXIT INTERVIEW</strong></li>
                <li><strong>INDOTAICHEN TEXTILE INDUSTRY</strong></li>
                <li><small>Jl. Gatot subroto Km. 3, Kel. Uwung Jaya, Cibodas, Kota Tanggerang 15138</small></li>
                <li><small>Telp. 021 5520920</small></li>
            </td>
        </tr>
    </table>
    <table class="table-ttd">
        <thead>
            <tr>
                <td>Nama\NIK : <?= $person['nama'] ?>/<?= $person['no_scan'] ?></td>
                <td>Lokasi Kerja: PT. INDO TAICHEN, Kota Tanggerang</td>
            </tr>
            <tr>
                <td>Jabatan : <?= $person['jabatan'] ?></td>
                <td>Jenis Kelamin : <?= $person['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td>Dept.\Bagian<?= $person['dept'] ?></td>
                <td>Status keluarga : <?= $person['status_kel'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Masuk : <?= $person['tgl_masuk'] ?></td>
                <td>Tanggal resign : <?= $person['tgl_resign'] ?></td>
            </tr>
            <tr>
                <td colspan="2">Tanggal Surat Resign : <?= $person['tgl_surat_resign'] ?></td>
            </tr>
        </thead>
    </table>
    <p></p>
    <table class="tablee">
        <tbody>
            <?php $i = 0;
            foreach ($question as $li) : $i++; ?>
                <?php if ($li->id_jenis_jawaban == 1) : ?>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td valign="top"><?= $i; ?>.</td>
                        <td colspan="3">
                            <div>
                                <label><?= $li->question ?></label>
                                <p><i><?php echo $li->answer ?></i></p>
                            </div>
                        </td>
                    </tr>
                <?php elseif ($li->id_jenis_jawaban == 2) : ?>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td rowspan="2" valign="top"><?= $i; ?>.</td>
                        <td colspan="3">
                            <?= $li->question ?>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td>
                            <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                            $a_choice = $this->db->query($query_a)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->a_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $a_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                            $b_choice = $this->db->query($query_b)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->b_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $b_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_c = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->c_choice";
                            $c_choice = $this->db->query($query_c)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->c_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $c_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                    </tr>
                <?php elseif ($li->id_jenis_jawaban == 3) : ?>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td rowspan="3" valign="top"><?= $i; ?>.</td>
                        <td colspan="3">
                            <?= $li->question ?>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td>
                            <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                            $a_choice = $this->db->query($query_a)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->a_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $a_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                            $b_choice = $this->db->query($query_b)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->b_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $b_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_c = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->c_choice";
                            $c_choice = $this->db->query($query_c)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->c_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $c_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td colspan="3">
                            <div>
                                <label for="<?php $li->id_question ?>">Jelaskan Pilihan Jawaban Anda</label>
                                <p><i><?php echo $li->explanation ?></i></p>
                            </div>
                        </td>
                    </tr>
                <?php elseif ($li->id_jenis_jawaban == 4) : ?>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td rowspan="2" valign="top"><?= $i; ?>.</td>
                        <td colspan="3"><?= $li->question ?></td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td><?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                            $a_choice = $this->db->query($query_a)->row_array(); ?><div>
                                <input type="radio" <?php if ($li->a_choice == $li->id_answer) echo 'checked="true"'; ?>><label><?= $a_choice['value_pilihan'] ?></label></div>
                        </td>
                        <td colspan="2"><?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                                        $b_choice = $this->db->query($query_b)->row_array(); ?><div>
                                <input type="radio" <?php if ($li->b_choice == $li->id_answer) echo 'checked="true"'; ?>><label><?= $b_choice['value_pilihan'] ?></label></div>
                        </td>
                    </tr>
                <?php elseif ($li->id_jenis_jawaban == 5) : ?>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td rowspan="3" valign="top"><?= $i; ?>.</td>
                        <td colspan="3">
                            <?= $li->question ?>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td colspan="2">
                            <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                            $a_choice = $this->db->query($query_a)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->a_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $a_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                            $b_choice = $this->db->query($query_b)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->b_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $b_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td colspan="3">
                            <div>
                                <label for="<?php $li->id_question ?>">Jelaskan Pilihan Jawaban Anda</label>
                                <p><i><?php echo $li->explanation ?></i></p>
                            </div>
                        </td>
                    </tr>
                <?php elseif ($li->id_jenis_jawaban == 6) : ?>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td rowspan="2" valign="top"><?= $i; ?>.</td>
                        <td colspan="3">
                            <?= $li->question ?>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td>
                            <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                            $a_choice = $this->db->query($query_a)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->a_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $a_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                            $b_choice = $this->db->query($query_b)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->b_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $b_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_c = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->c_choice";
                            $c_choice = $this->db->query($query_c)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->c_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $c_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_d = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->d_choice";
                            $d_choice = $this->db->query($query_d)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->d_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $d_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                    </tr>
                <?php elseif ($li->id_jenis_jawaban == 7) : ?>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td rowspan="4" valign="top"><?= $i; ?>.</td>
                        <td colspan="3">
                            <?= $li->question ?>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td colspan="2">
                            <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                            $a_choice = $this->db->query($query_a)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->a_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $a_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                            $b_choice = $this->db->query($query_b)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->b_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $b_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td colspan="2">
                            <?php $query_c = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->c_choice";
                            $c_choice = $this->db->query($query_c)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->c_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $c_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                        <td>
                            <?php $query_d = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->d_choice";
                            $d_choice = $this->db->query($query_d)->row_array(); ?>
                            <div>
                                <input type="radio" <?php if ($li->d_choice == $li->id_answer) echo 'checked="true"'; ?>>
                                <label><?= $d_choice['value_pilihan'] ?></label>
                            </div>
                        </td>
                    </tr>
                    <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #e3feff;"' ?>>
                        <td colspan="3">
                            <div>
                                <label for="<?php $li->id_question ?>">Jelaskan Pilihan Jawaban Anda</label>
                                <p><i><?php echo $li->explanation ?></i></p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p></p>
    <table class="table-ttd" style="margin-top: 10px;">
        <tr>
            <td colspan="3">Tanggerang, <?= $person['tgl_surat_resign'] ?></td>
        </tr>
        <tr style="background-color: burlywood;">
            <td>Di buat oleh,</td>
            <td>Di periksa oleh,</td>
            <td>di Ketahui oleh,</td>
        </tr>
        <tr style="vertical-align: bottom;">
            <td style="height: 130px;">Nama jelas & tanggal</td>
            <td style="height: 130px;">
                <li>Personel Mgt</li>
                <li>Nama jelas & tanggal</li>
            </td>
            <td style="height: 130px;">
                <li>Hr. Head</li>
                <li>Nama jelas & tanggal</li>
            </td>
        </tr>
    </table>
</body>

</html>