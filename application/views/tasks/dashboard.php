<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title"> Tasks</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo  site_url('/admin/home'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Tasks</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->
<div class="chat-wrapper" style="min-height: 420px;position: relative">
    <div class="chat-main-row">
        <div class="chat-main-wrapper">
            <div class="col-lg-7 message-view task-view task-left-sidebar">
                <div class="chat-window">
                    <div class="fixed-header">
                        <div class="navbar">
                            <div class="float-left mr-auto">
                                <div class="add-task-btn-wrapper">
												<span class="add-task-btn btn btn-white btn-sm">
													Add Task
												</span>
                                </div>
                            </div>
                            <a class="task-chat profile-rightbar float-right" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>
                            <ul class="nav float-right custom-menu">
                                <li class="nav-item dropdown dropdown-action">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0)">Pending Tasks</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Completed Tasks</a>
                                        <a class="dropdown-item" href="javascript:void(0)">All Tasks</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-contents">
                        <div class="chat-content-wrap">
                            <div class="chat-wrap-inner">
                                <div class="chat-box">
                                    <div class="task-wrapper">
                                        <div class="task-list-container">
                                            <div class="task-list-body">
                                                <ul id="task-list">
                                                    <!--                                                    <li class="task">-->
                                                    <!--                                                        <div class="task-container">-->
                                                    <!--																		<span class="task-action-btn task-check">-->
                                                    <!--																			<span class="action-circle large complete-btn" title="Mark Complete">-->
                                                    <!--																				<i class="material-icons">check</i>-->
                                                    <!--																			</span>-->
                                                    <!--																		</span>-->
                                                    <!--                                                            <span class="task-label" contenteditable="true">Patient appointment booking</span>-->
                                                    <!--                                                            <span class="task-action-btn task-btn-right">-->
                                                    <!--																			<span class="action-circle large" title="Assign">-->
                                                    <!--																				<i class="material-icons">person_add</i>-->
                                                    <!--																			</span>-->
                                                    <!--																			<span class="action-circle large delete-btn" title="Delete Task">-->
                                                    <!--																				<i class="material-icons">delete</i>-->
                                                    <!--																			</span>-->
                                                    <!--																		</span>-->
                                                    <!--                                                        </div>-->
                                                    <!--                                                    </li>-->
                                                </ul>
                                            </div>
                                            <div class="task-list-footer">
                                                <div class="new-task-wrapper">
                                                    <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                    <span class="error-message hidden">You need to enter a task first</span>
                                                    <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                    <span class="btn" id="close-task-panel">Close</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="notification-popup hide">
                                        <p>
                                            <span class="task"></span>
                                            <span class="notification-text"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 message-view task-chat-view task-right-sidebar" id="task_window">
                <div class="chat-window">
                    <div class="fixed-header">
                        <div class="navbar">
                            <div class="task-assign">
                                <a class="task-complete-btn" id="task_complete" href="javascript:void(0);">
                                    <i class="material-icons">check</i> Mark Complete
                                </a>
                            </div>
                            <ul class="nav float-right custom-menu">
                                <li class="dropdown dropdown-action">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0)">Delete Task</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Settings</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-contents task-chat-contents">
                        <div class="chat-content-wrap">
                            <div class="chat-wrap-inner">
                                <div class="chat-box">
                                    <div class="chats">
                                        <h4>Hospital Administration Phase 1</h4>
                                        <div class="task-header">
                                            <div class="assignee-info">
                                                <a href="#" data-toggle="modal" data-target="#assignee">
                                                    <div class="avatar">
                                                        <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                                    </div>
                                                    <div class="assigned-info">
                                                        <div class="task-head-title">Assigned To</div>
                                                        <div class="task-assignee">John Doe</div>
                                                    </div>
                                                </a>
                                                <span class="remove-icon">
																<i class="fa fa-close"></i>
															</span>
                                            </div>
                                            <div class="task-due-date">
                                                <a href="#" data-toggle="modal" data-target="#assignee">
                                                    <div class="due-icon">
																	<span>
																		<i class="material-icons">date_range</i>
																	</span>
                                                    </div>
                                                    <div class="due-info">
                                                        <div class="task-head-title">Due Date</div>
                                                        <div class="due-date">Mar 26, 2019</div>
                                                    </div>
                                                </a>
                                                <span class="remove-icon">
																<i class="fa fa-close"></i>
															</span>
                                            </div>
                                        </div>
                                        <hr class="task-line">
                                        <div class="task-desc">
                                            <div class="task-desc-icon">
                                                <i class="material-icons">subject</i>
                                            </div>
                                            <div class="task-textarea">
                                                <textarea class="form-control" placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                        <hr class="task-line">
                                        <div class="task-information">
                                            <span class="task-info-line"><a class="task-user" href="#">Lesley Grauer</a> <span class="task-info-subject">created task</span></span>
                                            <div class="task-time">Jan 20, 2019</div>
                                        </div>
                                        <div class="task-information">
                                            <span class="task-info-line"><a class="task-user" href="#">Lesley Grauer</a> <span class="task-info-subject">added to Hospital Administration</span></span>
                                            <div class="task-time">Jan 20, 2019</div>
                                        </div>
                                        <div class="task-information">
                                            <span class="task-info-line"><a class="task-user" href="#">Lesley Grauer</a> <span class="task-info-subject">assigned to John Doe</span></span>
                                            <div class="task-time">Jan 20, 2019</div>
                                        </div>
                                        <hr class="task-line">
                                        <div class="task-information">
                                            <span class="task-info-line"><a class="task-user" href="#">John Doe</a> <span class="task-info-subject">changed the due date to Sep 28</span> </span>
                                            <div class="task-time">9:09pm</div>
                                        </div>
                                        <div class="task-information">
                                            <span class="task-info-line"><a class="task-user" href="#">John Doe</a> <span class="task-info-subject">assigned to you</span></span>
                                            <div class="task-time">9:10pm</div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a href="profile.html" class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-bubble">
                                                    <div class="chat-content">
                                                        <span class="task-chat-user">John Doe</span> <span class="chat-time">8:35 am</span>
                                                        <p>I'm just looking around.</p>
                                                        <p>Will you tell me something about yourself? </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="completed-task-msg"><span class="task-success"><a href="#">John Doe</a> completed this task.</span> <span class="task-time">Today at 9:27am</span></div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a href="profile.html" class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-bubble">
                                                    <div class="chat-content">
                                                        <span class="task-chat-user">John Doe</span> <span class="file-attached">attached 3 files <i class="fa fa-paperclip"></i></span> <span class="chat-time">Feb 17, 2019 at 4:32am</span>
                                                        <ul class="attach-list">
                                                            <li><i class="fa fa-file"></i> <a href="#">project_document.avi</a></li>
                                                            <li><i class="fa fa-file"></i> <a href="#">video_conferencing.psd</a></li>
                                                            <li><i class="fa fa-file"></i> <a href="#">landing_page.psd</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a href="profile.html" class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-bubble">
                                                    <div class="chat-content">
                                                        <span class="task-chat-user">Jeffery Lalor</span> <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span> <span class="chat-time">Yesterday at 9:16pm</span>
                                                        <ul class="attach-list">
                                                            <li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">Document_2016.pdf</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a href="profile.html" class="avatar">
                                                    <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-bubble">
                                                    <div class="chat-content">
                                                        <span class="task-chat-user">Jeffery Lalor</span> <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span> <span class="chat-time">Today at 12:42pm</span>
                                                        <ul class="attach-list">
                                                            <li class="img-file">
                                                                <div class="attach-img-download"><a href="#">avatar-1.jpg</a></div>
                                                                <div class="task-attach-img"><img src="assets/img/user.jpg" alt=""></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="task-information">
														<span class="task-info-line">
															<a class="task-user" href="#">John Doe</a>
															<span class="task-info-subject">marked task as incomplete</span>
														</span>
                                            <div class="task-time">1:16pm</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-footer">
                        <div class="message-bar">
                            <div class="message-inner">
                                <a class="link attach-icon" href="#"><img src="assets/img/attachment.png" alt=""></a>
                                <div class="message-area">
                                    <div class="input-group">
                                        <textarea class="form-control" placeholder="Type message..."></textarea>
                                        <span class="input-group-append">
														<button class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
													</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-members task-followers">
                            <span class="followers-title">Followers</span>
                            <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor">
                                <img alt="" src="assets/img/profiles/avatar-16.jpg">
                            </a>
                            <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles">
                                <img alt="" src="assets/img/profiles/avatar-09.jpg">
                            </a>
                            <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="John Smith">
                                <img alt="" src="assets/img/profiles/avatar-10.jpg">
                            </a>
                            <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus">
                                <img alt="" src="assets/img/profiles/avatar-05.jpg">
                            </a>
                            <a href="#" class="followers-add" data-toggle="modal" data-target="#task_followers"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Project Modal -->
    <div id="create_project" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Client</label>
                                    <select class="select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="3">Global Technologies</option>
                                        <option>Delta Infotech</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single"
                                                                                                                                                                                                 role="combobox" aria-haspopup="true"
                                                                                                                                                                                                 aria-expanded="false" tabindex="0"
                                                                                                                                                                                                 aria-labelledby="select2-8ika-container"><span
                                                    class="select2-selection__rendered" id="select2-8ika-container" role="textbox" aria-readonly="true" title="Global Technologies">Global Technologies</span><span class="select2-selection__arrow"
                                                                                                                                                                                                                    role="presentation"><b
                                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input placeholder="$50" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <select class="select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="6">Hourly</option>
                                        <option>Fixed</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single"
                                                                                                                                                                                                 role="combobox" aria-haspopup="true"
                                                                                                                                                                                                 aria-expanded="false" tabindex="0"
                                                                                                                                                                                                 aria-labelledby="select2-ia5k-container"><span
                                                    class="select2-selection__rendered" id="select2-ia5k-container" role="textbox" aria-readonly="true" title="Hourly">Hourly</span><span class="select2-selection__arrow" role="presentation"><b
                                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Priority</label>
                                    <select class="select select2-hidden-accessible" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="9">High</option>
                                        <option>Medium</option>
                                        <option>Low</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single"
                                                                                                                                                                                                 role="combobox" aria-haspopup="true"
                                                                                                                                                                                                 aria-expanded="false" tabindex="0"
                                                                                                                                                                                                 aria-labelledby="select2-ahfv-container"><span
                                                    class="select2-selection__rendered" id="select2-ahfv-container" role="textbox" aria-readonly="true" title="High">High</span><span class="select2-selection__arrow" role="presentation"><b
                                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add Project Leader</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Team Leader</label>
                                    <div class="project-members">
                                        <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor">
                                            <img alt="" src="assets/img/profiles/avatar-16.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Add Team</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Team Members</label>
                                    <div class="project-members">
                                        <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="John Doe">
                                            <img alt="" src="assets/img/profiles/avatar-02.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles">
                                            <img alt="" src="assets/img/profiles/avatar-09.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="John Smith">
                                            <img alt="" src="assets/img/profiles/avatar-10.jpg">
                                        </a>
                                        <a class="avatar" href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus">
                                            <img alt="" src="assets/img/profiles/avatar-05.jpg">
                                        </a>
                                        <span class="all-team">+2</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="4" class="form-control summernote" placeholder="Enter your message here" style="display: none;"></textarea>
                            <div class="note-editor note-frame card">
                                <div class="note-dropzone">
                                    <div class="note-dropzone-message"></div>
                                </div>
                                <div class="note-toolbar card-header" role="toolbar" style="position: relative; top: 0px; width: 100%;">
                                    <div class="note-btn-group btn-group note-style">
                                        <div class="note-btn-group btn-group">
                                            <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" role="button" tabindex="-1" data-toggle="dropdown" title="" aria-label="Style" data-original-title="Style"><i
                                                    class="note-icon-magic"></i></button>
                                            <div class="dropdown-menu dropdown-style" role="list" aria-label="Style"><a class="dropdown-item" href="#" data-value="p" role="listitem" aria-label="p"><p>Normal</p></a><a class="dropdown-item" href="#"
                                                                                                                                                                                                                         data-value="blockquote"
                                                                                                                                                                                                                         role="listitem"
                                                                                                                                                                                                                         aria-label="[object Object]">
                                                    <blockquote class="blockquote">Blockquote</blockquote>
                                                </a><a class="dropdown-item" href="#" data-value="h1" role="listitem" aria-label="h1"><h1>Header 1</h1></a><a class="dropdown-item" href="#" data-value="h2" role="listitem" aria-label="h2"><h2>Header
                                                        2</h2></a><a class="dropdown-item" href="#" data-value="h3" role="listitem" aria-label="h3"><h3>Header 3</h3></a><a class="dropdown-item" href="#" data-value="h4" role="listitem"
                                                                                                                                                                            aria-label="h4"><h4>Header 4</h4></a><a class="dropdown-item" href="#"
                                                                                                                                                                                                                    data-value="h5" role="listitem"
                                                                                                                                                                                                                    aria-label="h5"><h5>Header 5</h5>
                                                </a><a class="dropdown-item" href="#" data-value="h6" role="listitem" aria-label="h6"><h6>Header 6</h6></a></div>
                                        </div>
                                    </div>
                                    <div class="note-btn-group btn-group note-font">
                                        <button type="button" class="note-btn btn btn-light btn-sm note-btn-bold" role="button" tabindex="-1" title="" aria-label="Bold (⌘+B)" data-original-title="Bold (⌘+B)"><i class="note-icon-bold"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm note-btn-underline" role="button" tabindex="-1" title="" aria-label="Underline (⌘+U)" data-original-title="Underline (⌘+U)"><i
                                                class="note-icon-underline"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Remove Font Style (⌘+\)" data-original-title="Remove Font Style (⌘+\)"><i
                                                class="note-icon-eraser"></i></button>
                                    </div>
                                    <div class="note-btn-group btn-group note-fontname">
                                        <div class="note-btn-group btn-group">
                                            <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" role="button" tabindex="-1" data-toggle="dropdown" title="" aria-label="Font Family" data-original-title="Font Family"><span
                                                    class="note-current-fontname" style="font-family: CircularStd;">CircularStd</span></button>
                                            <div class="dropdown-menu note-check dropdown-fontname" role="list" aria-label="Font Family"><a class="dropdown-item" href="#" data-value="Arial" role="listitem" aria-label="Arial"><i
                                                        class="note-icon-menu-check"></i> <span style="font-family: 'Arial'">Arial</span></a><a class="dropdown-item" href="#" data-value="Arial Black" role="listitem" aria-label="Arial Black"><i
                                                        class="note-icon-menu-check"></i> <span style="font-family: 'Arial Black'">Arial Black</span></a><a class="dropdown-item" href="#" data-value="Comic Sans MS" role="listitem"
                                                                                                                                                            aria-label="Comic Sans MS"><i class="note-icon-menu-check"></i> <span
                                                        style="font-family: 'Comic Sans MS'">Comic Sans MS</span></a><a class="dropdown-item" href="#" data-value="Courier New" role="listitem" aria-label="Courier New"><i
                                                        class="note-icon-menu-check"></i> <span style="font-family: 'Courier New'">Courier New</span></a><a class="dropdown-item" href="#" data-value="Helvetica Neue" role="listitem"
                                                                                                                                                            aria-label="Helvetica Neue"><i class="note-icon-menu-check"></i> <span
                                                        style="font-family: 'Helvetica Neue'">Helvetica Neue</span></a><a class="dropdown-item" href="#" data-value="Helvetica" role="listitem" aria-label="Helvetica"><i
                                                        class="note-icon-menu-check"></i> <span style="font-family: 'Helvetica'">Helvetica</span></a><a class="dropdown-item" href="#" data-value="Impact" role="listitem" aria-label="Impact"><i
                                                        class="note-icon-menu-check"></i> <span style="font-family: 'Impact'">Impact</span></a><a class="dropdown-item" href="#" data-value="Lucida Grande" role="listitem" aria-label="Lucida Grande"><i
                                                        class="note-icon-menu-check"></i> <span style="font-family: 'Lucida Grande'">Lucida Grande</span></a><a class="dropdown-item" href="#" data-value="Tahoma" role="listitem" aria-label="Tahoma"><i
                                                        class="note-icon-menu-check"></i> <span style="font-family: 'Tahoma'">Tahoma</span></a><a class="dropdown-item" href="#" data-value="Times New Roman" role="listitem"
                                                                                                                                                  aria-label="Times New Roman"><i class="note-icon-menu-check"></i> <span
                                                        style="font-family: 'Times New Roman'">Times New Roman</span></a><a class="dropdown-item" href="#" data-value="Verdana" role="listitem" aria-label="Verdana"><i class="note-icon-menu-check"></i>
                                                    <span style="font-family: 'Verdana'">Verdana</span></a><a class="dropdown-item checked" href="#" data-value="CircularStd" role="listitem" aria-label="CircularStd"><i
                                                        class="note-icon-menu-check"></i> <span style="font-family: 'CircularStd'">CircularStd</span></a></div>
                                        </div>
                                    </div>
                                    <div class="note-btn-group btn-group note-color">
                                        <div class="note-btn-group btn-group note-color note-color-all">
                                            <button type="button" class="note-btn btn btn-light btn-sm note-current-color-button" role="button" tabindex="-1" title="" aria-label="Recent Color" data-original-title="Recent Color"
                                                    data-backcolor="#FFFF00"><i class="note-icon-font note-recent-color" style="background-color: rgb(255, 255, 0);"></i></button>
                                            <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" role="button" tabindex="-1" data-toggle="dropdown" title="" aria-label="More Color" data-original-title="More Color"></button>
                                            <div class="dropdown-menu" role="list">
                                                <div class="note-palette">
                                                    <div class="note-palette-title">Background Color</div>
                                                    <div>
                                                        <button type="button" class="note-color-reset btn btn-light" data-event="backColor" data-value="inherit">Transparent</button>
                                                    </div>
                                                    <div class="note-holder" data-event="backColor">
                                                        <div class="note-color-palette">
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#000000" data-event="backColor" data-value="#000000" title="" aria-label="Black" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Black"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#424242" data-event="backColor" data-value="#424242" title="" aria-label="Tundora" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Tundora"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#636363" data-event="backColor" data-value="#636363" title="" aria-label="Dove Gray" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Dove Gray"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#9C9C94" data-event="backColor" data-value="#9C9C94" title="" aria-label="Star Dust" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Star Dust"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#CEC6CE" data-event="backColor" data-value="#CEC6CE" title="" aria-label="Pale Slate" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Pale Slate"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#EFEFEF" data-event="backColor" data-value="#EFEFEF" title="" aria-label="Gallery" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Gallery"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#F7F7F7" data-event="backColor" data-value="#F7F7F7" title="" aria-label="Alabaster" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Alabaster"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="White" data-toggle="button" tabindex="-1"
                                                                        data-original-title="White"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#FF0000" data-event="backColor" data-value="#FF0000" title="" aria-label="Red" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Red"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FF9C00" data-event="backColor" data-value="#FF9C00" title="" aria-label="Orange Peel" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Orange Peel"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFF00" data-event="backColor" data-value="#FFFF00" title="" aria-label="Yellow" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Yellow"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#00FF00" data-event="backColor" data-value="#00FF00" title="" aria-label="Green" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Green"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#00FFFF" data-event="backColor" data-value="#00FFFF" title="" aria-label="Cyan" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Cyan"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#0000FF" data-event="backColor" data-value="#0000FF" title="" aria-label="Blue" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#9C00FF" data-event="backColor" data-value="#9C00FF" title="" aria-label="Electric Violet" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Electric Violet"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FF00FF" data-event="backColor" data-value="#FF00FF" title="" aria-label="Magenta" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Magenta"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#F7C6CE" data-event="backColor" data-value="#F7C6CE" title="" aria-label="Azalea" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Azalea"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFE7CE" data-event="backColor" data-value="#FFE7CE" title="" aria-label="Karry" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Karry"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFEFC6" data-event="backColor" data-value="#FFEFC6" title="" aria-label="Egg White" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Egg White"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#D6EFD6" data-event="backColor" data-value="#D6EFD6" title="" aria-label="Zanah" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Zanah"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#CEDEE7" data-event="backColor" data-value="#CEDEE7" title="" aria-label="Botticelli" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Botticelli"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#CEE7F7" data-event="backColor" data-value="#CEE7F7" title="" aria-label="Tropical Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Tropical Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#D6D6E7" data-event="backColor" data-value="#D6D6E7" title="" aria-label="Mischka" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Mischka"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#E7D6DE" data-event="backColor" data-value="#E7D6DE" title="" aria-label="Twilight" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Twilight"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#E79C9C" data-event="backColor" data-value="#E79C9C" title="" aria-label="Tonys Pink" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Tonys Pink"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFC69C" data-event="backColor" data-value="#FFC69C" title="" aria-label="Peach Orange" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Peach Orange"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFE79C" data-event="backColor" data-value="#FFE79C" title="" aria-label="Cream Brulee" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Cream Brulee"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#B5D6A5" data-event="backColor" data-value="#B5D6A5" title="" aria-label="Sprout" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Sprout"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#A5C6CE" data-event="backColor" data-value="#A5C6CE" title="" aria-label="Casper" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Casper"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#9CC6EF" data-event="backColor" data-value="#9CC6EF" title="" aria-label="Perano" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Perano"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#B5A5D6" data-event="backColor" data-value="#B5A5D6" title="" aria-label="Cold Purple" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Cold Purple"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#D6A5BD" data-event="backColor" data-value="#D6A5BD" title="" aria-label="Careys Pink" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Careys Pink"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#E76363" data-event="backColor" data-value="#E76363" title="" aria-label="Mandy" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Mandy"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#F7AD6B" data-event="backColor" data-value="#F7AD6B" title="" aria-label="Rajah" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Rajah"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFD663" data-event="backColor" data-value="#FFD663" title="" aria-label="Dandelion" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Dandelion"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#94BD7B" data-event="backColor" data-value="#94BD7B" title="" aria-label="Olivine" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Olivine"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#73A5AD" data-event="backColor" data-value="#73A5AD" title="" aria-label="Gulf Stream" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Gulf Stream"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#6BADDE" data-event="backColor" data-value="#6BADDE" title="" aria-label="Viking" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Viking"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#8C7BC6" data-event="backColor" data-value="#8C7BC6" title="" aria-label="Blue Marguerite" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Blue Marguerite"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#C67BA5" data-event="backColor" data-value="#C67BA5" title="" aria-label="Puce" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Puce"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#CE0000" data-event="backColor" data-value="#CE0000" title="" aria-label="Guardsman Red" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Guardsman Red"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#E79439" data-event="backColor" data-value="#E79439" title="" aria-label="Fire Bush" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Fire Bush"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#EFC631" data-event="backColor" data-value="#EFC631" title="" aria-label="Golden Dream" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Golden Dream"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#6BA54A" data-event="backColor" data-value="#6BA54A" title="" aria-label="Chelsea Cucumber" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Chelsea Cucumber"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#4A7B8C" data-event="backColor" data-value="#4A7B8C" title="" aria-label="Smalt Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Smalt Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#3984C6" data-event="backColor" data-value="#3984C6" title="" aria-label="Boston Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Boston Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#634AA5" data-event="backColor" data-value="#634AA5" title="" aria-label="Butterfly Bush" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Butterfly Bush"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#A54A7B" data-event="backColor" data-value="#A54A7B" title="" aria-label="Cadillac" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Cadillac"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#9C0000" data-event="backColor" data-value="#9C0000" title="" aria-label="Sangria" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Sangria"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#B56308" data-event="backColor" data-value="#B56308" title="" aria-label="Mai Tai" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Mai Tai"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#BD9400" data-event="backColor" data-value="#BD9400" title="" aria-label="Buddha Gold" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Buddha Gold"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#397B21" data-event="backColor" data-value="#397B21" title="" aria-label="Forest Green" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Forest Green"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#104A5A" data-event="backColor" data-value="#104A5A" title="" aria-label="Eden" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Eden"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#085294" data-event="backColor" data-value="#085294" title="" aria-label="Venice Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Venice Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#311873" data-event="backColor" data-value="#311873" title="" aria-label="Meteorite" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Meteorite"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#731842" data-event="backColor" data-value="#731842" title="" aria-label="Claret" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Claret"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#630000" data-event="backColor" data-value="#630000" title="" aria-label="Rosewood" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Rosewood"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#7B3900" data-event="backColor" data-value="#7B3900" title="" aria-label="Cinnamon" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Cinnamon"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#846300" data-event="backColor" data-value="#846300" title="" aria-label="Olive" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Olive"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#295218" data-event="backColor" data-value="#295218" title="" aria-label="Parsley" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Parsley"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#083139" data-event="backColor" data-value="#083139" title="" aria-label="Tiber" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Tiber"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#003163" data-event="backColor" data-value="#003163" title="" aria-label="Midnight Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Midnight Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#21104A" data-event="backColor" data-value="#21104A" title="" aria-label="Valentino" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Valentino"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#4A1031" data-event="backColor" data-value="#4A1031" title="" aria-label="Loulou" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Loulou"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="note-color-select btn" data-event="openPalette" data-value="backColorPicker">Select</button>
                                                        <input type="color" id="backColorPicker" class="note-btn note-color-select-btn" value="#FFFF00" data-event="backColorPalette"></div>
                                                    <div class="note-holder-custom" id="backColorPalette" data-event="backColor">
                                                        <div class="note-color-palette">
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1"
                                                                        data-original-title="#FFFFFF"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1"
                                                                        data-original-title="#FFFFFF"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1"
                                                                        data-original-title="#FFFFFF"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1"
                                                                        data-original-title="#FFFFFF"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1"
                                                                        data-original-title="#FFFFFF"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1"
                                                                        data-original-title="#FFFFFF"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1"
                                                                        data-original-title="#FFFFFF"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="backColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button" tabindex="-1"
                                                                        data-original-title="#FFFFFF"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="note-palette">
                                                    <div class="note-palette-title">Foreground Color</div>
                                                    <div>
                                                        <button type="button" class="note-color-reset btn btn-light" data-event="removeFormat" data-value="foreColor">Reset to default</button>
                                                    </div>
                                                    <div class="note-holder" data-event="foreColor">
                                                        <div class="note-color-palette">
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#000000" data-event="foreColor" data-value="#000000" title="" aria-label="Black" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Black"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#424242" data-event="foreColor" data-value="#424242" title="" aria-label="Tundora" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Tundora"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#636363" data-event="foreColor" data-value="#636363" title="" aria-label="Dove Gray" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Dove Gray"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#9C9C94" data-event="foreColor" data-value="#9C9C94" title="" aria-label="Star Dust" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Star Dust"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#CEC6CE" data-event="foreColor" data-value="#CEC6CE" title="" aria-label="Pale Slate" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Pale Slate"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#EFEFEF" data-event="foreColor" data-value="#EFEFEF" title="" aria-label="Gallery" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Gallery"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#F7F7F7" data-event="foreColor" data-value="#F7F7F7" title="" aria-label="Alabaster" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Alabaster"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="White" data-toggle="button" tabindex="-1"
                                                                        data-original-title="White"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#FF0000" data-event="foreColor" data-value="#FF0000" title="" aria-label="Red" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Red"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FF9C00" data-event="foreColor" data-value="#FF9C00" title="" aria-label="Orange Peel" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Orange Peel"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFFF00" data-event="foreColor" data-value="#FFFF00" title="" aria-label="Yellow" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Yellow"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#00FF00" data-event="foreColor" data-value="#00FF00" title="" aria-label="Green" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Green"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#00FFFF" data-event="foreColor" data-value="#00FFFF" title="" aria-label="Cyan" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Cyan"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#0000FF" data-event="foreColor" data-value="#0000FF" title="" aria-label="Blue" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#9C00FF" data-event="foreColor" data-value="#9C00FF" title="" aria-label="Electric Violet" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Electric Violet"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FF00FF" data-event="foreColor" data-value="#FF00FF" title="" aria-label="Magenta" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Magenta"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#F7C6CE" data-event="foreColor" data-value="#F7C6CE" title="" aria-label="Azalea" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Azalea"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFE7CE" data-event="foreColor" data-value="#FFE7CE" title="" aria-label="Karry" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Karry"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFEFC6" data-event="foreColor" data-value="#FFEFC6" title="" aria-label="Egg White" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Egg White"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#D6EFD6" data-event="foreColor" data-value="#D6EFD6" title="" aria-label="Zanah" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Zanah"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#CEDEE7" data-event="foreColor" data-value="#CEDEE7" title="" aria-label="Botticelli" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Botticelli"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#CEE7F7" data-event="foreColor" data-value="#CEE7F7" title="" aria-label="Tropical Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Tropical Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#D6D6E7" data-event="foreColor" data-value="#D6D6E7" title="" aria-label="Mischka" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Mischka"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#E7D6DE" data-event="foreColor" data-value="#E7D6DE" title="" aria-label="Twilight" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Twilight"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#E79C9C" data-event="foreColor" data-value="#E79C9C" title="" aria-label="Tonys Pink" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Tonys Pink"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFC69C" data-event="foreColor" data-value="#FFC69C" title="" aria-label="Peach Orange" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Peach Orange"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFE79C" data-event="foreColor" data-value="#FFE79C" title="" aria-label="Cream Brulee" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Cream Brulee"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#B5D6A5" data-event="foreColor" data-value="#B5D6A5" title="" aria-label="Sprout" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Sprout"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#A5C6CE" data-event="foreColor" data-value="#A5C6CE" title="" aria-label="Casper" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Casper"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#9CC6EF" data-event="foreColor" data-value="#9CC6EF" title="" aria-label="Perano" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Perano"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#B5A5D6" data-event="foreColor" data-value="#B5A5D6" title="" aria-label="Cold Purple" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Cold Purple"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#D6A5BD" data-event="foreColor" data-value="#D6A5BD" title="" aria-label="Careys Pink" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Careys Pink"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#E76363" data-event="foreColor" data-value="#E76363" title="" aria-label="Mandy" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Mandy"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#F7AD6B" data-event="foreColor" data-value="#F7AD6B" title="" aria-label="Rajah" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Rajah"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#FFD663" data-event="foreColor" data-value="#FFD663" title="" aria-label="Dandelion" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Dandelion"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#94BD7B" data-event="foreColor" data-value="#94BD7B" title="" aria-label="Olivine" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Olivine"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#73A5AD" data-event="foreColor" data-value="#73A5AD" title="" aria-label="Gulf Stream" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Gulf Stream"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#6BADDE" data-event="foreColor" data-value="#6BADDE" title="" aria-label="Viking" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Viking"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#8C7BC6" data-event="foreColor" data-value="#8C7BC6" title="" aria-label="Blue Marguerite" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Blue Marguerite"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#C67BA5" data-event="foreColor" data-value="#C67BA5" title="" aria-label="Puce" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Puce"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#CE0000" data-event="foreColor" data-value="#CE0000" title="" aria-label="Guardsman Red" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Guardsman Red"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#E79439" data-event="foreColor" data-value="#E79439" title="" aria-label="Fire Bush" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Fire Bush"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#EFC631" data-event="foreColor" data-value="#EFC631" title="" aria-label="Golden Dream" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Golden Dream"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#6BA54A" data-event="foreColor" data-value="#6BA54A" title="" aria-label="Chelsea Cucumber" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Chelsea Cucumber"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#4A7B8C" data-event="foreColor" data-value="#4A7B8C" title="" aria-label="Smalt Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Smalt Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#3984C6" data-event="foreColor" data-value="#3984C6" title="" aria-label="Boston Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Boston Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#634AA5" data-event="foreColor" data-value="#634AA5" title="" aria-label="Butterfly Bush" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Butterfly Bush"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#A54A7B" data-event="foreColor" data-value="#A54A7B" title="" aria-label="Cadillac" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Cadillac"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#9C0000" data-event="foreColor" data-value="#9C0000" title="" aria-label="Sangria" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Sangria"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#B56308" data-event="foreColor" data-value="#B56308" title="" aria-label="Mai Tai" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Mai Tai"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#BD9400" data-event="foreColor" data-value="#BD9400" title="" aria-label="Buddha Gold" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Buddha Gold"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#397B21" data-event="foreColor" data-value="#397B21" title="" aria-label="Forest Green" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Forest Green"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#104A5A" data-event="foreColor" data-value="#104A5A" title="" aria-label="Eden" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Eden"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#085294" data-event="foreColor" data-value="#085294" title="" aria-label="Venice Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Venice Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#311873" data-event="foreColor" data-value="#311873" title="" aria-label="Meteorite" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Meteorite"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#731842" data-event="foreColor" data-value="#731842" title="" aria-label="Claret" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Claret"></button>
                                                            </div>
                                                            <div class="note-color-row">
                                                                <button type="button" class="note-color-btn" style="background-color:#630000" data-event="foreColor" data-value="#630000" title="" aria-label="Rosewood" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Rosewood"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#7B3900" data-event="foreColor" data-value="#7B3900" title="" aria-label="Cinnamon" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Cinnamon"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#846300" data-event="foreColor" data-value="#846300" title="" aria-label="Olive" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Olive"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#295218" data-event="foreColor" data-value="#295218" title="" aria-label="Parsley" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Parsley"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#083139" data-event="foreColor" data-value="#083139" title="" aria-label="Tiber" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Tiber"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#003163" data-event="foreColor" data-value="#003163" title="" aria-label="Midnight Blue" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Midnight Blue"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#21104A" data-event="foreColor" data-value="#21104A" title="" aria-label="Valentino" data-toggle="button"
                                                                        tabindex="-1" data-original-title="Valentino"></button>
                                                                <button type="button" class="note-color-btn" style="background-color:#4A1031" data-event="foreColor" data-value="#4A1031" title="" aria-label="Loulou" data-toggle="button" tabindex="-1"
                                                                        data-original-title="Loulou"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="button" class="note-color-select btn" data-event="openPalette" data-value="foreColorPicker">Select</button>
                                                        <input type="color" id="foreColorPicker" class="note-btn note-color-select-btn" value="#000000" data-event="foreColorPalette">
                                                        <div class="note-holder-custom" id="foreColorPalette" data-event="foreColor">
                                                            <div class="note-color-palette">
                                                                <div class="note-color-row">
                                                                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button"
                                                                            tabindex="-1" data-original-title="#FFFFFF"></button>
                                                                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button"
                                                                            tabindex="-1" data-original-title="#FFFFFF"></button>
                                                                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button"
                                                                            tabindex="-1" data-original-title="#FFFFFF"></button>
                                                                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button"
                                                                            tabindex="-1" data-original-title="#FFFFFF"></button>
                                                                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button"
                                                                            tabindex="-1" data-original-title="#FFFFFF"></button>
                                                                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button"
                                                                            tabindex="-1" data-original-title="#FFFFFF"></button>
                                                                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button"
                                                                            tabindex="-1" data-original-title="#FFFFFF"></button>
                                                                    <button type="button" class="note-color-btn" style="background-color:#FFFFFF" data-event="foreColor" data-value="#FFFFFF" title="" aria-label="#FFFFFF" data-toggle="button"
                                                                            tabindex="-1" data-original-title="#FFFFFF"></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="note-btn-group btn-group note-para">
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Unordered list (⌘+⇧+NUM7)" data-original-title="Unordered list (⌘+⇧+NUM7)"><i
                                                class="note-icon-unorderedlist"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Ordered list (⌘+⇧+NUM8)" data-original-title="Ordered list (⌘+⇧+NUM8)"><i
                                                class="note-icon-orderedlist"></i></button>
                                        <div class="note-btn-group btn-group">
                                            <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" role="button" tabindex="-1" data-toggle="dropdown" title="" aria-label="Paragraph" data-original-title="Paragraph"><i
                                                    class="note-icon-align-left"></i></button>
                                            <div class="dropdown-menu" role="list">
                                                <div class="note-btn-group btn-group note-align">
                                                    <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Align left (⌘+⇧+L)" data-original-title="Align left (⌘+⇧+L)"><i
                                                            class="note-icon-align-left"></i></button>
                                                    <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Align center (⌘+⇧+E)" data-original-title="Align center (⌘+⇧+E)"><i
                                                            class="note-icon-align-center"></i></button>
                                                    <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Align right (⌘+⇧+R)" data-original-title="Align right (⌘+⇧+R)"><i
                                                            class="note-icon-align-right"></i></button>
                                                    <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Justify full (⌘+⇧+J)" data-original-title="Justify full (⌘+⇧+J)"><i
                                                            class="note-icon-align-justify"></i></button>
                                                </div>
                                                <div class="note-btn-group btn-group note-list">
                                                    <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Outdent (⌘+[)" data-original-title="Outdent (⌘+[)"><i
                                                            class="note-icon-align-outdent"></i></button>
                                                    <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Indent (⌘+])" data-original-title="Indent (⌘+])"><i class="note-icon-align-indent"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="note-btn-group btn-group note-table">
                                        <div class="note-btn-group btn-group">
                                            <button type="button" class="note-btn btn btn-light btn-sm dropdown-toggle" role="button" tabindex="-1" data-toggle="dropdown" title="" aria-label="Table" data-original-title="Table"><i
                                                    class="note-icon-table"></i></button>
                                            <div class="dropdown-menu note-table" role="list" aria-label="Table">
                                                <div class="note-dimension-picker">
                                                    <div class="note-dimension-picker-mousecatcher" data-event="insertTable" data-value="1x1" style="width: 10em; height: 10em;"></div>
                                                    <div class="note-dimension-picker-highlighted"></div>
                                                    <div class="note-dimension-picker-unhighlighted"></div>
                                                </div>
                                                <div class="note-dimension-display">1 x 1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="note-btn-group btn-group note-insert">
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Link (⌘+K)" data-original-title="Link (⌘+K)"><i class="note-icon-link"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Picture" data-original-title="Picture"><i class="note-icon-picture"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Video" data-original-title="Video"><i class="note-icon-video"></i></button>
                                    </div>
                                    <div class="note-btn-group btn-group note-view">
                                        <button type="button" class="note-btn btn btn-light btn-sm btn-fullscreen" role="button" tabindex="-1" title="" aria-label="Full Screen" data-original-title="Full Screen"><i class="note-icon-arrows-alt"></i>
                                        </button>
                                        <button type="button" class="note-btn btn btn-light btn-sm btn-codeview" role="button" tabindex="-1" title="" aria-label="Code View" data-original-title="Code View"><i class="note-icon-code"></i></button>
                                        <button type="button" class="note-btn btn btn-light btn-sm" role="button" tabindex="-1" title="" aria-label="Help" data-original-title="Help"><i class="note-icon-question"></i></button>
                                    </div>
                                </div>
                                <div class="note-editing-area">
                                    <div class="note-handle">
                                        <div class="note-control-selection">
                                            <div class="note-control-selection-bg"></div>
                                            <div class="note-control-holder note-control-nw"></div>
                                            <div class="note-control-holder note-control-ne"></div>
                                            <div class="note-control-holder note-control-sw"></div>
                                            <div class="note-control-sizing note-control-se"></div>
                                            <div class="note-control-selection-info"></div>
                                        </div>
                                    </div>
                                    <textarea class="note-codable" role="textbox" aria-multiline="true"></textarea>
                                    <div class="note-editable card-block" contenteditable="true" role="textbox" aria-multiline="true" style="height: 200px;"><p><br></p></div>
                                </div>
                                <output class="note-status-output" aria-live="polite"></output>
                                <div class="note-statusbar" role="status">
                                    <output class="note-status-output" aria-live="polite"></output>
                                    <div class="note-resizebar" role="seperator" aria-orientation="horizontal" aria-label="Resize">
                                        <div class="note-icon-bar"></div>
                                        <div class="note-icon-bar"></div>
                                        <div class="note-icon-bar"></div>
                                    </div>
                                </div>
                                <div class="modal link-dialog" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Link">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title">Insert Link</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group note-form-group"><label class="note-form-label">Text to display</label><input class="note-link-text form-control note-form-control note-input" type="text"></div>
                                                <div class="form-group note-form-group"><label class="note-form-label">To what URL should this link go?</label><input class="note-link-url form-control note-form-control note-input" type="text"
                                                                                                                                                                      value="http://"></div>
                                                <div class="form-check sn-checkbox-open-in-new-window"><label class="form-check-label"> <input role="checkbox" type="checkbox" class="form-check-input" checked="" aria-label="Open in new window"
                                                                                                                                               aria-checked="true"> Open in new window</label></div>
                                            </div>
                                            <div class="modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-link-btn" value="Insert Link" disabled=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Image">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title">Insert Image</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group note-form-group note-group-select-from-files"><label class="note-form-label">Select from files</label><input class="note-image-input note-form-control note-input" type="file"
                                                                                                                                                                                    name="files" accept="image/*" multiple="multiple"></div>
                                                <div class="form-group note-group-image-url" style="overflow:auto;"><label class="note-form-label">Image URL</label><input class="note-image-url form-control note-form-control note-input  col-md-12"
                                                                                                                                                                           type="text"></div>
                                            </div>
                                            <div class="modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-image-btn" value="Insert Image" disabled=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Insert Video">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title">Insert Video</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group note-form-group row-fluid"><label class="note-form-label">Video URL <small class="text-muted">(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)</small></label><input
                                                        class="note-video-url form-control note-form-control note-input" type="text"></div>
                                            </div>
                                            <div class="modal-footer"><input type="button" href="#" class="btn btn-primary note-btn note-btn-primary note-video-btn" value="Insert Video" disabled=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" aria-hidden="false" tabindex="-1" role="dialog" aria-label="Help">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><h4 class="modal-title">Help</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body" style="max-height: 300px; overflow: scroll;">
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>ENTER</kbd></label><span>Insert Paragraph</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+Z</kbd></label><span>Undoes the last command</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+SHIFT+Z</kbd></label><span>Redoes the last command</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>TAB</kbd></label><span>Tab</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>SHIFT+TAB</kbd></label><span>Untab</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+B</kbd></label><span>Set a bold style</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+I</kbd></label><span>Set a italic style</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+U</kbd></label><span>Set a underline style</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+SHIFT+S</kbd></label><span>Set a strikethrough style</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+BACKSLASH</kbd></label><span>Clean a style</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+SHIFT+L</kbd></label><span>Set left align</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+SHIFT+E</kbd></label><span>Set center align</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+SHIFT+R</kbd></label><span>Set right align</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+SHIFT+J</kbd></label><span>Set full align</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+SHIFT+NUM7</kbd></label><span>Toggle unordered list</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+SHIFT+NUM8</kbd></label><span>Toggle ordered list</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+LEFTBRACKET</kbd></label><span>Outdent on current paragraph</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+RIGHTBRACKET</kbd></label><span>Indent on current paragraph</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+NUM0</kbd></label><span>Change current block's format as a paragraph(P tag)</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+NUM1</kbd></label><span>Change current block's format as H1</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+NUM2</kbd></label><span>Change current block's format as H2</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+NUM3</kbd></label><span>Change current block's format as H3</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+NUM4</kbd></label><span>Change current block's format as H4</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+NUM5</kbd></label><span>Change current block's format as H5</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+NUM6</kbd></label><span>Change current block's format as H6</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+ENTER</kbd></label><span>Insert horizontal rule</span>
                                                <div class="help-list-item"></div>
                                                <label style="width: 180px; margin-right: 10px;"><kbd>CMD+K</kbd></label><span>Show Link Dialog</span></div>
                                            <div class="modal-footer"><p class="text-center"><a href="http://summernote.org/" target="_blank">Summernote 0.8.11</a> · <a href="https://github.com/summernote/summernote" target="_blank">Project</a> · <a
                                                        href="https://github.com/summernote/summernote/issues" target="_blank">Issues</a></p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Upload Files</label>
                            <input class="form-control" type="file">
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Create Project Modal -->
    <!-- Assignee Modal -->
    <div id="assignee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign to this task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group m-b-30">
                        <input placeholder="Search to add" class="form-control search-input" type="text">
                        <span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span>
                    </div>
                    <div>
                        <ul class="chat-user-list">
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">Richard Miles</div>
                                            <span class="designation">Web Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">John Smith</div>
                                            <span class="designation">Android Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media">
													<span class="avatar">
														<img alt="" src="assets/img/profiles/avatar-16.jpg">
													</span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">Jeffery Lalor</div>
                                            <span class="designation">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Assign</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Assignee Modal -->
    <!-- Task Followers Modal -->
    <div id="task_followers" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add followers to this task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group m-b-30">
                        <input placeholder="Search to add" class="form-control search-input" type="text">
                        <span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span>
                    </div>
                    <div>
                        <ul class="chat-user-list">
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="assets/img/profiles/avatar-16.jpg"></span>
                                        <div class="media-body media-middle text-nowrap">
                                            <div class="user-name">Jeffery Lalor</div>
                                            <span class="designation">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="assets/img/profiles/avatar-08.jpg"></span>
                                        <div class="media-body media-middle text-nowrap">
                                            <div class="user-name">Catherine Manseau</div>
                                            <span class="designation">Android Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media">
                                        <span class="avatar"><img alt="" src="assets/img/profiles/avatar-26.jpg"></span>
                                        <div class="media-body media-middle text-nowrap">
                                            <div class="user-name">Wilmer Deluna</div>
                                            <span class="designation">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Add to Follow</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Task Followers Modal -->
