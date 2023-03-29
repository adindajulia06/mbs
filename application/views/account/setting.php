<?php $this->load->view('templates/dashboard/header'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-md-12">
                    <form class="form-horizontal" action="<?php echo base_url('dashboard/changepassword'); ?>" role="form" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-danger"><i class="fas fa-lock"></i> Change Password</h4>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('gagal'); ?>
                                <?= form_error('currentpassword', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>
                                <?= form_error('new_password', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>
                                <?= form_error('repeat_password', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>

                                <div class="form-group">
                                    <label for="site-title" class="form-control-label col-sm-3 ">Password saat ini</label>
                                    <div class="col-md-12">
                                        <input type="password" name="currentpassword" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="site-description" class="form-control-label col-sm-3 ">Password Baru</label>
                                    <div class="col-md-12">
                                        <input type="password" name="new_password" class="form-control" placeholder="Password Baru">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label col-sm-3 ">Konfirmasi Password Baru</label>
                                    <div class="col-md-12">
                                        <input type="password" name="repeat_password" class="form-control" placeholder="Konfirmasi Password Baru">
                                    </div>
                                </div>



                            </div>
                            <div class="card-footer bg-whitesmoke ">
                                <button class="btn btn-primary" name="change_pswd"><i class="fas fa-paper-plane"></i> Ganti Password</button>
                            </div>
                        </div>
                    </form>
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
            timer: 1200
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


<?php $this->load->view('templates/dashboard/footer'); ?>