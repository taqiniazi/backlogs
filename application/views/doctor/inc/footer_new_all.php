<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="https://cdn.tiny.cloud/1/mcnf3z49bi3hvs29al81mrwfygelhkh5ya3vkn0tush8eu9v/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</div>
</div>
<script>
    <?php if(!isset($flag)){ ?>
    tinymce.init({
        menubar: false,
        selector: '.tg-tinymceeditor',
        init_instance_callback: function (editor) {
            editor.on('blur', function (e) {
                save_specimen_data();
            });
        },
        toolbar: 'undo redo ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        font_formats: "CircularStd=CircularStd;",
        content_style: "@import url('https://db.onlinewebfonts.com/c/860c3ec7bbc5da3e97233ccecafe512e?family=CircularStd'); body { font-family: 'CircularStd' , sans-serif !important; font-size:18px; }"
    });
    tinymce.init({
        selector: '.tinyTextarea',
        height: 200,
        menubar: false,
        plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
    <?php } ?>
</script>



<!-- Footer Template -->
<footer>

    <div class="container">

        <div class="row">

            <div class="col-12">

                <p class="text-center">
                    PathHub &reg; Software Systems Inc. 6.0. Uralensis Innov8 Ltd & LLC.
                </p>
            </div>
        </div>

    </div>

</footer>
</body>
        <?php
            if (!(strtolower($this->uri->segment(1)) == 'doctor' && (strtolower($this->uri->segment(2)) == 'doctor_record_detail'|| strtolower($this->uri->segment(2)) == 'doctor_record_detail_old' || strtolower($this->uri->segment(2)) == 'authorization_queue' ))) {
                $src_url = base_url('/assets/subassets/js/jquery-3.2.1.min.js');
                echo "<script src='$src_url'></script>";
            }
        ?>
        <script src="<?php echo base_url('/assets/js/jquery-ui.js'); ?>"></script>
        <!-- Datetimepicker JS -->
        <script src="<?php echo base_url('/assets/subassets/js/moment.min.js')?>"></script>

        <!-- Bootstrap Core JS -->
        <script src="<?php echo base_url('/assets/subassets/js/popper.min.js')?>"></script>
        <script src="<?php echo base_url('/assets/newtheme/js/bootstrap.min.js')?>"></script>

        <!-- Slimscroll JS -->
        <script src="<?php echo base_url('/assets/subassets/js/jquery.slimscroll.min.js')?>"></script>

        <!-- Chart JS -->
        <script src="<?php echo base_url('/assets/subassets/plugins/morris/morris.min.js')?>"></script>
        <script src="<?php echo base_url('/assets/subassets/plugins/raphael/raphael.min.js')?>"></script>
        <script src="<?php echo base_url('/assets/subassets/js/chart.js')?>"></script>


        <script src="<?php echo base_url('/assets/subassets/js/jquery.smartWizard.js')?>"></script>

        <script src="<?php echo base_url('/assets/subassets/js/jquery.date-dropdowns.js')?>"></script>

        <script src="<?php echo base_url('/assets/js/jquery.countTo.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/circle-progress.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.plugin.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.datepick.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/moment-with-locales.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/typeahead.jquery.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/bloodhound.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/bootstrap-select.min.js'); ?>"></script>
        <!-- Select2 JS -->
        <script src="<?php echo base_url('/assets/subassets/js/select2.min.js')?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.bpopup.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/newtheme/js/custom_jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/newtheme/js/dataTables.bootstrap4.min.js'); ?>"></script>
<?php $this->load->view("session");?>
        <script src="<?php echo base_url('/assets/js/sticky_message.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.inputmask.bundle.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/scrollbar.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery-te-1.4.0.min.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.cookie.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/jquery.idle.min.js'); ?>"></script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        <script src="<?php echo base_url('/assets/subassets/js/new_jquery.datetimepicker.js')?>"></script>
        <script src="<?php echo base_url('assets/institute/plugins/summernote/dist/summernote.js'); ?>"></script>
        <!-- Custom JS -->
        <script src="<?php echo base_url('/assets/subassets/js/app.js')?>"></script>

        <script src="<?php echo base_url('/assets/js/amcharts/core.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/amcharts/charts.js'); ?>"></script>
        <script src="<?php echo base_url('/assets/js/amcharts/animated.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/js/daterangepicker.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/daterangepicker.css'); ?>" />


<!--jQuery Form Plugin-->
<script src=" <?php echo base_url('/assets/js/jquery.form.js');?> "></script>

<!--jQuery Validation Plugin-->
<script src="<?php echo base_url('/assets/validation/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/validation/additional-methods.min.js'); ?>"></script>

<!--Js Tree-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

<!--Bootstrap Tree-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-treeview.min.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-treeview.min.css'); ?>" />

<script type="text/javascript">

    $(document).ready(function(){
        setTimeout(function(){
            update_record_history_table();
            update_block_history_table();
        },1000);
        
        $('.list-view').click(function(){
           $("#list_view").addClass("show"); 
           $("#grid_view").removeClass("show"); 
           $(".grid-view").removeClass("active"); 
           $(this).addClass("active");
        });
         $('.grid-view').click(function(){
           $("#grid_view").addClass("show"); 
           $("#list_view").removeClass("show") ;
           $(".list-view").removeClass("active"); 
           $(this).addClass("active");
        });
    })
</script>

<script>
    // Base url as javascript variable
    const _base_url = `<?php echo base_url() ?>`
    const default_profile_pic = `<?php echo base_url().DEFAULT_PROFILE_PIC?>`;
</script>
<script>
    // CSRF Token
    var csrf_cookie = $.cookie("<?php echo $this->config->item("csrf_cookie_name"); ?>");
    var csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrf_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>



<?php
if(!empty($javascripts)){
    foreach ($javascripts as $value) {
        ?>
        <script src="<?php echo base_url();?>assets/<?php echo $value;?>"></script>
        <?php
    }
}
?>

<script type="text/javascript">
    var laboratory_base_url = '<?php echo base_url('laboratory') ?>';
</script>
<script src="<?php echo base_url('/assets/js/laboratory.js'); ?>"></script>

<script>
    function load_ajax_publish_record_data(flag_type, sort_authorize, urgency_type, row_color_code, dateRange = '') {
        var url = window.location.href;
        var url_year = url.split('/').reverse()[1];
        var url_type = url.split('/').reverse()[0];
        var ajax_url = "<?php echo base_url('index.php/doctor/display_published_reports_ajax_processing_all/'); ?>";

$('#publishedData').DataTable({
        pageLength : 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
            // processing: false,
            serverSide: true,
            // stateSave: true,
            order: [],
            "ajax": {
                url: ajax_url,
                type: "POST",
                dataType: "json",
                data: {publish : 1,[csrf_name]: csrf_hash,'year': url_year, 'type': url_type, 'flag_type': flag_type, 'sort_authorize': sort_authorize, 'urgency_type': urgency_type, 'row_color_code': row_color_code , 'range':dateRange}
            },
            "bDestroy": true,
                fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                 $('td', nRow).eq(9).addClass('flag_column');
            },
                fnDrawCallback: function () {
                // if (datatables_render_table === false) {
                //     datatables_render_table = true;
                // }
            },
            "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
        { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
    ]
        });

        // ajax_change_flag_status();
    }

    function load_ajax_unpublishrequest_record_data(flag_type, sort_authorize, urgency_type, row_color_code, dateRange = '') {
        var url = window.location.href;
        var url_year = url.split('/').reverse()[1];
        var url_type = url.split('/').reverse()[0];
        var ajax_url = "<?php echo base_url('index.php/doctor/display_published_reports_ajax_processing_all/'); ?>";

$('#unpublishedData').DataTable({
    pageLength : 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
            // processing: false,
            serverSide: true,
            // stateSave: true,
            paging : true,
            order: [],
            "ajax": {
                url: ajax_url,
                type: "POST",
                dataType: "json",
                data: {publish : 0,[csrf_name]: csrf_hash,'year': url_year, 'type': url_type, 'flag_type': flag_type, 'sort_authorize': sort_authorize, 'urgency_type': urgency_type, 'row_color_code': row_color_code , 'range':dateRange}
            },
            "bDestroy": true,
                fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                 $('td', nRow).eq(9).addClass('flag_column');
            },
                fnDrawCallback: function () {
                // if (datatables_render_table === false) {
                //     datatables_render_table = true;
                // }
            },
            "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
        { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
    ]
        });

        // ajax_change_flag_status();
    }
    $(document).ready(function(){
        load_ajax_unpublishrequest_record_data('','','','','');
        load_ajax_publish_record_data('','','','','')
    })
</script>
</html>