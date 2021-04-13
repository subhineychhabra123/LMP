<?php $this->load->view('inc/header'); ?>
    <!-- // END Header -->

    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
            <div class="mdk-drawer-layout__content page ">

                <div class="container-fluid page__container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('employee'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Leave Policy</li>
                    </ol>
                    <h1 class="h2">Leave Policy</h1>

<iframe width="850" height="1000" src="<?php echo base_url('admin-assets/Leave Policy.pdf'); ?>"></iframe>
               
                </div>

            </div>



<?php $this->load->view('sidebar'); ?>
            

        </div>


    </div>
</div>
<?php $this->load->view('inc/footer'); ?>