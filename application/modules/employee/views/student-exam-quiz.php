<?php $this->load->view('inc/header', $this->data); ?>
<style>
    .tab {
      display: none;
    }
    .step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}
.step.finish {
  background-color: #4CAF50;
}
</style>
        <!-- Header Layout Content -->
        <div class="mdk-header-layout__content">
treertert
            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                <div class="mdk-drawer-layout__content page ">

                    <div class="container-fluid page__container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('employee'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('student_browse_courses/student_browse_courses'); ?>">Courses</a></li>
                            <li class="breadcrumb-item active">Quiz</li>
                        </ol>
                         <div class="container-fluid page__container page__heading d-flex align-items-center border-bottom  ">
                        <h1 class="mb-0">Quiz</h1>
                        <div class="ml-auto d-flex align-items-center">
                            
                            <div class="countdown" data-value="4" data-unit="hour"></div>
                           
                        </div>
                    </div>
                        <div class="row">

                            <div class="col-md-12">
                                 
                                <div class="card ">
                                    <div class="tab">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <h4 class="m-0 text-primary mr-2"><strong>#1</strong></h4>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="card-title m-0">
                                                        What is Lorem Ipsum?
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                     <input id="customCheck01" name="quiz" type="radio"  checked="">
                                                    <label for="customCheck01"  >git push</label>
                                            </div>
                                            <div class="form-group">
                                                <input id="customCheck02" name="quiz" type="radio"  >
                                                <label for="customCheck02"  >git commit -m "message"</label>
                                            </div>
                                            <div class="form-group">
                                               <input id="customCheck03" name="quiz" type="radio"  >
                                               <label for="customCheck03"  >git pull</label>
                                                
                                            </div>
                                             <div class="form-group">
                                               <input id="customCheck04" name="quiz" type="radio"  >
                                               <label for="customCheck04"  >git push</label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <h4 class="m-0 text-primary mr-2"><strong>#2</strong></h4>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="card-title m-0">
                                                        Where does it come from?
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                     <input id="customCheck05" name="quiz1" type="radio"  checked="">
                                                    <label for="customCheck05"  >git push</label>
                                            </div>
                                            <div class="form-group">
                                                <input id="customCheck06" name="quiz1" type="radio"  >
                                                <label for="customCheck06"  >git commit -m "message"</label>
                                            </div>
                                            <div class="form-group">
                                               <input id="customCheck07" name="quiz1" type="radio"  >
                                               <label for="customCheck07"  >git pull</label>
                                                
                                            </div>
                                             <div class="form-group">
                                               <input id="customCheck08" name="quiz1" type="radio"  >
                                               <label for="customCheck08"  >git push</label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <h4 class="m-0 text-primary mr-2"><strong>#3</strong></h4>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="card-title m-0">
                                                        Why do we use it?
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                     <input id="customCheck09" name="quiz2" type="radio"  checked="">
                                                    <label for="customCheck09"  >git push</label>
                                            </div>
                                            <div class="form-group">
                                                <input id="customCheck011" name="quiz2" type="radio"  >
                                                <label for="customCheck011"  >git commit -m "message"</label>
                                            </div>
                                            <div class="form-group">
                                               <input id="customCheck012" name="quiz2" type="radio"  >
                                               <label for="customCheck012"  >git pull</label>
                                                
                                            </div>
                                             <div class="form-group">
                                               <input id="customCheck010" name="quiz2" type="radio"  >
                                               <label for="customCheck010"  >git push</label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab">
                                        <div class="card-header">
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <h4 class="m-0 text-primary mr-2"><strong>#4</strong></h4>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="card-title m-0">
                                                       Where can I get some?
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                     <input id="customCheck013" name="quiz3" type="radio"  checked="">
                                                    <label for="customCheck013"  >git push</label>
                                            </div>
                                            <div class="form-group">
                                                <input id="customCheck014" name="quiz3" type="radio"  >
                                                <label for="customCheck014"  >git commit -m "message"</label>
                                            </div>
                                            <div class="form-group">
                                               <input id="customCheck015" name="quiz3" type="radio"  >
                                               <label for="customCheck015"  >git pull</label>
                                                
                                            </div>
                                             <div class="form-group">
                                               <input id="customCheck016" name="quiz3" type="radio"  >
                                               <label for="customCheck016"  >git push</label>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                     <div class="row" style="overflow:auto;">
                                         <div class="col-md-4">
                                           <button type="button" id="prevBtn" class="btn btn-success float-left" onclick="nextPrev(-1)">Previous</button>
                                         </div>
                                         <div class="col-md-4" style="text-align:center;margin-top:10px;">
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                            <span class="step"></span>
                                         </div>
                                         <div class="col-md-4">
                                          <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-success float-right">Next </button>
                                          </div>
                                         
                                     </div>
                                  <!-- Circles which indicates the steps of the form: -->
                                   
                                        <!-- <a href="#" class="btn btn-light">Skip</a>
                                        <a href="#" class="btn btn-success float-right">Submit <i class="material-icons btn__icon--right">arrow_forward</i></a> -->
                                    </div>
                                </div>
                                
                            </div>
                             
 
                        </div>
                    </div>

                </div>

<?php $this->load->view('sidebar'); ?>
<?php $this->load->view('inc/footer', $this->data); ?>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>