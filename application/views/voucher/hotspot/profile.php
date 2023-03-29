<?php $this->load->view('templates/dashboard/header'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Profile</h1>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger"><i class="fas fa-list"></i> Daftar Profile</h4>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Layanan</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;

                                        foreach ($getprofile as $row) {
                                        ?>
                                            <?php $id = str_replace('*', '', $row['.id']) ?>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-<?= $id ?>"><i class="fas fa-trash"></i>Hapus Profile </button>
                                                <a href="<?= base_url("router/hotspot/profile/edit/" . $id) ?>" class="btn btn-sm btn-warning"><i class='fas fa-edit'></i><strong>Edit</strong></a>

                                            </td>

                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['shared-users'] ?></td>
                                            <td><?= $row['rate-limit'] ?></td>

                                            <td align="center"><label class="btn btn-success"> Ambil data profile</label></td>




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

<?php $this->load->view('templates/dashboard/footer'); ?>