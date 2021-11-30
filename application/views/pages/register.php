<div>
    <div>
        <!-- <h1 class="logo-name">IN+</h1> -->
        <img width="100%" src="<?= site_url('assets/images/logo_color.png') ?>">
    </div>
    <h3>Register to IN+</h3>
    <p>Create account to see it in action.</p>
    <form class="m-t" role="form" id="form-register" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required="">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password_confirm" placeholder="Konfirmasi Password" required="">
        </div>
        <div class="form-group">
            <div class="checkbox i-checks"><label> <input required="" type="checkbox"><i></i> Agree the terms and policy </label></div>
        </div>
        <button type="submit" class="ladda-button btn btn-primary block full-width m-b" data-style="zoom-in">Register</button>

        <p class="text-muted text-center"><small>Already have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="<?= base_url('login') ?>">Login</a>
    </form>
    <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
</div>