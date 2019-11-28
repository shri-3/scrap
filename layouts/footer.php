<!-- END PAGE CONTENT-->
        <footer class="page-footer">
            <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
            <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
        </footer>
    </div>
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<script src="./assets/vendors/datatable-button/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="./assets/vendors/button-flash/buttons.flash.min.js" type="text/javascript"></script>
<!-- PAGE Excel Maker PLUGINS-->
<script src="./assets/vendors/excel/excel.min.js" type="text/javascript"></script>
<!-- PAGE PDF Maker PLUGINS-->
<script src="./assets/vendors/pdfmake/pdfmake.min.js" type="text/javascript"></script>
<script src="./assets/vendors/pdfmake/vfs_fonts.js" type="text/javascript"></script>
<!-- PAGE support file for pdf, excel, csv, copy PLUGINS-->
<script src="./assets/vendors/button-html/buttons.html5.min.js" type="text/javascript"></script>
<!-- PAGE PRINT PLUGINS-->
<script src="./assets/vendors/print/print.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="./assets/vendors/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/form-plugins.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#example-table tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );

        // DataTable
        var table = $('#example-table').DataTable({
            pageLength: 10,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });

        // Apply the search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    } );
</script>
<script>
    function getState(val) {
        $("#loader").show();
        $.ajax({
            type: "POST",
            url: "get_ajax_depot.php",
            data:'country_id='+val,
            success: function(data){
                $("#state-list").html(data);
                $("#loader").hide();
            }
        });
    }
</script>
</body>

</html>
