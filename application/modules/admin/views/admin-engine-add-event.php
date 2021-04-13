<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Event Engine</a></li>
                        <li class="breadcrumb-item active">Add Event</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Add Event</h1>
                        </div>
                        <form action="<?php echo site_url('admin/add_event'); ?>" enctype="multipart/form-data" method="post">
                        <div class="media-right">
                            <button type="submit" class="btn btn-danger">SAVE</button>
                           
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                                <div class="form-group row">
                                    <label for="avatar" class="col-sm-3 col-form-label form-label">select image</label>
                                    <div class="col-sm-9">
                                        <div class="media align-items-center">
                                            <div class="media-left">
                                                <img src="assets/images/event-4.jpg" alt="" width="100" class="rounded">
                                            </div>
                                            <div class="media-body">
                                                <div class="custom-file" style="width: auto;">
                                                    <input required="" type="file" id="avatar" name="images" class="custom-file-input">
                                                    <label for="avatar" class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-md-3 col-form-label form-label">Event Title</label>
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="event_title" placeholder="Write an event title">
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
                                    <label for="course" class="col-md-3 col-form-label form-label">Event Date</label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control" name="event_date" placeholder="Enter date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Event Time</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="event_time" placeholder="Enter time">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Location</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="location" placeholder="Enter loaction">
                                    </div>
                                </div>

                                  <div class="form-group row">
                                    <label for="course" class="col-md-3 col-form-label form-label">Description</label>
                                    <div class="col-md-4">
                                        <textarea name="description"></textarea>
                                       
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <h6>New Event List</h6>
                    <table class="table   thead-border-top-0 mydataTable text-center">
                                            <thead class="bg-white">
                                                <tr>
                                                    <th></th>
                                                    <th>Event Title</th>
                                                    <th>Category</th>
                                                    <th>Event Date</th>
                                                    <th>Event Time</th>
                                                    <th>Location</th>
                                                    <th>Desciption</th>
                                                    <th> Action </th>
                                
                                                </tr>
                                            </thead>
                                            <tbody class="list">


<?php
foreach ($events as $data) { ?>



                                                <tr>
              <td class="text-right">
<img height="100px" src="<?php echo base_url('admin-assets/images/'.$data->images.''); ?>">
                        </td>                                      

                        <td class="text-right">

<?php echo $data->event_title; ?>
                        </td>
                        <td class="text-right">

                           <?php echo $data->category; ?> 

                        </td>
                        <td class="text-right">
                            <?php echo $data->event_date ;  ?>

                        </td>

                         <td class="text-right">
                            <?php echo $data->event_time ;  ?>

                        </td>
                        <td class="text-right">
                            <?php echo $data->location ;  ?>

                        </td>
                        <td class="text-right">
                            <?php echo $data->description ;  ?>

                        </td>


                       
                      
                        <td><a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/delete_event/'.$data->id.'') ?>">delete</a></td>

                            
                                                    
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