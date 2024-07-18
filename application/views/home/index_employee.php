<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9 main-chart">
                <div class="border-head">
                <h3>HUMAN CAPITAL INFORMATION SYSTEM</h3>
                </div>
                <div class="row mt">
                <!-- SERVER STATUS PANELS -->
                <div class="col-md-4 col-sm-8 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">
                            <h5><b>MALE EMPLOYEE DEPARTMENT <?= $user['dept']; ?></b></h5>
                        </div>
                        <canvas id="serverstatus01" height="120" width="120"></canvas>
                        <?php
                            $userL = $user['dept'];
                            $aktiveL = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '1' AND jenis_kelamin='Laki' AND dept = '$userL'")->row();
                            $nonAktiveL = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '0' AND jenis_kelamin='Laki' AND dept = '$userL'")->row();
                        ?>
                        <script>
                            var doughnutData = [{
                            value: <?= $aktiveL->jml; ?>,
                            color: "#FF6B6B"
                            },
                            {
                            value: <?= $nonAktiveL->jml; ?>,
                            color: "#fdfdfd"
                            }
                            ];
                            var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                        </script>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                                <p>Total Male<br />Employees :</p>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <h2><?= $aktiveL->jml; ?>/<?= $nonAktiveL->jml; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4 col-sm-4 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5><b>FEMALE EMPLOYEE DEPARTMENT <?= $user['dept']; ?></b></h5>
                            </div>
                            <canvas id="serverstatus02" height="120" width="120"></canvas>
                            <?php
                                $userP = $user['dept'];
                                $aktiveP = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '1' AND jenis_kelamin='Wanita' AND dept = '$userP'")->row();
                                $nonAktiveP = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '0' AND jenis_kelamin='Wanita' AND dept = '$userP'")->row();
                            ?>
                            <script>
                                var doughnutData = [{
                                value: <?= $aktiveP->jml; ?>,
                                color: "#668cff"
                                },
                                {
                                value: <?= $nonAktiveP->jml; ?>,
                                color: "#fdfdfd"
                                }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6 goleft">
                                    <p>Total Male<br />Employees :</p>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <h2><?= $aktiveP->jml; ?>/<?= $nonAktiveP->jml; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 mb">
                        <!-- <div class="green-panel pn">
                            <div class="green-header">
                                <h5>REVENUE</h5>
                            </div>
                            <div class="chart mt">
                                <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%"
                                data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color=""
                                data-highlight-line-color="#fff" data-spot-radius="4"
                                data-data="[200,135,667,333,526,996,564,123,890,464,655,755]"></div>
                            </div>
                            <p class="mt"><b>$ 17,980</b><br />Month Income</p>
                        </div> -->
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4 mb">
                    
                </div>
                <div class="col-md-8 mb">

                </div>
                </div>
                <div class="row">
                <div class="col-md-4 mb">
                    
                </div>
                <div class="col-md-4 mb">
                    
                </div>
                </div>
                <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    
                </div>
                <div class="col-md-4 col-sm-4 mb">
                    
                </div>
                <!-- /col-md-4 -->
                </div>
            </div>
            <div class="col-lg-3 ds">
                <div class="donut-main">
                    <h4>ALL EMPLOYEE DEPARTMENT <?= $user['dept']; ?></h4>
                    <?php
                        $user = $user['dept'];
                        $active = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '1' AND dept = '$user'")->row();
                        $nonAktive = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '0' AND dept = '$user'")->row();
                    ?>
                    <canvas id="newchart" height="130" width="130"></canvas>
                    <script>
                        var doughnutData = [{
                                value: <?= $active->jml; ?>,
                                color: "#4ECDC4"
                            },
                            {
                                value: <?= $nonAktive->jml; ?>,
                                color: "#fdfdfd"
                            }
                        ];
                        var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
                    </script>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6 goleft">
                            <p>Total <br />Employees :</p>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <h2><?= $active->jml; ?>/<?= $nonAktive->jml; ?></h2>
                        </div>
                    </div>
                </div>
                
                <h4 class="centered mt"></h4>
                <div class="desc">
                    
                </div>
                
                <div id="calendar" class="mb">
                    <div class="panel green-panel no-margin">
                        <div class="panel-body">
                            <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                <div class="arrow"></div>
                                <h3 class="popover-title" style="disadding: none;"></h3>
                                <div id="date-popover-content" class="popover-content"></div>
                            </div>
                            <div id="my-calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>