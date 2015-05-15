<!DOCTYPE html>
<html dir="rtl">
<?php $templates_url="http://localhost/ali/templates/kootlas/"; ?>
<!doctype html>
<html>
<head>
<base href="http://localhost/ali/">
<meta charset="utf-8">
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="<?php echo $templates_url ?>css/toolbar.css">
<script type="text/livescript" src="<?php echo $templates_url ?>js/jquery-1.10.2.min.js"></script>
<script type="text/livescript" src="<?php echo $templates_url ?>js/toolbar.js"></script>
<script type="text/livescript" src="<?php echo $templates_url ?>js/slide.js"></script>
</head>

<body>
<header>
	<ul>
    	<li>
        	<div></div>
            <a href="index.php/signup"><img src="img/Business-Man-Add-01-32.png">عضویت </a>
            <form>
	            <ul>
                    <li><input type="text" name="user"></li>
                    <li><input type="password" name="pass"></li>
                    <li><input type="submit" value="ارسال"></li>
                </ul>
            </form>
        </li>
        <li><div></div><a href="index.php/login"><img src="img/Login-02-32.png">ورود</a></li>
    </ul>
    <img src="img/logo.png">
</header>












                    <?php 
			if(!isset($type))
			$type='quest_type';
			if ($type=='tutor_type') 
			require('nav/tutor.php');
			elseif($type=='user_type')
			require('nav/user.php');
			else
			require('nav/guest.php');
			 ?>
             
      