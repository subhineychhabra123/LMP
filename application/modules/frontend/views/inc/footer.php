

            <div class="js-fix-footer bg-white border-top-2">
                <div class="bg-footer page-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mb-24pt mb-md-0">
                                <p class="text-white-50 mb-0">&copy; 2020 Peter's Surgical | All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- // END Header Layout Content -->l

    </div>
    <!-- // END Header Layout -->
 <div id="modal-success" class="modal fade"   role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-success">
                <div class="modal-body text-center p-4">
                    <i class="material-icons icon-40pt text-white mb-2">check</i>
                    <h4 class="text-white">Successfully Sumitted!</h4>
                    <button type="button" class="btn btn-light my-2" data-dismiss="modal">Back</button>
                </div> <!-- // END .modal-body -->
            </div> <!-- // END .modal-content -->
        </div> <!-- // END .modal-dialog -->
    </div> <!-- // END .modal -->

    <!-- Modal -->
    <div class="modal courses-modal" id="login_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                 <div id="error"></div>
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <form action="javascript:void(0);" class="form-popup" method="post">
                        <h5>Login</h5>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="email" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password">
                            <p class="text-right"><a href="#" class="small">Forgot password?</a></p>
                        </div>
                        <button type="submit" class="btn btn-lg btn-accent submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>frontend-assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>frontend-assets/vendor/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>frontend-assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="<?php echo base_url(); ?>frontend-assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="<?php echo base_url(); ?>frontend-assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="<?php echo base_url(); ?>frontend-assets/vendor/material-design-kit.js"></script>

    <!-- App JS -->
    <script src="<?php echo base_url(); ?>frontend-assets/js/app.js"></script>

    <!-- Highlight.js -->
    <script src="<?php echo base_url(); ?>frontend-assets/js/hljs.js"></script>

<script type="text/javascript">
        $(".submit").click(function(){
            var username = $('#username').val();
            var pass = $('#password').val();
            $.ajax({
                type:'post',
                url: '<?php echo site_url('admin/login'); ?>',
                data: {email: username, password: pass},
                success: function(data) {
                    if(data == "error"){
                        $('#error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button"class="close" data-dismiss="alert" aria-label="Close" style="top: 0; right: 0;"><span aria-hidden="true">×</span></button>Plese Enter valid credential</div>');

                    }else{

                        window.location.replace(data);
                    }
                }
          
        });

        });
    </script>

</body>
</html>