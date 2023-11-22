<!-- Main Content -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar User Account</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">User List</h4>
                                <a href="<?= site_url('tambah/adduser') ?>" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-user-plus"></i>
                                    Add User
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Token</th>
                                            <th>Level</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php
                                                foreach ($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?= $data->id_user ?></td>
                                            <td><?= $data->username ?></td>
                                            <td><?= $data->fullname ?></td>
                                            <td><?= $data->email ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <button onclick="Swal.fire({
                                                                            title: '<?= $data->username ?>',
                                                                            text: '<?= $data->token ?>',
                                                                            icon: 'info',
                                                                            });" class="btn btn-primary btn-round">
                                                        <i class="fa fa-edit"></i>
                                                        Show
                                                    </button>                                                   
                                                </div>    
                                            </td>
                                            <td><?= $data->level == 1 ? "Admin" : "User" ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?= site_url('tambah/edituser/') . $data->token ?>" title="Edit" class="btn btn-link btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <input type="hidden" name="token" value="<?= $data->token ?>">
                                                    <a href="<?= site_url('tambah/deleteuser/') . $data->token ?>" id="deleteuser" title="Remove" class="btn btn-link btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>													
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                        ?> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    $(document).ready(function() {
    $('#datatables').DataTable( {
        "processing": true,
        "serverSide": true,
        "autoWidth": true,
        "ajax": {
            "url": "<?= site_url('daftar/get_ajax_user') ?>",
            "type": "POST"
        },
        "columnDefs":[
            {
                "targets":[0, 4, 5],
                "className":"text-center"
            }
        ]
    });
    });
</script> -->

<script>
    $(document).ready(function() {
        var table =
            $('#datatables').DataTable({
                serverSide: true,
                processing: false,
                ajax: {
                    "url": "<?= site_url('daftar/get_ajax_user') ?>",
                    "type": "POST"
                },
                language: {
                    "processing": "Refreshing Data...",
                },
                columnDefs: [{
                    "targets": [0, 4, 5],
                    "className": "text-center"
                }]
            });

        //new $.fn.dataTable.FixedHeader(table);

        setInterval(function() {
            table.ajax.reload(null, false);
        }, 10000);

    });
</script>

<!-- End Main Content -->