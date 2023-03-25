<?php $this->load->view('templates/dashboard/header'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Profile</h1>
        </div>


        <div class="section-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger"><i class="fas fa-users"></i> Tambah user profile</h4>
                        </div>

                        <div class="card-body">
                            <form class="form-horizontal" action="<?php echo base_url('voucher/prosesprofile'); ?>" role="form" method="POST">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nama Profile</label>
                                    <div class="col-md-12">
                                        <input type="text" name="service" class="form-control" placeholder="Example : Paket-4-Jam">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Rate Limit [up/down]</label>
                                    <div class="col-md-12">
                                        <input type="text" name="ratelimit" class="form-control" placeholder="Example : 512k/1M">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Masa Aktif</label>
                                    <div class="col-md-12">
                                        <input type="text" name="uptime" class="form-control" placeholder="Example : 1h/4h/7h/30d">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Shared User</label>
                                    <div class="col-md-12">
                                        <input type="text" name="sharedusers" class="form-control" value="1" placeholder="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Kunci Mac Address</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="mac">
                                            <option value="">Pilih salah satu</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Transparent Proxy</label>
                                    <div class="col-md-12">
                                        <select class="form-control" name="proxy" id="proxy">
                                            <option disabled value="" selected>Pilih salah satu</option>
                                            <option value="yes">Ya</option>
                                            <option value="no">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Harga</label>
                                    <div class="col-md-12">
                                        <input type="text" name="price" class="form-control" placeholder="Example : 5000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-paper-plane"></i> Submit </button>
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

<?php $this->load->view('templates/dashboard/footer'); ?>