                    <!-- Main Content -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Link Public</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Setting Link Public</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="h4">Current Status : </div>
                            <?=($row->apply_public == 0 ? '<div class="h3 font-weight-bold text-danger col-md-8 ml-auto mr-auto">Not Shared For Public</div>' : '<div class="h3 font-weight-bold text-success col-md-8 ml-auto mr-auto">Shared For Public</div>')?>
                            
                            <div class="form-group">
                                <form action="<?=site_url('monitoring/update_public')?>" method="post">
                                    <input type="hidden" name="token" value="<?=$this->fungsi->user_login()->token?>">
                                    <?=($row->apply_public == 0 ? '<button type="submit" name="apply_public" class="btn btn-success" value="1">Turn On</button>' : '<button type="submit" name="apply_public" class="btn btn-danger" value="0">Turn Off</button>')?>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="h4">Link Monitoring Public : 
                                <a href="<?=site_url(),"view/public/",($this->fungsi->user_login()->username)?>" class="btn btn-link"><?=site_url(),"view/public/",($this->fungsi->user_login()->username)?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->

