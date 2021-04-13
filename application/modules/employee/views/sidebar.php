<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                    <div class="mdk-drawer__content ">
                        <div class="sidebar sidebar-left sidebar-dark o-hidden" data-perfect-scrollbar>
                            <div class="sidebar-p-y">
                                  <ul class="sidebar-menu sm-active-button-bg">

                                    <?php if($this->session->userdata('user_type') != 'manager'){ ?>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php  echo site_url('employee/employee_dashboard') ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_box</i> Employee
                                    </a>
                                </li>
                            
                                <!-- <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php  echo site_url('employee/manager'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> Manager
                                    </a>
                                </li> -->
                            </ul>
<?php } ?>
                            <?php if($this->session->userdata('user_type') == 'manager'){ ?>
                            <ul class="sidebar-menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#account_menu1">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i>
                                        Manager
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu sm-indent collapse" id="account_menu1">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php  echo site_url('employee/manager'); ?>">
                                                <span class="sidebar-menu-text">Add Employee</span>
                                            </a>
                                        </li>
                                       <!--  <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php  echo site_url('employee/course_extent'); ?>">
                                                <span class="sidebar-menu-text">Course Extent</span>
                                            </a>
                                        </li> -->
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php  echo site_url('employee/manager_dashboard'); ?>">
                                                <span class="sidebar-menu-text">Manager Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php  echo site_url('employee/manager_list_of_employee'); ?>">
                                                <span class="sidebar-menu-text">Share Resource</span>
                                            </a>
                                        </li>

                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php  echo site_url('employee/create_a_survey'); ?>">
                                                <span class="sidebar-menu-text">Assign a survey</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>


<?php } ?>
                          
                            <ul class="sidebar-menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#account_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">person_outline</i>
                                        Account
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu sm-indent collapse" id="account_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('employee/student_account_edit_basic'); ?>">
                                                <span class="sidebar-menu-text">Basic Information</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="sidebar-heading">Student</div>
                            <ul class="sidebar-menu sm-active-button-bg">


                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php  echo  site_url('employee/student_dashboard') ; ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> My Modules
                                    </a>
                                </li>
                                <!-- <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php  echo  site_url('employee/student_browse_courses') ; ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Browse Courses
                                    </a>
                                </li> -->
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php  echo  site_url('employee/take_quizes') ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Take a Quiz
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php  echo  site_url('employee/student_quiz_list') ?> ">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> Quiz Results
                                    </a>
                                </li>
                                


                            </ul>


                            <ul class="sidebar-menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button sidebar-js-collapse" data-toggle="collapse" href="#account_menu2">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> 
                                        Privacy policies
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu sm-indent collapse" id="account_menu2">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('employee/leave_policy'); ?>">
                                                <span class="sidebar-menu-text">Leave Policy</span>
                                            </a>
                                        </li>
                                          <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('employee/perfermonace_management_process'); ?>">
                                                <span class="sidebar-menu-text">Performance management 
</span>
                                            </a>
                                        </li>
                                          <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('employee/prevention_of_sexual_harassment'); ?>">
                                                <span class="sidebar-menu-text">Prevention of sexual harassment</span>
                                            </a>
                                        </li>
                                          <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php echo site_url('employee/probation_process'); ?>">
                                                <span class="sidebar-menu-text">Probation process</span>
                                            </a>
                                        </li>


                                    </ul>
                                </li>
                                 <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('employee/g2p_directory'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">folder</i> Go to Person
                                    </a>
                                </li>
                            </ul>


                            <!-- <ul class="sidebar-menu sm-active-button-bg">
                                <li class="sidebar-menu-item active">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('employee/privacy_policies');  ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> Privacy Policy
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php echo site_url('employee/g2p_directory'); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">folder</i> Go to Person
                                    </a>
                                </li>
                            </ul> -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
