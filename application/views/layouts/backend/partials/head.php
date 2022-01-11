<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title .' | '. _APP_NAME ?></title>
    <link rel="icon" href="<?= site_url('assets/images/'. _APP_ICON) ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= site_url('assets/images/'. _APP_ICON) ?>" type="image/x-icon">

    <link href="<?= site_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/css/plugins/toastr/toastr.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/css/plugins/ladda/ladda-themeless.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/css/style.css') ?>" rel="stylesheet">
    <?= $css ?>
</head>
