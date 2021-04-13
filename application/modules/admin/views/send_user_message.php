<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php  echo site_url() ; ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php  echo site_url('admin/admin_employee_list') ; ?>">Employee</a></li>
                       
                    </ol>
                    <form action="<?php  echo site_url('admin/send_user_message') ?>" method="post" >
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Add message</h1>
                        </div>
                
                        <div class="media-right">
                            <button type="submit" class="btn btn-danger" > SAVE</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                        
                                
                                <div class="form-group row">
                                    <label for="title" class="col-md-3 col-form-label form-label">Message</label>
                                    <div class="col-md-6">
                                        <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                    <input type="hidden" value="<?php  echo $this->uri->segment(3); ?>"  name="id">
                                    </div>
                                </div>
                        </div>

                    </div>

                </form>
  <?php if(count($message)> 0 ){ ?>
                    <h3 >Message List</h3>
 <table class="table   thead-border-top-0 mydataTable text-center">
                                            <thead class="bg-white">
                                                <tr>
                                                    
                                                    <th>Message</th>
                                                    <th>Date Time</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody class="list">

                                    <?php foreach ($message as $data) { ?>
                            
                                    
                                                <tr>
                                                    <td>
                                                      <?php echo $data->message ; ?>    
                                                    </td>
                                                    <td>
                                                        
                                                        <?php echo $data->created_at ; ?>
                                                    </td>
                                                  
                                                  <td>
                                                       <a href="<?php  echo site_url('admin/delte_user_message/'.$data->id.'/'.$data->user_id.''); ?>" class="btn btn-sm btn-danger">delete</a> 
                                                    </td>

                                                </tr>
                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>

                </div>

            </div>
<?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>