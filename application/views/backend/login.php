<?php 
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="We ddevelop creative software, eye catching software. We also train to become a creative thinker">
<meta name="author" content="STARK EXPO TECH EXCHANGE">
<link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/LOGO.png">
  
<title><?php echo $system_title; ?></title>

<!-- Google reCAPTCHA v3 -->
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6LdbNUYrAAAAAIyPLaVA5HRMsC54RpDeYOrrMkwf"></script> -->
<!-- <script>
grecaptcha.ready(function() {
    grecaptcha.execute('6LdbNUYrAAAAAIyPLaVA5HRMsC54RpDeYOrrMkwf', {action: 'login'}).then(function(token) {
        document.getElementById('g-recaptcha-response').value = token;
    });
});
</script> -->

<!-- Google Sign-In -->
<meta name="google-signin-client_id" content="229501522875-sqn3mt09k5slqei9te09gkjfucgd3ics.apps.googleusercontent.com">
<script src="https://accounts.google.com/gsi/client" async defer></script>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: 
            linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url('<?php echo base_url(); ?>uploads/bg2.png') no-repeat center center;
        background-size: cover;
    }
    .login-box {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
    }
    .login-box h2 {
        margin-bottom: 20px;
        text-align: center;
    }
    .login-box form {
        display: flex;
        flex-direction: column;
    }
    .login-box input[type="email"],
    .login-box input[type="password"],
    .login-box select {
        margin-bottom: 15px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .login-box button {
        background-color: #4285f4;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .login-box button:hover {
        background-color: #357ae8;
    }
    .login-box p {
        margin-top: 15px;
        text-align: center;
    }
    .g_id_signin {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
    h1 {
        color: blue;
        font-family: Georgia, serif;
        font-size: 20px;
        text-align: center;
        font-weight: bold;
    }
</style>


</head>
<body>
<div class="login-box">
<h4 class="box-title m-b-20" align="center">
					<img src="<?php echo base_url() ?>uploads/LOGO.png" class="img-circle" width="100" height="100"/></h4>
					<!-- <h5 align="center"><a href="">< ?php echo $system_name;?></a></h5> -->
    <!-- Login Form -->
    <h2><?php echo $system_name; ?></h2>

    <!-- Language Switcher -->
    <!-- <form method="get" action="">
        <select name="lang" onchange="this.form.submit()">
            <option value="en">English</option>
            <option value="ny">Chichewa</option>
            <option value="fr">French</option>
        </select>
    </form> -->
    <h1><b>SYSTEM LOGIN PANEL<b></h1>
  
    <form method="post" action="<?php echo base_url(); ?>login/validate_login">
        <input type="email" name="email" required placeholder="<?php echo get_phrase('email'); ?>">
        <input type="password" name="password" required placeholder="<?php echo get_phrase('password'); ?>">
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
        <button type="submit"><?php echo get_phrase('log_in'); ?></button>
    </form>

    <!-- Google Login Button -->
    <div id="g_id_onload"
         data-client_id="229501522875-sqn3mt09k5slqei9te09gkjfucgd3ics.apps.googleusercontent.com"
         data-login_uri="<?php echo base_url(); ?>http://localhost/open/login/google_callback"
         data-auto_prompt="false">
    </div>
    <div class="g_id_signin" data-type="standard"></div>

    <!-- Sign-Up Link -->
    <!-- <p><a href="< ?php echo base_url(); ?>signup">Don't have an account? Sign up</a></p> -->
</div>
</body>
</html>
