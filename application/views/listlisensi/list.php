<!-- Main Content -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar Lisensi</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Lisensi EA</h4>
                                <a href="<?=site_url('tambah/tambahlisensi')?>" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-user-plus"></i>
                                    Add Lisensi
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Kode Lisensi</th>
                                            <th>Aktif Hingga</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php 
                                        foreach($row->result() as $key => $data) { ?>
                                        <tr>
                                            <td><?=$data->id_user?></td>
                                            <td><?=$data->username?></td>
                                            <td><?=$data->fullname?></td>
                                            <td><?=$data->email?></td>
                                            <td>
                                                <div class="text-center">
                                                    <button onclick="Swal.fire({
                                                                            title: '<?=$data->username?>',
                                                                            text: '<?=$data->token?>',
                                                                            icon: 'info',
                                                                            });" class="btn btn-primary btn-round">
                                                        <i class="fa fa-edit"></i>
                                                        Show
                                                    </button>                                                   
                                                </div>    
                                            </td>
                                            <td><?=$data->level == 1 ? "Admin" : "User"?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="<?=site_url('tambah/edituser/').$data->token?>" title="Edit" class="btn btn-link btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <input type="hidden" name="token" value="<?=$data->token?>">
                                                    <a href="<?=site_url('tambah/deleteuser/').$data->token?>" id="deleteuser" title="Remove" class="btn btn-link btn-danger">
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

<script>
    $(document).ready(function() {
    $('#datatables').DataTable( {
        "processing": false,
        "serverSide": false,
        "ajax": {
            "url": "<?=site_url('daftar/get_ajax_lisensi')?>",
            "type": "POST"
        },
        "columnDefs":[
            {
                "targets":[0,2,3],
                "className":"text-center"
            }
        ]
    });
    });
</script>