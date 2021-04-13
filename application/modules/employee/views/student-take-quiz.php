<?php $this->load->view('inc/header');  ?>
<style type="text/css">
    #days {
  font-size: 100px;
  color: #db4844;
}
#hours {
  font-size: 17px;
  color: #f07c22;
}
#minutes {
  font-size: 20px;
  color: #f6da74;
}
#seconds {
  font-size: 20px;
  color: #abcd58;
}


div.timer {
  display: inline-block;
  line-height: 1;
  padding-top :0px;
  padding-right: 10px;
  /*font-size: 40px;*/
}

span.timer {
  display: block;
  /*font-size: 20px;*/
  color: #274c7b;
}
</style>
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
                            <li class="breadcrumb-item active">Quiz</li>
                        </ol>

<form method="post" id="quiz" action="<?php  echo site_url('employee/submit_quiz'); ?>">

    <input type="hidden" name="ids" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="card">
                       <?php 
$i = 1;
                       foreach ($questions as $data) { ?>
                      
                    
                            <div class="card-header">
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <h4 class="mb-0"><strong>Question <?php echo $i ; ?></strong></h4>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="card-title">
                                            : <?php echo $data->questions ; ?>.
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="<?php echo $data->id ; ?>" value="1" id="customCheck<?php echo $i; ?>1" type="radio"class="custom-control-input">
                                        <label for="customCheck<?php echo $i; ?>1" class="custom-control-label">a)  <?php echo $data->option_one ; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="<?php echo $data->id ; ?>" value="2" id="customCheck<?php echo $i; ?>2" type="radio"class="custom-control-input">
                                        <label for="customCheck<?php echo $i; ?>2" class="custom-control-label">b)  <?php echo $data->option_two ; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="<?php echo $data->id ; ?>" value="3" id="customCheck<?php echo $i; ?>3" type="radio"class="custom-control-input">
                                        <label for="customCheck<?php echo $i; ?>3" class="custom-control-label">c)  <?php echo $data->option_three ; ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input  name="<?php echo $data->id ; ?>" value="4"id="customCheck<?php echo $i; ?>4" type="radio"class="custom-control-input">
                                        <label for="customCheck<?php echo $i; ?>4" class="custom-control-label">d)  <?php echo $data->option_four ; ?> </label>
                                    </div>
                                </div>
                            </div>

  <?php   $i++;  } ?> 
                            
        <div class="card-footer">
                               <!--  <a href="<?php  echo site_url('employee/student_dashboard'); ?>" class="btn btn-white">Skip</a> -->
                                <button type="submit" class="btn btn-danger pull-right">Submit <i class="material-icons btn__icon--right">send</i></button>
                              
                            </div>                
   </form>                 
                        </div>
                    </div>

                </div>
<?php $this->load->view('inc/sidebar'); ?>

<?php $this->load->view('inc/footer',$this->data); ?>
<script type="text/javascript"></script>

<script type="text/javascript">
<?php 
$date =date("Y-m-d h:i:s");
$currentDate = strtotime($date);
$futureDate = $currentDate+(60*count($questions));
$formatDate = date("Y-m-d H:i:s", $futureDate);
 ?>

    function makeTimer() {

    //      var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");  
        var endTime = new Date("<?php echo $formatDate ; ?> GMT+05:00");           
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400); 
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }

            // $("#days").html(days + "<span>Days</span>");
            // $("#hours").html(hours + "<span>Hours</span>");
            $("#minutes").html(minutes + "<span class='timer'>Min</span>");
            $("#seconds").html(seconds + "<span class='timer'>Sec</span>");       

    }

    setInterval(function() { makeTimer(); }, 1000);

 setInterval(function() {
  $("#quiz").submit(); 
  }, <?php echo 60000*count($questions); ?>);

</script>

