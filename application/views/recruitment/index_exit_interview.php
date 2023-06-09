<style>
    #sepreated {
        background-color: #3e8e41;
        border: none;
        color: black;
        text-align: center;
        transition: 0.3s;
    }

    #sepreated:hover {
        background-color: #ddd;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row mb col-sm-12">
            <div class="content-panel" style="margin-top: 5px;">
                <h2 class="text-center"><strong> Form Exit Interview </strong></h2>
                <div class="container-fluid" style="margin-top: 15px;">
                    <div class="col-lg-6">
                        <div class="col-lg">
                            <div class="input-group">
                                <input type="number" class="form-control input-sm" name="nik" id="nik" placeholder="NIK..." />
                                <span class="input-group-addon" id="sepreated">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-repeat" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.854 7.146a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L2.5 8.207l1.646 1.647a.5.5 0 0 0 .708-.708l-2-2zm13-1a.5.5 0 0 0-.708 0L13.5 7.793l-1.646-1.647a.5.5 0 0 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0 0-.708z" />
                                        <path fill-rule="evenodd" d="M8 3a4.995 4.995 0 0 0-4.192 2.273.5.5 0 0 1-.837-.546A6 6 0 0 1 14 8a.5.5 0 0 1-1.001 0 5 5 0 0 0-5-5zM2.5 7.5A.5.5 0 0 1 3 8a5 5 0 0 0 9.192 2.727.5.5 0 1 1 .837.546A6 6 0 0 1 2 8a.5.5 0 0 1 .501-.5z" />
                                    </svg>
                                </span>
                                <input type="text" readonly required="true" name="nama" id="nama" class="form-control input-sm" placeholder="Nama ..." />
                            </div>
                        </div>
                        <div class="col-lg" style="margin-top: 5px;">
                            <input type="text" readonly="true" class="form-control input-sm" required="true" name="jabatan" id="jabatan" placeholder="Jabatan...">
                        </div>
                        <div class="col-lg" style="margin-top: 5px;">
                            <input type="text" readonly="true" class="form-control input-sm" required="true" name="dept_bagian" id="dept_bagian" placeholder="Dept./Bagian...">
                        </div>
                        <div class="col-lg" style="margin-top: 5px;">
                            <input type="text" readonly="true" class="form-control input-sm" required="true" name="Tgl_masuk" id="Tgl_masuk" placeholder="Tanggal masuk...">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-lg">
                            <input type="text" class="form-control input-sm" required="true" name="lokasi_kerja" id="lokasi_kerja" placeholder="Lokasi kerja..." readonly="true">
                        </div>
                        <div class="col-lg" style="margin-top: 5px;">
                            <input type="text" readonly="true" class="form-control input-sm" required="true" name="jen_kel" id="jen_kel" placeholder="Jenis Kelamin...">
                        </div>
                        <div class="col-lg" style="margin-top: 5px;">
                            <input type="text" readonly="true" class="form-control input-sm" required="true" name="Status" id="Status" placeholder="Dept./Bagian...">
                        </div>
                        <div class="col-lg" style="margin-top: 5px;">
                            <input type="text" readonly="true" class="form-control input-sm" required="true" name="tgl_resign" id="tgl_resign" placeholder="Tanggal resign...">
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-top: 5px;">
                        <div class="col-lg">
                            <input type="date" class="form-control input-sm" required="true" name="tgl_surat_resign" id="tgl_surat_resign" placeholder="Tanggal surat resign...">
                        </div>
                    </div>
                </div>
                <div class="container-fluid" style="margin-top: 10px;">
                    <div class="col-lg-12">
                        <button class="btn btn-success" id="btn-start">Mulai Mengisi</button>
                    </div>
                </div>
                <!--  -->
                <form action="#" method="#" id="myform">
                    <div class="adv-table" style="display: none;">
                        <table style="width:98%; margin-top:20px;" class="display table table-bordered" id="table-Exit-interview">
                            <thead>

                            </thead>
                            <tbody>
                                <?php $i = 0;
                                foreach ($question as $li) : $i++; ?>
                                    <input type="hidden" class="title_quest" value="<?= $li->title_quest ?>">
                                    <?php if ($li->id_jenis_jawaban == 1) : ?>
                                        <!-- kondisi pertama -->
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td><?= $i; ?></td>
                                            <td colspan="3">
                                                <div class="form-group">
                                                    <label for="<?php $li->id_question ?>"><?= $li->question ?></label>
                                                    <textarea class="form-control" required id="<?= $li->id_question ?>" attr="<?= $li->id_jenis_jawaban ?>" rows="3" name="<?= $li->id_question . '-essay' ?>"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end kondisi pertama -->
                                    <?php elseif ($li->id_jenis_jawaban == 2) : ?>
                                        <!-- kondisi 2 -->
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td rowspan="2"><?= $i; ?></td>
                                            <td colspan="3">
                                                <?= $li->question ?>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td>
                                                <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                                                $a_choice = $this->db->query($query_a)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->a_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $a_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $a_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                                                $b_choice = $this->db->query($query_b)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->b_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $b_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $b_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_c = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->c_choice";
                                                $c_choice = $this->db->query($query_c)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->c_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $c_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $c_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- kondisi 2 -->
                                    <?php elseif ($li->id_jenis_jawaban == 3) : ?>
                                        <!-- kondisi 3 -->
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td rowspan="3"><?= $i; ?></td>
                                            <td colspan="3">
                                                <?= $li->question ?>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td>
                                                <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                                                $a_choice = $this->db->query($query_a)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->a_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $a_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $a_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                                                $b_choice = $this->db->query($query_b)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->b_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $b_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $b_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_c = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->c_choice";
                                                $c_choice = $this->db->query($query_c)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->c_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $c_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $c_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td colspan="3">
                                                <div class="form-group">
                                                    <label for="<?php $li->id_question ?>">Jelaskan Pilihan Jawaban Anda</label>
                                                    <textarea attr="<?= $li->id_jenis_jawaban ?>" class="form-control" required id="<?= $li->id_question ?>" name="<?= $li->id_question . '-essay' ?>" rows="3"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- kondisi 3 -->
                                    <?php elseif ($li->id_jenis_jawaban == 4) : ?>
                                        <!-- kondisi 4 -->
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td rowspan="2"><?= $i; ?></td>
                                            <td colspan="3">
                                                <?= $li->question ?>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td>
                                                <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                                                $a_choice = $this->db->query($query_a)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->a_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $a_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $a_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                                                $b_choice = $this->db->query($query_b)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->b_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $b_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $b_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <!-- kondisi 4 -->
                                    <?php elseif ($li->id_jenis_jawaban == 5) : ?>
                                        <!-- kondisi 5 -->
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td rowspan="3"><?= $i; ?></td>
                                            <td colspan="3">
                                                <?= $li->question ?>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td>
                                                <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                                                $a_choice = $this->db->query($query_a)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->a_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $a_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $a_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                                                $b_choice = $this->db->query($query_b)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->b_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $b_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $b_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td colspan="3">
                                                <div class="form-group">
                                                    <label for="<?php $li->id_question ?>">Jelaskan Pilihan Jawaban Anda</label>
                                                    <textarea attr="<?= $li->id_jenis_jawaban ?>" class="form-control" required id="<?= $li->id_question ?>" name="<?= $li->id_question . '-essay' ?>" rows="3"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- kondisi 5 -->
                                    <?php elseif ($li->id_jenis_jawaban == 6) : ?>
                                        <!-- kondisi 6 -->
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td rowspan="2"><?= $i; ?></td>
                                            <td colspan="3">
                                                <?= $li->question ?>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td>
                                                <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                                                $a_choice = $this->db->query($query_a)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->a_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $a_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $a_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                                                $b_choice = $this->db->query($query_b)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->b_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $b_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $b_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_c = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->c_choice";
                                                $c_choice = $this->db->query($query_c)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->c_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $c_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $c_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_d = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->d_choice";
                                                $d_choice = $this->db->query($query_d)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->d_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $d_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $d_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- kondisi 6 -->
                                    <?php elseif ($li->id_jenis_jawaban == 7) : ?>
                                        <!-- kondisi 7 -->
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td rowspan="4"><?= $i; ?></td>
                                            <td colspan="3">
                                                <?= $li->question ?>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td colspan="2">
                                                <?php $query_a = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->a_choice";
                                                $a_choice = $this->db->query($query_a)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->a_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $a_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $a_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td>
                                                <?php $query_b = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->b_choice";
                                                $b_choice = $this->db->query($query_b)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->b_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $b_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $b_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td colspan="2">
                                                <?php $query_c = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->c_choice";
                                                $c_choice = $this->db->query($query_c)->row_array(); ?>
                                                <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->c_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $c_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $c_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                            <td> <?php $query_d = "select value_pilihan from tbl_pilihan_answer where id_pilihan = $li->d_choice";
                                                    $d_choice = $this->db->query($query_d)->row_array(); ?> <div class="form-group form-check form-check-inline">
                                                    <input required attr="<?= $li->d_choice ?>" class="clschk form-check-input" type="radio" name="optradio<?= $li->id_question ?>" id="<?= $li->id_question ?>" value="<?= $d_choice['value_pilihan'] ?>">
                                                    <label class="form-check-label" for="inlineRadio1"><?= $d_choice['value_pilihan'] ?></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr <?php if ($i % 2 !== 0) echo 'style="background-color: #faf0d4"' ?>>
                                            <td colspan="3">
                                                <div class="form-group">
                                                    <label for="<?php $li->id_question ?>">Jelaskan Pilihan Jawaban Anda</label>
                                                    <textarea attr="<?= $li->id_jenis_jawaban ?>" class="form-control" required id="<?= $li->id_question ?>" name="<?= $li->id_question . '-essay' ?>" rows="3"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!--  -->
                    <div class="container-fluid" id="div-btn-done" style="margin-top: 10px;">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-primary btn-block" id="btn-done">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</section>