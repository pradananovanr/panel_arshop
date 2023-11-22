<div class="main-panel">
	<div class="content">
		<div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pesan</h4>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Kirim Pesan Ke Pengguna EA</h4>
                                <a href="<?=site_url('dashboard')?>" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-undo"></i>
                                    Back To Dashboard
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="" method="post">
                                <div class="form-group" >
                                    <label>Metode</label>
                                    <select name="method" id="method" class="form-control">
                                        <option value="">-- Pilih Metode Kirim Pesan --</option>
                                        <option value="license">Kirim Ke Tiap Pengguna Lisensi</option>
                                        <option value="account">Kirim Ke Nomor Akun Tertentu</option>
                                    </select>
                                </div>
                                <div class="form-group" >
                                    <label>Tujuan</label>
                                    <select name="list" id="list" class="form-control">
                                        <option value="">-- Pilih Tujuan --</option>
                                    </select>
                                </div>
                                <div class="form-group" >
                                <input type="hidden" name="token" value="<?=$this->fungsi->user_login()->token?>">
                                    <label>Message</label>
                                    <input class="form-control" name="message"></input>
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



<script>
  $(document).ready(function(){
    $("#method").change(function(){
      $.ajax({
        type: "POST",
        url: "<?= site_url('pesan/get_ajax_account') ?>",
        data: {method : $('#method').val()},
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){
          $("#list").html(response.list).show();
        },
      });
    });
  });
</script>