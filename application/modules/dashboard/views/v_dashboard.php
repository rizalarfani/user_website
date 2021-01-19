<section class="content-header">
    <h1>
        Dashboard
        <small>Fire Detection</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo count($sum_user) ?></h3>
                    <p>Data User</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url('user') ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <?php if (empty($sum_kebakaran)) : ?>
                        <h3>0</h3>
                    <?php else : ?>
                        <h3><?php echo count($sum_kebakaran) ?></h3>
                    <?php endif; ?>
                    <p>Data Kebakaran</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fire"></i>
                </div>
                <a href="<?php echo base_url('kebakaran') ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <?php if (empty($level)) : ?>
                        <h3>0</h3>
                    <?php else : ?>
                        <h3><?php echo count($level) ?></h3>
                    <?php endif; ?>
                    <p>Data Level user</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="<?php echo base_url('level') ?>" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Statistic Kebakaran</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="myChart" width="400" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dashboard').addClass('active');
        var ctx = document.getElementById('myChart');
        $.ajax({
            type: "GET",
            url: '<?php echo base_url('dashboard/GetGrafik') ?>',
            dataType: 'JSON',
            success: function(respon) {
                let tahun = [];
                let jumlah_kejadian = [];
                $.each(respon, function(item, data) {
                    tahun.push(data.tahun);
                    jumlah_kejadian.push(data.jumlah);
                });
                Grafik(tahun, jumlah_kejadian);
            }
        });

        function Grafik(tahun, data) {
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: tahun,
                    datasets: [{
                        label: 'Jumlah Kebakaran',
                        data: data,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

    });
</script>