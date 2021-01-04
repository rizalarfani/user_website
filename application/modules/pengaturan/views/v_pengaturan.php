<section class="content-header">
    <h1>
        Pengaturan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pengaturan</a></li>
        <li><a href="#">Pengaturan</a></li>
        <li class="active">Pengaturan</li>
    </ol>
</section>

<section class="content">
    <!-- Default box -->
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Pengaturan No Wa Notifikasi</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form action="<?php echo base_url('pengaturan/update') ?>" method="post">
                <input type="hidden" class="csrfname_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="No Damkar">No Watshapp Damkar</label>
                        <input type="text" class="form-control" name="damkar" placeholder="Watshapp Damkar" value="<?php echo $no_wa->no_damkar ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="No Damkar">No Watshapp Rumah sakit</label>
                        <input type="text" class="form-control" name="rumah_sakit" placeholder="Watshapp Rumah sakit" value="<?php echo $no_wa->no_rm ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="No Damkar">No Watshapp polisi</label>
                        <input type="text" class="form-control" name="polisi" placeholder="Watshapp polisi" value="<?php echo $no_wa->no_polisi ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block">Edit Data</button>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo base_url('dashboard') ?>" class="btn btn-warning btn-block">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#setting').addClass('active');
    });
</script>