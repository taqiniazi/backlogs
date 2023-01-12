<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .table thead th {
        font-weight: 600 !important;
    }

    .table td,
    .table th {
        padding: 15px 5px;
    }

    .deletebtn {
        padding: 7px 5px;
        font-size: 14px;
    }

    .main-div {
        overflow: hidden;
    }

    .page-item.disabled .page-link {
        font-size: 14px;
    }

    .page-link {
        line-height: 18px;
    }

    .row_red1 {
        background-color: #f62d51 !important;
    }

    .row_orange1 {
        background-color: #e9ab2e !important;
    }

    .row_green1 {
        background-color: #55ce63 !important;
    }

    #share_document .modal-dialog {
        max-width: 650px;
    }

    #share_document .share-doc .select2-container {
        width: 100% !important;
    }
</style>

<link href="<?php echo base_url('assets/css/bootstrap4-toggle/bootstrap4-toggle.min.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/bootstrap4-toggle/bootstrap4-toggle.min.js');   ?>"></script>

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">Document Library</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('Document') ?>">Dashboard</a></li>

            </ul>


        </div>

        <div class="col-auto float-right ml-auto">
            <a href="<?php echo base_url('Document_List/document_section/0'); ?>" class="btn add-btn"><i class="fa fa-plus"></i> Add</a>

            <a href="<?php echo base_url('Document_List/sub_category_list'); ?>" class="btn add-btn mr-2"><i class="fa fa-list-alt"></i> Sub Category </a>

            <a href="<?php echo base_url('Document_List/category_list'); ?>" class="btn add-btn  mr-2"><i class="fa fa-list-alt"></i> Category </a>




        </div>
    </div>

    <div class="float-right">
        <?php
        foreach ($category as $key => $value) {
            echo "<a class='btn btn-info category_filter' id=catgry_id" . $value['id'] . " data-category_id=" . $value['id'] . " href='javascript:void(0)' style='margin:5px'><i class='" . $value['icon'] . "'></i> " . $value['name'] . "</a>";
            // "<i class='".$value['icon']."'></i>
            // print_r($value['name']); 
        }
        ?>
    </div>
</div>

