<!-- Main Content -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Lisensi</h4>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Lisensi EA</h4>
                                <a href="<?=site_url('daftar/listlisensi')?>" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-undo"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group <?=form_error('code') ? 'has-error' : null?>" >
                                    <input type="hidden" name="id_code" value="<?=$row->id_code?>">
                                    <label>Kode Lisensi</label>
                                    <input type="text" class="form-control" name="code" value="<?= $this->input->post('code') ?? $row->code?>" placeholder="Enter Kode Lisensi">
                                    <label class="text-danger" for="errorInput"><?=form_error('code')?></label>
                                </div>
                                <div class="form-group <?=form_error('active_until') ? 'has-error' : null?>" >
                                    <label>Aktif Hingga</label>
                                    <input type="date" class="form-control" name="active_until" value="<?= $this->input->post('active_until') ?? $row->active_until?>" placeholder="Enter Aktif Hingga">
                                    <label class="text-danger" for="errorInput"><?=form_error('active_until')?></label>
                                </div>                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="Reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


                                
<!-- End Main Content -->