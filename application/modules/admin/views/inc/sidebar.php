            <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                <div class="mdk-drawer__content ">
                    <div class="sidebar sidebar-left sidebar-dark o-hidden" data-perfect-scrollbar>
                        <div class="sidebar-p-y">
                            <!--- --->
                            <ul class="sidebar-menu sm-active-button-bg">
                                <li class="sidebar-menu-item active">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">contacts</i> Dashboard
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_approval'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">exposure</i> Approval Request
                                    </a>
                                </li>
<ul class="sidebar-menu sm-active-button-bg" style="margin-bottom: 0;">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#report_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">assignment_ind</i>
                                        Users
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu sm-indent collapse" id="report_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_employee_list'); ?>">
                                                <span class="sidebar-menu-text">Employee</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_manager_list'); ?>">
                                                <span class="sidebar-menu-text">Manager</span>
                                            </a>
                                        </li>
                                        
                                        
                                        
                                    </ul>
                                </li>
                            </ul>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/groups_list'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">supervisor_account</i> Groups
                                    </a>
                                </li>
                            </ul>
                            <!--- Course --->
                            <div class="sidebar-heading">Course</div>
                            <ul class="sidebar-menu sm-active-button-bg">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_view_course'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i>All Modules
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/add_new_course_form'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">developer_board</i> Add New Modules
                                    </a>
                                </li>
                                   <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/list_questionnaire'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">add_comment</i> List Questionnaire
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_create_question'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">add_comment</i> Create Questionnaire
                                    </a>
                                </li>

                            </ul>
                            <div class="sidebar-heading">Categories And Tags</div>
                            <ul class="sidebar-menu sm-active-button-bg">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/view_all_category'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">local_offer</i> Category
                                    </a>
                                </li>

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/designation'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">local_offer</i> Designation
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('admin/view_all_tags'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">local_offer</i> Tags
                                    </a>
                                </li>
                                
                            </ul>
                            <!--- Reports --->
                            <!-- <ul class="sidebar-menu sm-active-button-bg" style="margin-bottom: 0;">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#report_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">insert_chart</i>
                                        Reports
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu sm-indent collapse" id="report_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_report_user_activity'); ?>">
                                                <span class="sidebar-menu-text">User activities</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_report_manager_mapping'); ?>">
                                                <span class="sidebar-menu-text">Manager Mappings</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_report_course_statistics'); ?>">
                                                <span class="sidebar-menu-text">Course Statistics</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_report_survey_statistics'); ?>">
                                                <span class="sidebar-menu-text">Questionnaire and Survey Statistics</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_report_user_activity'); ?>">
                                                <span class="sidebar-menu-text">Other reports/statistics</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> -->
                            <ul class="sidebar-menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#event_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">record_voice_over</i>
                                        Event Engine
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu sm-indent collapse" id="event_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_engine_add_notification'); ?>">
                                                <span class="sidebar-menu-text">Add Notification</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_engine_add_event'); ?>">
                                                <span class="sidebar-menu-text">Upcoming Event</span>
                                            </a>
                                        </li>
                                        <!-- <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_engine_add_job_opening'); ?>">
                                                <span class="sidebar-menu-text">New Opening</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                            </ul>
                        <ul class="sidebar-menu sm-active-button-bg">
                            <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/admin_engine_add_job_opening'); ?>">
                                <span class="sidebar-menu-text">New Opening</span></a>
                            </li>

                            <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button" href="<?php echo site_url('admin/new_job_request'); ?>">
                                <span class="sidebar-menu-text">Job Request</span></a>
                            </li>

                            <li>
                                <a class="sidebar-menu-button" href="<?php echo site_url('admin/go_to_person'); ?>">
                                <span class="sidebar-menu-text">Go to Person</span></a>
                            </li>
                        </ul>
                         </div>
                    </div>
                </div>
            </div>
         </div>
     </div>
</div>

