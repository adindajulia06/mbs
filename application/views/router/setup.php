<?php $this->load->view('templates/router/header'); ?>
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

                            <form action="<?php echo base_url('dashboard/router_add'); ?>" class="form-horizontal" role="form" method="POST">

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Nama Server</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" class="form-control" placeholder="Contoh : RB750GR3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">DNS Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="dns" class="form-control" placeholder="Contoh : Mikrobill.net">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">IP Mikrotik</label>
                                    <div class="col-md-12">
                                        <input type="text" name="ip" class="form-control" placeholder="Contoh : 10.10.10.1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Password</label>
                                    <div class="col-md-12">
                                        <input type="text" name="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Traffic Interface</label>
                                    <div class="col-md-12">
                                        <input type="text" name="interface" class="form-control" placeholder="Contoh : ether1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-paper-plane"></i> Submit </button>
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

<?php $this->load->view('templates/router/footer'); ?>