</div>
<div id="assignee" class="modal custom-modal fade " role="dialog" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign to this task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group m-b-30">
                    <input placeholder="Search to add" class="form-control search-input" type="text">
                    <span class="input-group-append">
										<button class="btn btn-primary">Search</button>
									</span>
                </div>
                <div>
                    <ul class="chat-user-list">
                        <li>
                            <a href="#">
                                <div class="media">
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-09.jpg"></span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">Richard Miles</div>
                                        <span class="designation">Web Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
                                    <span class="avatar"><img alt="" src="assets/img/profiles/avatar-10.jpg"></span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">John Smith</div>
                                        <span class="designation">Android Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media">
													<span class="avatar">
														<img alt="" src="assets/img/profiles/avatar-16.jpg">
													</span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">Jeffery Lalor</div>
                                        <span class="designation">Team Leader</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Assign</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ADD TASK SCRIPTS -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    let tasksEndpoint = "<?php echo  site_url('/tasks/api');?>";
    let assigneeTemplate = '<li><a href="#"><div class="media"><span class="avatar"><img alt="" src=""></span><div class="media-body align-self-center text-nowrap"><div class="user-name"></div><span class="designation"></span></div></div></a></li>';

    let cct = $.cookie("<?php echo $this->config->item("csrf_cookie_name"); ?>");

    function handleAddTask() {
        let taskName = $('#new-task').val();
        let task = {
            'name': taskName,
            'status': 'Pending',
            '<?php echo $this->security->get_csrf_token_name(); ?>': cct,
        };
        if (addTask()) {
            $.ajax({
                type: "POST",
                url: tasksEndpoint + "?action=create",
                data: task,
                dataType: "json",
            }).done(function(res) {
                console.log(res);
            });

        }
        console.log(task);
    }

    function createTask(taskData) {
        // taskTemplate variable located in /assets/newtheme/js/task.js
        let task = $(taskTemplate).clone();
        task.attr('data-id', taskData.id);
        task.attr('data-status', taskData.status);
        task.addClass("task");
        if (taskData.status === "Completed") {
            task.addClass("completed");
        }
        task.find(".task-label").text(taskData.name);
        $(this).append(task);
    }

    $.fn.getTasks = function() {
        $.ajax({
            dataType: "json",
            url: tasksEndpoint,
            data: { action: 'list' },
        }).then(data => {
            if (data.tasks) {
                return data.tasks;
            }
        }).then(tasks => {
            tasks.forEach(createTask, this);
        });
    }
    $('#task-list').getTasks();
    $('#add-task').click(handleAddTask);
    $('#new-task').keydown(function(event) {
        // Get the code of the key that is pressed
        var keyCode = event.keyCode;
        var enterKeyCode = 13;

        // If key code is that of Enter Key then call addTask Function
        if (keyCode == enterKeyCode) {
            event.preventDefault();
            handleAddTask()
        }

    });
    $('#task-list').on('click', '.task-action-btn .large', function(e) {
        let taskId = $(this).parents('.task').data("id");
        $.ajax({
            dataType: "json",
            url: tasksEndpoint,
            data: { action: 'assignees', task_id: taskId },
        }).then(data => {
            if (data.assignees) {
                return data.assignees;
            }
        }).then(assignees => {
            assignees.forEach(function(assigneeData) {
                console.log(assigneeData);
                let assignee = $(assigneeTemplate).clone();
                assignee.attr('data-userid', assigneeData.user_id);
                assignee.find('.user-name').text(assigneeData.first_name + ' ' + assigneeData.last_name);
                $('#assignee .chat-user-list').append(assignee);
            });
            $('#assignee').modal('show');

        });
    });


});
</script>