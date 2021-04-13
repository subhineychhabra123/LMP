<?php $this->load->view('inc/header'); ?>

        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">

            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                                                       <?php
                         $user_type =    $this->session->userdata('user_type');
                            if($user_type== "manager"){ ?>

  <li class="breadcrumb-item"><a href="<?php echo site_url('employee/manager_dashboard'); ?>">Home</a></li>

                                <?php

                            }else{
                                ?>
  <li class="breadcrumb-item"><a href="<?php echo site_url('employee/student_dashboard'); ?>">Home</a></li>

                                <?php 
                            }


                              ?>
                            <li class="breadcrumb-item active">Quiz Results</li>
                        </ol>
                        <div class="media mb-headings align-items-center">
                            <div class="media-left">
                                <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="" width="80" class="rounded">
                            </div>
                            <div class="media-body">
                                <h1 class="h2"> <?php echo $qa_details->title; ?></h1>
                                <p class="text-muted">submited on <?php echo $qa_details->created_at ?></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Result</h4>
                            </div>
                            <div class="card-body media align-items-center">
                                <div class="media-body">
                                    <h4 class="mb-0"><?php  echo $qa_details->total_no ; ?></h4>
                                    <span class="text-muted-light"><?php if($qa_details->total_no  > 5){
                                        echo "Good";
                                    }else{
                                        echo "Poor";
                                    } ?></span>
                                </div>
                                <div class="media-right">
                                    <a href="<?php echo site_url('employee/take_a_quiz/'.$qa_details->questionnaire_id.'') ?>" class="btn btn-primary">Restart <i class="material-icons btn__icon--right">refresh</i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Questions</h4>
                            </div>
                            <ul class="list-group list-group-fit mb-0">
<?php foreach ($qr_details as $data) { ?>

                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="text-muted-light">1.</div>
                                        </div>
                                        <div class="media-body"><?php echo $data->questions ; ; ?></div>
                                        <?php if($data->answer ==$data->qr_answer){ ?>
                                        <div class="media-right"><span class="badge badge-success ">Correct</span></div>

                                        <?php 
                                    }else{
                                        ?>
                                        <div class="media-right"><span class="badge badge-danger ">Wrong</span></div>
                                        <?php
                                    }

                                    ?>
                                    </div>
                                </li>
<?php } ?>
                                
    
                                
                            </ul>
                        </div>
                    </div>

                </div>

<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>