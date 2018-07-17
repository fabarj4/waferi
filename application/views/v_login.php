<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Waferi - Login</title>
    <link rel="icon" href="/logo.ico" type="image/x-icon">
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('asset/css/materialize.min.css') ?>" type="text/css" rel="stylesheet"
          media="screen,projection"/>
    <link href="<?php echo base_url('asset/css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>

    <style>
        .container {
            margin-top: 25px;
            padding: 5px;
        }
    </style>
</head>
<body>
<div class="row container">
    <form class="col s12">
        <div class="row">
            <div class="col s12">
                <center><img src="<?php echo base_url('/asset/image/logo.png') ?>" alt="Logo"></center>
                <center><h5>Login</h5></center>
            </div>
            <div class="input-field col s12">
                <input id="username" type="text" class="validate">
                <label for="username">Username</label>
            </div>
            <div class="input-field col s12">
                <input id="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
            <div class="col s12">
                <center>
                    <a class="waves-effect waves-light btn" id="btnLogin">Login</a>
                </center>
            </div>
        </div>
    </form>
</div>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url('asset/js/materialize.js') ?>"></script>
<script src="<?php echo base_url('asset/js/init.js') ?>"></script>
<script type="text/javascript">
    $('#btnLogin').click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username && password) {
            $.ajax({
                url : "<?php echo base_url()?>login/actlogin",
                type: 'post',
                data: {username: username, password: password},
                dataType: 'json',
                success: function(response){
                  if(response.role === ''){
                    M.toast({html: response.message})
                  }else if(response.role === '0'){
                    window.location.replace("<?php echo base_url()?>Panel_User");
                  }else{
                    window.location.replace("<?php echo base_url()?>Panel_Admin");
                  }
                }
            });
        }
    })
</script>
</body>
</html>
