<div>
    <div>

        <!-- <h1 class="logo-name">IN+</h1> -->
        <img width="100%" src="<?= site_url('assets/images/'. _LOGO) ?>">
    </div>
   
    <p>Login in. To see it in action.</p>
    <form class="m-t" role="form" id="form-login" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username or Email" name="username_email" required="">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="">
        </div>
        <button type="submit" class="ladda-button btn btn-primary block full-width m-b" data-style="zoom-in">Login</button>

        <a href="#"><small>Forgot password?</small></a>
        <p class="text-muted text-center"><small>Do not have an account?</small></p>
        <a class="btn btn-sm btn-white btn-block" href="<?= base_url('register') ?>">Create an account</a>
    </form>
    <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
</div>