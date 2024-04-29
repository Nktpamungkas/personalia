</section>
</body>
<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        <p>
            &copy; Copyrights <strong>DIT</strong>. All Rights Reserved
        </p>
        <div class="credits">
            Created with DIT template by <a href="https://indotaichen.com/">Indo Taichen Textile Industry</a>
        </div>
        <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>

<script src="<?= base_url(); ?>lib/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>lib/jquery.scrollTo.min.js"></script>
<script src="<?= base_url(); ?>lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>lib/jquery.sparkline.js"></script>

<!--common script for all pages-->
<script src="<?= base_url(); ?>lib/common-scripts.js"></script>

<!--script for this page-->
<script src="<?= base_url(); ?>lib/sparkline-chart.js"></script>
<script src="<?= base_url(); ?>lib/zabuto_calendar.js"></script>

<!-- SCRIPT TABLES -->
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
<script class="include" type="text/javascript" src="<?= base_url(); ?>lib/jquery.dcjqaccordion.2.7.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>

<!--script for dropdown menu -->
<script type="text/javascript" src="<?= base_url(); ?>lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>lib/gritter-conf.js"></script>

<script src="<?= base_url(); ?>select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url(); ?>assets/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/toastr/toastr.min.js"></script>
<?php if ($title == "Recruitment | Exit Interview") {
    $this->load->view('recruitment/custom_exit_form.php');
} ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
    });

    $(document).ready(function() {
        var oTable = $('#table-pci').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [1, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#tbl-list-exit-interview').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-cuti').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-cuti-history').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [3, 'asc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-pemohon').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-training').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [3, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-indexAll-pci').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [4, 'asc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-indexAll-pci-ver').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [0, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-indexAll-pkl').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [1, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-index-discipline').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [1, 'desc']
            ]
        });
    });
    $(document).ready(function() {
        var oTable = $('#table-index-transition').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [4, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-indexAll-pkl-ver').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [1, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-h-login').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [0, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-h-logout').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [0, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-laporan-absen').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [0, 'asc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#PKWT').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [4, 'asc']
            ]
        });
    });
    $(document).ready(function() {
        var oTable = $('#PKWT2').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [4, 'desc']
            ]
        });
    });
    $(document).ready(function() {
        var oTable = $('#PKWT2a').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [5, 'asc']
            ]
        });
    });

	$(document).ready(function() {
        var oTable = $('#listPKL').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [3]
            }],
            "aaSorting": [
                [5, 'asc']
            ]
        });
    });

    // $(document).ready(function() {
    //     var oTable = $('#PKWT2').dataTable({
    //         "aoColumnDefs": [{
    //             "bSortable": true,
    //             "aTargets": [0]
    //         }]
    //     });
    // });

    $(document).ready(function() {
        var oTable = $('#PKWT3').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [4, 'asc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#PKWT-memo').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [0, 'desc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#PKWT-kontrak').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [4, 'asc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#alamat').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [4, 'asc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-list-training').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [2, 'asc']
            ]
        });
    });

    $(document).ready(function() {
        var oTable = $('#table-list-pelatihan').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [3, 'asc']
            ]
        });
    });
    
    $(document).ready(function() {
        var oTable = $('#table-bsc').dataTable({
            "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
            }],
            "aaSorting": [
                [3, 'asc']
            ]
        });
    });
</script>
<!-- Script -->

</html>
