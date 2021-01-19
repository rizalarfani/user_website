<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url('uploads/image/' . $this->session->userdata('log_admin')->foto) ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $this->session->userdata('log_admin')->nama_lengkap ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
            <a href="<?php echo base_url('dashboard') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li id="kebakaran">
            <a href="<?php echo base_url('kebakaran') ?>">
                <i class="fa fa-fire"></i> <span>Data Kebakaran</span>
            </a>
        </li>
        <li class="treeview" id="monitoring">
            <a href="#">
                <i class="fa fa-television"></i> <span>Monitoring</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="monitoring_camera"><a href="<?php echo base_url('monitoring') ?>"><i class="fa fa-circle-o"></i> Monitoring Camera </a></li>
                <li id="lokasi"><a href="<?php echo base_url('monitoring/peta') ?>"><i class="fa fa-circle-o"></i> Lokasi Kebakaran </a></li>
            </ul>
        </li>
        <?php if ($this->session->userdata('log_admin')->id_level == 1) : ?>
            <li class="treeview" id="user_data">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Data User</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="user"><a href="<?php echo base_url('user') ?>"><i class="fa fa-circle-o"></i> User akun </a></li>
                    <li id="level"><a href="<?php echo base_url('level') ?>"><i class="fa fa-circle-o"></i> Level user </a></li>
                </ul>
            </li>
            <li id="setting">
                <a href="<?php echo base_url('pengaturan') ?>">
                    <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                </a>
            </li>
        <?php endif; ?>
        <li id="about">
            <a href="<?php echo base_url('about') ?>">
                <i class="fa fa-info"></i> <span>About</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('logout') ?>">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
        </li>
    </ul>
</section>