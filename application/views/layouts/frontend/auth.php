<?php $this->load->view('layouts/frontend/partials/head'); ?>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown mt-5">
        <?php $this->load->view('pages/'.$pages) ?>
    </div>

    <!-- Mainly scripts -->
    <?php $this->load->view('layouts/frontend/partials/plugins'); ?>
    
</body>

</html>
