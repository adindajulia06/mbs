<?php $this->load->view('templates/dashboard/header'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">


        <div class="section-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger"><i class="fas fa-list"></i> Hotspot Active</h4>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th><?= $totalhotspotactive ?></th>
                                            <th>Server</th>
                                            <th>User</th>
                                            <th>Mac Address</th>
                                            <th>Uptime</th>
                                            <th>Bytes In</th>
                                            <th>Bytes Out</th>
                                            <th>Time Left</th>
                                            <th>Login By</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($hotspotactive as $data) {
                                        ?>
                                            <tr>
                                                <?php $id = str_replace('*', '', $data['.id']) ?>
                                                <td><a href="<?= base_url("router/hotspot/deleteactive/" . $id) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus user <?= $data['user']; ?> ?')" class="btn btn-sm btn-danger"><i class='fas fa-trash'></i><strong>Delete</strong></a>
                                                </td>
                                                <td><?= $data['server'] ?></td>
                                                <td><?= $data['user'] ?></td>
                                                <td><?= $data['mac-address'] ?></td>
                                                <td><?= formatDTM($data['uptime']) ?></td>
                                                <td><?= formatBytes($data['bytes-in']) ?></td>
                                                <td><?= formatBytes($data['bytes-out']) ?></td>
                                                <td><?= formatDTM($data['session-time-left']) ?></td>
                                                <td><?= $data['login-by'] ?></td>
                                                <td><?= $data['comment'] ?></td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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