<!-- Main Content -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Monitoring Akun</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Monitoring Akun</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Account</th>
                                            <th>EA Name</th>
                                            <th>Pair EA</th>
                                            <th>Balance</th>
                                            <th>Equity</th>
                                            <th>Order</th>
                                            <th>Floating</th>
                                            <th>Drawdown</th>
                                            <th>Drawdown %</th>
                                            <th>Today Profit</th>
                                            <th>All Profit</th>
                                            <th>Days</th>
                                            <th>Daily Profit $</th>
                                            <th>Daily Profit %</th>
                                            <th>Daily Romad</th>
                                            <th>IP VPS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
        var table =
            $('#datatables').DataTable({
                serverSide: false,
                processing: false,
                scrollX: true,
                nowrap: true,
                ajax: {
                    "url": "<?= site_url('monitoring/get_ajax_monitoring') ?>",
                    "type": "POST"
                },
                language: {
                    "processing": "Refreshing Data...",
                },
                columnDefs: [{
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
                    "className": "text-center"
                }]
            });

        setInterval(function() {
            table.ajax.reload(null, false);
        }, 5000);

    });
</script>

<!-- End Main Content -->