<!-- MAIN CONTENT -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h4 class="page-title">My Profile</h4>
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-with-nav">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Username</label>
                                        <input type="text" readonly="readonly" class="form-control" name="username" value="<?= $this->fungsi->user_login()->username?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Fullname</label>
                                        <input type="text" readonly="readonly" class="form-control" name="fullname" value="<?= $this->fungsi->user_login()->fullname?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">    
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="email" readonly="readonly" class="form-control" name="email" value="<?= $this->fungsi->user_login()->email?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>My Token</label>
                                        <input type="text" readonly="readonly" class="form-control" name="token" value="<?= $this->fungsi->user_login()->token?>">
                                    </div>
                                </div>
                            </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->