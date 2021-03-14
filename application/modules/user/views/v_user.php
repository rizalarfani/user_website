<section class="content-header">
    <h1>
        Data user
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data user</a></li>
        <li class="active">user</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data user</h3>
            <div class="box-tools pull-right">
                <a data-toggle="modal" data-target="#tambah" href="#" class="btn btn-success btn-sm" id="create">Tambah user</a>
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="table" style="padding: 5px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($user as $data) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data->nama_lengkap ?></td>
                        <td><?php echo $data->email ?></td>
                        <td> <img alt="User Profile <?php echo $this->session->userdata('log_admin')->nama_lengkap ?>" src="<?php echo base_url() ?>uploads/image/<?php echo $this->session->userdata('log_admin')->foto ?>" class="img-circle" style="width: 50px; height: 50px;"></td>
                        <td><?php echo ($data->id_level == 1) ? '<span class="label label-success">' . $data->nama . '</span>' : '<span class="label label-info">' . $data->nama . '</span>' ?></td>
                        <td><?php echo ($data->status_user == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-info">Non Active</span>' ?></td>
                        <td>
                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-id="<?php echo enkrip($data->id_user) ?>" title="Hapus data" class="btn btn-danger btn-xs btn_hapus"><i class="fa fa-trash"></i></a>
                            <a href="#" data-toggle="modal" data-target="#edit" data-id="<?php echo enkrip($data->id_user) ?>" data-nama="<?php echo $data->nama_lengkap ?>" data-email="<?php echo $data->email ?>" data-id_level="<?php echo $data->id_level ?>" data-status="<?php echo $data->status_user ?>" data-no_wa="<?php echo $data->no_wa ?>" class="btn btn-info btn-xs btn_edit"><i class="fa fa-edit"></i></a>
                            <a href="javascript:void(0)" data-id="<?php echo enkrip($data->id_user) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo ($data->status_user == 1) ? 'Non Active' : 'Active' ?>" class="btn btn-warning btn-xs <?php echo ($data->status_user == 1) ? 'btn_non' : 'btn_active' ?>"><i class="fa <?php echo ($data->status_user == 1) ? 'fa-lock' : 'fa-unlock' ?>"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah user baru</h5>
            </div>
            <form action="<?php echo base_url('user/create') ?>" method="post">
                <input type="hidden" class="csrfname_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="Nama user"><i class="fa fa-star text-red"></i> Nama user</label>
                        <input type="text" class="form-control" placeholder="Nama user" name="nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email user"><i class="fa fa-star text-red"></i> email user</label>
                        <input type="email" class="form-control" placeholder="email user" name="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="no wa user"><i class="fa fa-star text-red"></i> no wa user</label>
                        <input type="text" class="form-control" placeholder="no wa user" name="wa" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password user"><i class="fa fa-star text-red"></i> password user</label>
                        <input type="password" class="form-control" placeholder="password user" name="password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="level user"><i class="fa fa-star text-red"></i> Level user</label>
                        <select name="level" id="level" class="form-control">
                            <?php foreach ($level as $data) : ?>
                                <option value="<?php echo enkrip($data->id) ?>"><?php echo $data->nama ?></option>
                            <?php endforeach; ?>
                        </select>
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
            </div>
            <form action="<?php echo base_url('user/edit') ?>" method="post">
                <input type="hidden" class="csrfname_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <input type="hidden" id="id_user" name="id_user">
                    <div class="form-group">
                        <label class="control-label" for="Nama user"><i class="fa fa-star text-red"></i> Nama user</label>
                        <input type="text" class="form-control" placeholder="Nama user" name="nama" autocomplete="off" id="nama">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email user"><i class="fa fa-star text-red"></i> email user</label>
                        <input type="email" class="form-control" placeholder="email user" name="email" autocomplete="off" id="email">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="no wa user"><i class="fa fa-star text-red"></i> no wa user</label>
                        <input type="text" class="form-control" placeholder="no wa user" name="wa" autocomplete="off" id="no">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="id_status">
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
<script>
    $(document).ready(function() {
        $('#user_data').addClass('active');
        $('#user').addClass('active');
        $('#table').DataTable();

        $('#edit').on('show.bs.modal', function(event) {
            var div = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#id_user').attr('value', div.data('id'));
            modal.find('#nama').attr('value', div.data('nama'));
            modal.find('#email').attr('value', div.data('email'));
            modal.find('#no').attr('value', div.data('no_wa'));
            modal.find('#id_status').attr('value', div.data('status'));
            let status = $('#id_status').val();
            let option = ' <option value="">-- Pilih level user --</option><option ' + (status == 0 ? 'selected' : '') + ' value="0">Non active</option><option ' + (status == 1 ? 'selected' : '') + ' value="1">active</option>';
            $('#status').html(option);
        });

        $('.btn_hapus').click(function() {
            let id_user = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk hapus user",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?php echo base_url('user/delete/') ?>' + id_user;
                }
            })
        });

        $('.btn_active').click(function() {
            let id_user = $(this).attr('data-id');
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk activekan user",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?php echo base_url('user/active/') ?>' + id_user;
                }
            })
        });

        $('.btn_non').click(function() {
            let id_user = $(this).attr('data-id');
            console.log(id_user);
            Swal.fire({
                title: 'Apakah yakin?',
                text: "untuk non activekan user",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'iya, saya yakin!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '<?php echo base_url('user/non_active/') ?>' + id_user;
                }
            })
        });
    });
</script>