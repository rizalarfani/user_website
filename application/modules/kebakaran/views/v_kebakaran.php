<section class="content-header">
    <h1>
        Data Kebakaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Kebakaran</a></li>
        <li class="active">kabakaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Kebakaran</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="table" style="padding: 5px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Suhu</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($kebakaran as $data) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data->longitude ?></td>
                        <td><?php echo $data->latitude ?></td>
                        <td><?php echo $data->suhu ?></td>
                        <td><?php echo ($data->status == 0) ? '<span class="label label-success">Tidak ada kebakaran</span>' : '<span class="label label-danger">Ada Kebakaran</span>' ?></td>
                        <td><?php echo $data->keterangan ?></td>
                        <td> <img alt="Kebakaran" src="<?php echo base_url() ?>uploads/image/<?php echo $data->foto ?>" style="width: 100px; height: 100px;"></td>
                    </tr>
                <?php endforeach; ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#kebakaran').addClass('active');
        $('#table').DataTable();
    });
</script>