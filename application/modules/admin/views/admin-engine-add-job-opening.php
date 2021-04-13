<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo site_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Event Engine</a></li>
                        <li class="breadcrumb-item active">Add Openings</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Add Openings</h1>
                        </div>
<form method="post" enctype="multipart/form-data"  action="<?php echo site_url('admin/add_job_opening'); ?>">
                        <div class="media-right">
                            <button type="submit" class="btn btn-danger">SAVE</button>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body">
                           
                                <div class="form-group row">
                                    <label for="title" class="col-md-3 col-form-label form-label">Job Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" placeholder="Write an job title" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Category</label>
                                    <div class="col-md-4">

                                        <select id="course" name="category" class="custom-control custom-select form-control">
                                        <?php 
                                            foreach ($all_category as $data) {
                                          
                                            ?>
                                            <option value="<?php echo $data->id ; ?>"><?php echo $data->category ; ?></option>
                                           <?php
                                           }  
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Experience</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="experience" placeholder="Enter required experience" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Skills</label>
                                    <div class="col-md-4">
                                        <input type="text" name="skill" class="form-control" placeholder="Enter Skills" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Description</label>
                                    <div class="col-md-4">
                                        <textarea name="description" class="form-control" placeholder="Description" required=""></textarea>
                                      
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Upload Document</label>
                                    <div class="col-md-4">
                                        <input type="file" name="document" class="form-control" required="">
                                    </div>
                                </div>

                            </form>
                        </div>


                        
                    </div>
<h6>New Opening List</h6>
                    <table class="table   thead-border-top-0 mydataTable text-center">
                                            <thead class="bg-white">
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Experience</th>
                                                    <th>Skill</th>
                                                    <th>Document</th>
                                                    <th>Desciption</th>
                                                    <th> Action </th>
                                
                                                </tr>
                                            </thead>
                                            <tbody class="list">


<?php
foreach ($new_opening as $data) { ?>



                                                <tr>

                        <td class="text-right">

<?php echo $data->title; ?>
                        </td>
                        <td class="text-right">

                           <?php echo $data->category; ?> 

                        </td>
                        <td class="text-right">
                            <?php echo $data->experience ;  ?>

                        </td>

                         <td class="text-right">
                            <?php echo $data->skill ;  ?>

                        </td>

                       
                        <td><a href="<?php echo base_url('admin-assets/images/'.$data->images.''); ?>">view documents</a></td>
                          <td class="text-right">
                            <?php echo $data->description ;  ?>

                        </td>
                        <td><a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/delete_new_job_opening/'.$data->id.'') ?>">delete</a></td>

                            
                                                    
                                                </tr>

  <?php
}
 ?>                                             

                                            </tbody>
                                        </table>
                </div>

            </div>

<?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>