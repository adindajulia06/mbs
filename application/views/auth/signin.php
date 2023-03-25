<?php $this->load->view('templates/auth/signin/header'); ?>


<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="<?php echo base_url(); ?>assets/img/header.png" alt="logo" width="100">
                    </div>

                    <div class=" card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>

                        <div class="card-body">

                            <form action="<?php echo base_url('auth/do_signin'); ?>" class="form-horizontal" role="form" method="POST">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="form-control" type="text" name="username" autocomplete="off">

                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                        </div>
                                    </div>
                                    <input class="form-control" type="password" name="password">

                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg btn-block" name="login" type="submit"><i class="fas fa-sign-in-alt"></i>
                                        Login
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>

                    <div class="simple-footer">
                        Copyright &copy; <?= $title ?> <?php echo date("Y"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if ($this->session->flashdata('message_err')) {
?>
    <script>
        swal({
            text: "<?php echo $this->session->flashdata('message_err'); ?>",
            icon: "error",
            button: false,
            timer: 2000
        });
    </script>
<?php
} else if ($this->session->flashdata('message_success')) {
?>
    <script>
        swal({
            text: "<?php echo $this->session->flashdata('message_success'); ?>",
            icon: "success",
            button: false,
            timer: 1200

        });
    </script>
<?php
}
?>

<?php $this->load->view('templates/auth/signin/footer'); ?>