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
                            <h4 class="text-danger"><i class="fas fa-list"></i> Hotspot Profile</h4>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Shared Users</th>
                                            <th>Rate Limit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;

                                        foreach ($getprofile as $row) {
                                        ?>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['shared-users'] ?></td>
                                            <td><?= $row['rate-limit'] ?></td>





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