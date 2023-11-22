<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Monitoring Akun | <?= $result->username ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url() ?>assets/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url() ?>assets/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['<?= base_url() ?>assets/assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/azzara.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets/css/sweetalert2.min.css" id="theme-styles">

</head>

<body>
    <?php

    ?>
    <div class="wrapper">
        <div>
            <div class="content">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="font-weight-bold text-center">Monitoring EA</h1>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Account</th>
                                                    <th>EA Name</th>
                                                    <th>Pair EA</th>
                                                    <th>Balance</th>
                                                    <th>Equity</th>
                                                    <th>Order</th>
                                                    <th>Floating</th>
                                                    <th>Drawdown</th>
                                                    <th>Drawdown Percent</th>
                                                    <th>Today Profit</th>
                                                    <th>All Profit</th>
                                                    <th>Daily Profit $</th>
                                                    <th>Daily Profit %</th>
                                                    <th>Daily Romad</th>
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
    </div>

    <script src="<?= base_url() ?>assets/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script src="<?= base_url() ?>assets/assets/js/ready.min.js"></script>

    <script>
        $(document).ready(function() {
            var table =
                $('#datatables').DataTable({
                    serverSide: false,
                    processing: false,
                    ajax: {
                        "url": "<?= site_url('view/get_ajax_monitoring/' . $result->username) ?>",
                        "type": "POST"
                    },
                    language: {
                        "processing": "Refreshing Data...",
                    },
                    columnDefs: [{
                        "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
                        "className": "text-center"
                    }]
                });

            //new $.fn.dataTable.FixedHeader(table);

            setInterval(function() {
                table.ajax.reload(null, false);
            }, 5000);

        });
    </script>

</body>

</html>