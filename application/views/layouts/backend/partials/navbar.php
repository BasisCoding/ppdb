 <ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element">
            <img alt="image" class="rounded-circle" src="<?= site_url('assets/img/profile_small.jpg') ?>"/>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="block m-t-xs font-bold"><?= $this->session->userdata('nama_lengkap'); ?></span>
                <span class="text-muted text-xs block"><?= $this->session->userdata('group_desc'); ?> <b class="caret"></b></span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="login.html">Logout</a></li>
            </ul>
        </div>
        <div class="logo-element p-3">
            <a target="_blank" href="<?= site_url('assets/index.html') ?>">
                <img class="img-fluid" src="<?= site_url('assets/images/'. _APP_ICON) ?>">
            </a>
        </div>
    </li>
    <?= $menu ?>
</ul>