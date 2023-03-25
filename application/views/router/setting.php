<?php $this->load->view('templates/router/header'); ?>
<?php foreach ($router as $row) : ?>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">


            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-danger"><i class="fas fa-server"></i> Pengaturan Router</h4>
                            </div>
                            <div class="card-body">

                                <form action="<?php echo base_url('dashboard/router_save'); ?>" class="form-horizontal" role="form" method="POST">

                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Nama Server</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" class="form-control" value="<?php echo $row->nama ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">DNS Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="dns" class="form-control" value="<?php echo $row->dns ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">IP Mikrotik</label>
                                        <div class="col-md-12">
                                            <input type="text" name="ip" class="form-control" value="<?php echo $row->ip ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" name="username" class="form-control" value="<?php echo $row->username ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Password</label>
                                        <div class="col-md-12">
                                            <input type="text" name="password" class="form-control" value="<?php echo decrypt($row->password) ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Traffic Interface</label>
                                        <div class="col-md-12">
                                            <input type="text" name="interface" class="form-control" value="<?php echo $row->interface ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-history"></i> Update </button>
                                            <a href="<?php echo base_url('dashboard/router_ping') ?>" class="btn btn-info m-t-sm"><i class="fa fa-info-circle"></i> Cek Koneksi</a>
                                            <a href="<?php echo base_url('dashboard') ?>" class="btn btn-success m-t-sm"><i class="fa fa-paper-plane"></i> Connect</a>


                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php endforeach ?>
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
            timer: 2000

        });
    </script>
<?php
}
?>

<?php $this->load->view('templates/router/footer'); ?>