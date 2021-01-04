<section class="content-header">
    <h1>
        Data level user
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data user</a></li>
        <li class="active">level</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data user</h3>
            <div class="box-tools pull-right">
                <a data-toggle="modal" data-target="#tambah" href="#" class="btn btn-success btn-sm" id="create">Tambah level</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="table" style="padding: 5px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($level as $data) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data->nama ?></td>
                        <td><?php echo ($data->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-info">Non Active</span>' ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#edit" data-id="<?php echo enkrip($data->id) ?>" data-nama="<?php echo $data->nama ?>" data-status="<?php echo $data->status ?>" class="btn btn-info btn-xs btn_edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" data-id="<?php echo enkrip($data->id) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo ($data->status == 1) ? 'Non Active' : 'Active' ?>" class="btn btn-warning btn-xs <?php echo ($data->status == 1) ? 'btn_non' : 'btn_active' ?>"><i class="fa <?php echo ($data->status == 1) ? 'fa-lock' : 'fa-unlock' ?>"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit level user</h5>
            </div>
            <form action="<?php echo base_url('level/edit') ?>" method="post">
                <input type="hidden" class="csrfname_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_level" name="id_level">
                    <div class="form-group">
                        <label class="control-label" for="Nama level"><i class="fa fa-star text-red"></i> Nama level</label>
                        <input type="text" class="form-control" placeholder="Nama level" name="nama" autocomplete="off" id="nama">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="status_level">
                        <label class="control-label" for="Status level"><i class="fa fa-star text-red"></i> Status level</label>
                        <select name="status" class="form-control" id="status">
                            <option value="">-- Pilih Status --</option>
                            <option value="1">active</option>
                            <option value="0">tidak active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah level user</h5>
            </div>
            <form action="<?php echo base_url('level/create') ?>" method="post">
                <input type="hidden" class="csrfname_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="Nama level"><i class="fa fa-star text-red"></i> Nama level</label>
                        <input type="text" class="form-control" placeholder="Nama level" name="nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="Status level"><i class="fa fa-star text-red"></i> Status level</label>
                        <select name="status" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="1">active</option>
                            <option value="0">tidak active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#user_data').addClass('active');
        $('#level').addClass('active');
        $('#table').DataTable();

        $('#edit').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#id_level').attr('value', div.data('id'));
            modal.find('#nama').attr('value', div.data('nama'));
            modal.find('#status_level').attr('value', div.data('status'));
            let level = $('#status_level').val();
            let option = ' <option value="">-- Pilih level user --</option><option ' + (level == 0 ? 'selected' : '') + ' value="0">Non active</option><option ' + (level == 1 ? 'selected' : '') + ' value="1">active</option>';
            $('#status').html(option);
        });

        $('.btn_active').click(function() {
            let id_level = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk activekan level",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?php echo base_url('level/active/') ?>' + id_level;
                }
            })
        });

        $('.btn_non').click(function() {
            let id = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk non activekan level",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?php echo base_url('level/non_active/') ?>' + id;
                }
            })
        });
    });
</script>