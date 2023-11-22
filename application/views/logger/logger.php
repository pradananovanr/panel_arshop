<!-- Main Content -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Log</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Terminal Logger</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Server Time</th>
                                            <th>Terminal Time</th>
                                            <th>Log</th>
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
                ajax: {
                    "url": "<?= site_url('logger/get_ajax_logger') ?>",
                    "type": "POST"
                },
                language: {
                    "processing": "Refreshing Data...",
                },
                order: [
                    [1, "desc"]
                ],
                columnDefs: [{
                    "targets": [0, 1],
                    "className": "text-center"
                }, {
                    "targets": [2],
                    "width": "70%"
                }]
            });

        //new $.fn.dataTable.FixedHeader(table);

        setInterval(function() {
            table.ajax.reload(null, false);
        }, 10000);

    });
</script>

<!-- End Main Content -->