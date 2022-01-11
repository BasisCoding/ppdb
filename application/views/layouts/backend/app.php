<?php $this->load->view('layouts/backend/partials/head'); ?>
<body class="">

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">

                <!-- Menu Navigasi  -->
                <?php $this->load->view('layouts/backend/partials/navbar'); ?>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">

            <!-- Header -->
            <?php $this->load->view('layouts/backend/partials/header'); ?>

            <!-- Title & Breadcrumb -->
            <?php $this->load->view('layouts/backend/partials/breadcrumb'); ?>

            <!-- Main Content -->
            <?php $this->load->view('pages/'.$pages); ?>

            <!-- Footer -->
            <?php $this->load->view('layouts/backend/partials/footer'); ?>

        </div>
    </div>

<?php $this->load->view('layouts/backend/partials/plugins'); ?>
