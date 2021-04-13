<?php $this->load->view('inc/header'); ?>

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url() ; ?>">Home</a></li>
                   
                        <li class="breadcrumb-item active">Sent Notification</li>
                    </ol>
                    <div class="media align-items-center mb-headings">
                        <div class="media-body">
                            <h1 class="h2">Send Notification</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <form action="<?php echo site_url('admin/add_new_notification');  ?>" method="post" enctype="multipart/form-data" >

                        <div class="card">
                            <div class="list-group list-group-fit">
                              <div class="list-group-item">
                                  <div class="form-group m-0" role="group" aria-labelledby="label-question">
                                    <div class="form-row align-items-center">
                                        <label id="label-question" for="question" class="col-md-3 col-form-label form-label">Subject</label>
                                        <div class="col-md-9">
                                            <input id="question" name="subject" type="text" placeholder="Notification Subject ..." class="form-control">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="list-group-item">
                                    <div role="group" aria-labelledby="label-question" class="m-0 form-group">
                                        <div class="form-row">
                                            <label for="question" class="col-md-3 col-form-label form-label">Information</label>
                                            <div class="col-md-9">
                                                <textarea name="information" placeholder="Enter the Information..." rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="list-group-item">
                                    <div class="form-group m-0" role="group" aria-labelledby="label-email">
                                        <div class="form-row">
                                            <label id="label-dob" for="select03" class="col-md-3 col-form-label form-label">Select Groups</label>
                                            <div class="col-md-9">
                                                <div role="group" class="input-group input-group-merge">
<?php 

$js = array('class'=>'form-control form-control-prepended' , 'id'=> 'select03','data-toggle'=>'select');

foreach ($groups as $data) {
    # code...
    $options[$data->id] = $data->group_name ;

}

echo form_multiselect('groups[]', $options,'' , $js); ?>
                                                  

                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div role="group" aria-labelledby="label-question" class="m-0 form-group">
                                        <div class="form-row">
                                            <label for="question" class="col-md-3 col-form-label form-label">Upload Document</label>
                                            <div class="col-md-9">
                                                <input type="file" name="document" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="list-group-item">
                                    <button type="submit" class="btn btn-danger">Send Notification</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

<div class="card">
                        <div class="card-body">
                    <h6>Notifications</h6>
                    <table class="table   thead-border-top-0 mydataTable text-center">
                                            <thead class="bg-white">
                                                <tr>
                                                    
                                                    <th>Notification  Id</th>
                                                    <th>Subject</th>
                                                    <th>Information</th>
                                                    <th>File</th>
                                                    <th> Action </th>
                                
                                                </tr>
                                            </thead>
                                            <tbody class="list">


<?php
foreach ($notification as $data) { ?>



                                                <tr>                                    

                        <td class="text-right">

<?php echo $data->id; ?>
                        </td>
                        <td class="text-right">

                           <?php echo $data->subject ; ?> 

                        </td>
                        <td class="text-right">
                            <?php echo $data->information ;  ?>

                        </td>

                         <td class="text-right">
                            <a target="_blank" href="<?php  echo base_url('admin-assets/images/'.$data->file.''); ?>">view  Documents</a>
                        </td>                  
                        <td><a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/delete_Notification/'.$data->id.'') ?>">delete</a></td>
                                                </tr>
  <?php
}
 ?>                                             

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
            </div>

<?php $this->load->view('inc/sidebar'); ?>   

<?php $this->load->view('inc/footer'); ?>