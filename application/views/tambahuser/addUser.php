<!-- Main Content -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah User Account</h4>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add User</h4>
                                <a href="<?=site_url('daftar/listuser')?>" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-undo"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group <?=form_error('username') ? 'has-error' : null?>" >
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" value="<?=set_value('username')?>" placeholder="Enter Username">
                                    <label class="text-danger" for="errorInput"><?=form_error('username')?></label>
                                </div>
                                <div class="form-group <?=form_error('name') ? 'has-error' : null?>" >
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="fullname" value="<?=set_value('fullname')?>" placeholder="Enter Name">
                                    <label class="text-danger" for="errorInput"><?=form_error('fullname')?></label>
                                </div>
                                <div class="form-group <?=form_error('email') ? 'has-error' : null?>" >
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?=set_value('email')?>" placeholder="Enter Email">
                                    <label class="text-danger" for="errorInput"><?=form_error('email')?></label>
                                </div>
                                <div class="form-group <?=form_error('password') ? 'has-error' : null?>" >
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="<?=set_value('password')?>" placeholder="Enter Password">
                                    <label class="text-danger" for="errorInput"><?=form_error('password')?></label>
                                </div>
                                <div class="form-group <?=form_error('passconf') ? 'has-error' : null?>" >
                                    <label>Password Confirmation</label>
                                    <input type="password" class="form-control" name="passconf" value="<?=set_value('passconf')?>" placeholder="Enter Password Again">
                                    <label class="text-danger" for="errorInput"><?=form_error('passconf')?></label>
                                </div>
                                <div class="form-group <?=form_error('level') ? 'has-error' : null?>" >
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="">- Pilih Level User -</option>
                                        <option value="1" <?=set_value('level') == 1 ? "selected" : null ?> >Admin</option>
                                        <option value="2" <?=set_value('level') == 2 ? "selected" : null ?> >User</option>
                                    </select>
                                    <label class="text-danger" for="errorInput"><?=form_error('level')?></label>
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


                                
<!-- End Main Content -->