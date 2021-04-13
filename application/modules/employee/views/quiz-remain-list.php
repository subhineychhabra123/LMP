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
                      <!--   <div class="media mb-headings align-items-center">
                            <div class="media-left">
                                <img src="<?php echo base_url(); ?>admin-assets/images/logo-text.png" alt="" width="80" class="rounded">
                            </div>
                            <div class="media-body">
                                <h1 class="h2"> <?php echo $qa_details->title; ?></h1>
                               
                            </div>
                        </div> -->
                        

<?php 


foreach ($questionnaire as $data) { ?>
   <div class="col-md-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo $data->title ?></h4>
                            </div>
                            <div class="card-body media align-items-center">
                                
                                <div class="media-right">
                                    
                                    <a href="<?php echo site_url('employee/take_a_quiz/'.$data->questionnaire_id.'') ?>" class="btn btn-primary">Begain Test  </a>
                                </div>
                            </div>
                            </div>
                            </div>
<?php } 

if(count($questionnaire) == 0){

    ?>
 <div class="col-md-12">
<div class="card">
                            <div class="card-header">
                                <h4 class="card-title">No Test Pending</h4>
                            </div>
                        </div>
                    </div>
    <?php
}
?>

                        
                        
                    </div>

                </div>

<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>