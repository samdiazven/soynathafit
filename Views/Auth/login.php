<head>
<meta name="description" content="SoyNathaFit-Sistema Integral del Reto de las 6 Semanas">
<!-- Twitter meta-->
<!-- Open Graph Meta-->
<meta property="og:type" content="website">
<meta property="og:site_name" content="SoyNathaFit">
<meta property="og:title" content="SoyNathaFit">
<meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
<meta property="og:description" content="SoyNathaFit-Sistema Integral">
<title><?=$data['page_tag'];?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
<!-- Font-icon css-->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
    <h1>SoyNathaFit</h1>
    </div>
    <div class="login-box">
    <form class="login-form" action="" name="form-login" id="form-login">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesi&oacute;n</h3>
        <div class="form-group">
        <label class="control-label">EMAIL</label>
        <input class="form-control" type="text" name="email" id="email" placeholder="Email" autofocus>
        </div>
        <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
        </div>
    </form>
    <form class="forget-form" action="index.html">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
        <div class="form-group">
        <label class="control-label">EMAIL</label>
        <input class="form-control" type="text" placeholder="Email">
        </div>
        <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
        </div>
        <div class="form-group mt-3">
        <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
        </div>
    </form>
    </div>
</section>
<?php footerAdmin($data); ?>