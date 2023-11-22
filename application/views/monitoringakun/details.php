<!-- Main Content -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Detail Akun</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title ">Detail Nomor Akun - <?= $row->account_number ?></h4>
                                <a href="<?= site_url('monitoring/monitor') ?>" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-undo"></i>
                                    Back
                                </a>
                            </div>
                            <div class="card-category text-danger">
                                * Data Tidak Ter-Refresh Otomatis
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="h3 text-primary col-6 col-md-4">
                                    ID Monitoring #<?= $row->id_monitoring ?>
                                    <div class="h3 text-danger"><?= ($row->account_type == "Demo" ? "(Akun Demo)" : "") ?></div>
                                </div>
                                <div class="h4 text-primary font-italic col-6 col-md-4 ml-auto">
                                    Start EA : <?= $row->ea_start ?>
                                    <div class="h4 text-success">Last Update : <?= $row->last_update ?></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Nama Akun</label>
                                        <a><?= $row->account_name ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Nomor Akun</label>
                                        <a><?= $row->account_number ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Kode Lisensi</label>
                                        <a><?= $row->code == null ? "-" : $row->code ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Expert Name</label>
                                        <a><?= $row->ea_name ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Jenis Akun</label>
                                        <a><?= $row->account_type ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Server</label>
                                        <a><?= $row->account_server ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Lokasi VPS</label>
                                        <a><?= $row->account_location ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Pair</label>
                                        <a><?= $row->ea_symbols ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Jumlah Hari Trading</label>
                                        <a><?= $row->ea_day_trade ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Modal Awal</label>
                                        <a><?= $row->account_first_balance ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Total Deposit</label>
                                        <a><?= $row->account_total_deposit ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Total Withdraw</label>
                                        <a><?= $row->account_total_withdraw ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Balance</label>
                                        <a><?= $row->account_balance ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Equity</label>
                                        <a><?= $row->account_equity ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Floating</label>
                                        <a><?= $row->floating ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Total Order</label>
                                        <a><?= $row->total_order ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Drawdown</label>
                                        <a><?= $row->drawdown ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Drawdown Percent</label>
                                        <a><?= $row->drawdown_percent ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Drawdown Date</label>
                                        <a><?= $row->drawdown_date ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Total ROMAD</label>
                                        <a><?= $row->account_romad ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Daily ROMAD</label>
                                        <a><?= $row->daily_romad ?></a>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Profit Hari Ini</label>
                                        <a><?= $row->today_profit ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Total Profit</label>
                                        <a><?= $row->total_profit ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Daily Profit</label>
                                        <a><?= $row->daily_profit ?></a>
                                    </div>
                                </div>                                
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Daily Profit Percent</label>
                                        <a><?= $row->daily_percentage ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Running Pair</label>
                                        <a><?= $row->ea_running_symbol ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Keterangan Tambahan</label>
                                        <a><?= $row->any_details ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Token</label>
                                        <a><?= $row->token ?></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group form-group-default">
                                        <label>Setting</label>
                                        <a><?= $row->ea_settings ?></a>
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
<!-- End Main Content -->