<div class="notification">
    <?php if ($this->session->flashdata('showMessage') != '') { ?>
        <div class="success_list">
            <?= $this->session->flashdata('message'); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error') != '') { ?>
        <div class="error_list">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
</div>



<div class="table-responsive main-div">

    <div class="btn-group" role="group" aria-label="Basic example">

        <a href="<?php echo base_url('Document_List/index/1'); ?>" title="after the review date" class="btn btn-danger" style="padding:15px; margin:2px; border:solid 0px"></a>
        <a href="<?php echo base_url('Document_List/index/2'); ?>" title="within 3 months of review date " class="btn btn-warning" style="padding:15px; margin:2px; border:solid 0px"></a>
        <a href="<?php echo base_url('Document_List/index/3'); ?>" title="more than 3 months" class="btn btn-success" style="padding:15px; margin:2px; border:solid 0px"></a>
        <a href="<?php echo base_url('Document_List'); ?>" title="Reset" class="btn btn-light" style="padding:15px; margin:2px; border:solid 0px"></a>


    </div>

    <form action="<?= site_url('Document_List/delete_bulk_document'); ?>" method="post" id="delete_pt_frm">
        <input type="hidden" name='<?= $this->security->get_csrf_token_name(); ?>' value='<?= $this->security->get_csrf_hash(); ?>'>
        <table class="table table-striped no-footer" id="document-list-table" style="width: 100%;">
            <thead>

                <tr>
                    <!--th><input type="checkbox" name="all_patient" id="all_patient" class=""></th-->

                    <th>Doc No.</th>

                    <th>Owner</th>
                    <th>Category</th>
                    <th>Sub Category</th>

                    <th>1st Issue Date</th>
                    <th>Current Date</th>
                    <th>Revision No.</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Interval</th>
                    <th>Viewer</th>
                    <th>Review Date</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </form>




</div>




<div class="modal custom-modal fade" id="delete_patient_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Document</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn patient-delete-btn">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal custom-modal fade" id="publish_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Publish Document</h3>
                    <p>Are you sure want to Publish?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn publish-btn">Publish</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="modal custom-modal fade" id="active_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Active Document</h3>
                    <p>Are you sure want to Active?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn active-btn">Active</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal custom-modal fade" id="inactive_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>InActive Document</h3>
                    <p>Are you sure want to InActive?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn inactive-btn">InActive</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<div id="share_document" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Share Document</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div id="notification-message" class="alert ">

                </div>

            </div>
            <div class="modal-body">
                <div class="notification1 alert" id="notification-message1"></div>
                <div class="tg-editformholder">
                    <?php echo form_open('', array('id' => 'share-document-form', 'class' => 'tg-formtheme tg-editform create_user_form')); ?>

                    <div class="card mb-4">
                        <div class="card-body">
                            <!-- Patient Personal Information START -->
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group tg-inputwithicon share-doc">
                                            <label>User </label>
                                            <select name="to_user_id[]" id="to_user_id" class="form-control select2 to_user_id_selcet" multiple="multiple">
                                                <option value=" ">Select User</option>
                                                <?php foreach ($user_info as $user) : ?>
                                                    <option value="<?php echo $user['id']; ?>" title="<?php echo base_url($user['profile_picture_path']); ?>">

                                                        <?php echo $user['first_name'] . " " . $user['last_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="">
                                            <!-- <label for="home-input">Deceased</label> -->
                                            <input type="checkbox" name="view_permission" id="view_permission" value="1" checked=""><span style="color: #000;"> View</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="checkbox" name="delete_permission" id="delete_permission" value="1" class=""><span style="color: #000;"> Delete</span>
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="checkbox" name="edit_permission" id="edit_permission" value="1" class=""><span style="color: #000;"> Edit</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="checkbox" name="download_permission" id="download_permission" value="1" class=""><span style="color: #000;"> Download</span>
                                        </div>
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group tg-inputwithicon">

                                            <input type="text" name="description" id="Description" value="" class="form-control" placeholder="Description">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12" id="add_user">
                                        <span class="badge badge-secondary">Secondary <span><a href="">X</a> </span></span>
                                        <span class="badge badge-secondary">Secondary <span><a href="">X</a> </span></span>
                                    </div>
                                </div>


                                <input type="hidden" name="document_id" id="document_id">
                                <br />

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success" id="user-create-btn">Share</button>
                                            <button class="btn btn-warning" id="user-form-clear-btn" type="button">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="view_doc" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="min-width:70%; height:600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <?php echo form_open_multipart(uri_string(), array('id' => 'edit_cv_appraisal', 'name' => 'edit_cv_appraisal')); ?>
            <input type="hidden" name="edit_cv_appraisal" value="1">
            <div class="modal-body" id="doc_embed">

            </div>
            <div class="modal-footer">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


<div id="comments_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Comments</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div id="notification-message" class="alert ">

                </div>

            </div>
            <div class="modal-body">
                <div class="notification1 alert" id="notification-message1"></div>
                <div class="tg-editformholder">
                    <?php echo form_open('', array('id' => 'comments-send-form', 'class' => 'tg-formtheme tg-editform create_user_form')); ?>

                    <div class="card mb-4">
                        <div class="card-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group tg-inputwithicon">
                                            <label>Comments</label>
                                            <textarea rows="5" name="comments" id="comments" class="form-control"> </textarea>

                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" name="document_id" id="document_id">
                                <br />

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success" id="user-create-btn">Submit</button>

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    /*   $(document).ready(function() {
    var table = $('#document-list-table').DataTable();
 
    $('#document-list-table thead tr#filterboxrow th').each(function() {
 
        var title = $('#document-list-table thead tr#filterboxrow th').eq($(this).index()).text();
 
        $('#document-list-table thead').append($(this).html('<input id="input' + $(this).index() + '" type="text" class="form-control" placeholder="filter by ' + title + '" />')
            .css('padding-left', '4px'));
 
        $(this).on('keyup change', function() {
            table.column($(this).index()).search($('#input' + $(this).index()).val()).draw();
        });
    });
 
});*/



    $(document).ready(function() {

        $(".select2").select2({
            placeholder: 'Nothing Selected',
            width: '100%'
        });


        setTimeout(function() {
            $('.notification').hide(9000);

        }, 5000);



        function formatState(state) {



            var baseUrl = state.title;
            var $state = $(
                '<span><img width="30" height="30" src="' + baseUrl + '" class="img-flag" /> ' + state.text + '</span>'
            );
            return $state;
        };

        $(".to_user_id_selcet").select2({
            templateResult: formatState
        });





    });
    var site_url = '<?= base_url(); ?>';
    var searchtype = <?= $searchtype; ?>;



    $(".category_filter").on('click', function() {

        var cat = 'cat=' + $(this).data("category_id");

        // $('#document-list-table thead tr')
        //     .clone(true)
        //     .addClass('filters')
        //     .appendTo('#document-list-table thead');
        var pt = $("#document-list-table").DataTable({
            "bDestroy": true,
            "ajax": {
                "url": _base_url + "Document_List/get_document_list/" + cat,
                "dataSrc": 'data'
            },

            "createdRow": function(row, data, dataIndex) {
                console.log(data.id);
                if (data.rowClss == "row_red") {
                    $(row).addClass('row_red');
                }

                if (data.rowClss == "row_orange") {
                    $(row).addClass('row_orange');
                }

                if (data.rowClss == "row_green") {
                    $(row).addClass('row_green');
                }



            },

            "processing": true,
            "autoWidth": false,
            "ordering": true,
            orderCellsTop: true,
            fixedHeader: true,
            initComplete: function() {
                var api = this.api();

                // For each column
                api
                    .columns()
                    .eq(0)
                    .each(function(colIdx) {
                        
                        // On every keypress in this input
                        $(
                                'input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                            .off('keyup change')
                            .on('change', function(e) {
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api
                                    .column(colIdx)
                                    .search(
                                        this.value != '' ?
                                        regexr.replace('{search}', '(((' + this.value + ')))') :
                                        '',
                                        this.value != '',
                                        this.value == ''
                                    )
                                    .draw();
                            })
                            .on('keyup', function(e) {
                                e.stopPropagation();

                                $(this).trigger('change');
                                $(this)
                                    .focus()[0]
                                    .setSelectionRange(cursorPosition, cursorPosition);
                            });
                    });
            },
            "columns": [

                {
                    data: 'document_number'
                },

                {
                    data: '',
                    render: function(data, type, row, meta) {
                        var img = '-';

                        var img = '<img style="border-radius: 50%;" width="30" height="30" src="' + row.document_owner + '" >';

                        return img;
                    }
                },
                {
                    data: 'document_category'
                },
                {
                    data: 'document_subcategory'
                },

                {
                    data: 'date_of_1_issue'
                },
                {
                    data: 'date_of_current_issue'
                },


                {
                    data: 'live_revision_number'
                },
                {
                    data: 'status'
                },
                {
                    data: 'location'
                },
                {
                    data: 'type'
                },
                {
                    data: 'interval_months'
                },
                {
                    data: 'viewCout',
                    render: function(data, type, row, meta) {
                        var view_count = `<a class=""  href="${_base_url}/Document_List/document_viewer/${row.id}">${row.viewCout}</a>`;
                        return view_count;
                    }


                },
                {
                    data: 'date_of_next_review'
                },


                {
                    data: 'id',
                    render: function(data, type, row, meta) {
                        var delete_icon = '';
                        var pdf_icon = '';
                        var share_icon = '';
                        var list_icon = '';
                        var activeInactive = '';
                        var publish = '';
                        if (row.Rcount == 0) {

                            pdf_icon = `<a class="" href="javascript:document_shared_view_pdf(\'${data}\')"><i class="fa fa-file-pdf-o m-r-5"></i></a>`;



                            share_icon = `<a class="" href="javascript:share_document(\'${data}\')"><i class="fa fa-share-square-o m-r-5"></i></a>`;

                            list_icon = `<a class="" href="${_base_url}Document_List/document_revision/${data}"><i class="fa fa-list-alt m-r-5"></i></a>`;

                            if (row.document_published == 0) {
                                // Show delete icon
                                delete_icon = `<a class="" href="javascript:delete_document(\'${_base_url}Document_List/view/${data}/delete\')"><i class="fa fa-trash-o m-r-5"></i></a>`;
                            } else {
                                delete_icon = '';
                            }

                            delete_icon = `<a class="" href="javascript:delete_document(\'${_base_url}Document_List/view/${data}/delete\')"><i class="fa fa-trash-o m-r-5"></i></a>`;

                            //activeInactive=`<input type="checkbox" checked  data-toggle="toggle" data-on="Active" data-off="InActive">`;
                            if (row.document_status == 1) {
                                activeInactive = `<a  title="Active" class="" href="javascript:inactive_document(\'${_base_url}Document_List/statusChange/${data}/0\')"><i class="fa fa-toggle-on m-r-5"></i></a>`;
                            } else {
                                activeInactive = `<a  title="Inactive" class="" href="javascript:active_document(\'${_base_url}Document_List/statusChange/${data}/1\')"><i class="fa fa-toggle-off m-r-5"></i></a>`;
                            }

                            publish = `<a  title="Publish" class="" href="javascript:publish_document(\'${_base_url}Document_List/publishDocument/${data}/1\')"><i class="fa fa-calendar-check-o m-r-5"></i></a>`;


                            var comments = `<a class="" href="javascript:document_comments_owner(\'${data}\')"><i class="fa fa-comments-o m-r-5"></i></a>`;

                            var comments = `<a class="" href="${_base_url}Document_List/commments/${data}"><i class="fa fa-comments-o m-r-5"></i></a>`;


                        }

                        return `<a class="" href="${_base_url}Document_List/document_section/${data}"><i class="fa fa-edit m-r-5"></i></a> ` + pdf_icon + share_icon + list_icon + activeInactive + publish + comments + delete_icon;
                    }
                }
            ],
        });

    });

    $(window).on("load", function() {
        let d = new URLSearchParams(window.location.search).get('cat');
        $("#catgry_id" + d).click();
        var uri = window.location.toString();
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    });
</script>