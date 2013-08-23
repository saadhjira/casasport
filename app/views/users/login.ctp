<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<META NAME="robots" CONTENT="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Internet Dreams</title>

<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

<!--  jquery core -->

<?php echo $this->Html->css(array('admin/screen.css')); ?>
<?php echo $this->Html->script(array('jquery/jquery-1.4.1.min.js',
'jquery/custom_jquery.js',
'jquery/jquery.pngFix.pack.js')); ?>


<script type="text/javascript">

$(document).ready(function(){

$(document).pngFix( );

});

</script>

</head>

<body id="login-bg"> 

 

<!-- Start: login-holder -->

<div id="login-holder">



	<!-- start logo -->

	<div id="logo-login">

		<a href="index.html">
			<?php echo $this->Html->image('admin/shared/logo.png', array('alt' => '','width'=>156,'height'=>40))?>
		</a>

	</div>

	<!-- end logo -->

	

	<div class="clear"></div>

	

	<!--  start loginbox ................................................................................. -->

	<div id="loginbox">

	
    <?php echo $this->Form->create('User' , array( 'type' => 'post' ));?>
	
	<!--  start login-inner -->

	<div id="login-inner">

		<table border="0" cellpadding="0" cellspacing="0">

		<tr>

			<th>Username</th>

			<td>
				<?php
				
		        echo $this->Form->input('username',array("label"=>false,"class"=>"login-inp"));
				?>
				
			</td>

		</tr>

		<tr>

			<th>Password</th>

			<td>
				<?php
				
		        echo $this->Form->input('password',array("label"=>false,"class"=>"login-inp"));
				?>
				
				
			</td>

		</tr>

		

		<tr>

			<th></th>

			<td>
				<?php echo $this->Form->end(array('label' => 'Submit',"class"=>"submit-login"));?>
				
				
			</td>

		</tr>

		</table>

	</div>

 	<!--  end login-inner -->

	<div class="clear"></div>

	<a href="" class="forgot-pwd">Forgot Password?</a>

 </div>

 <!--  end loginbox -->

 

	<!--  start forgotbox ................................................................................... -->

	<div id="forgotbox">

		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>

		<!--  start forgot-inner -->

		<div id="forgot-inner">

		<table border="0" cellpadding="0" cellspacing="0">

		<tr>

			<th>Email address:</th>

			<td><input type="text" value=""   class="login-inp" /></td>

		</tr>

		<tr>

			<th> </th>

			<td><input type="button" class="submit-login"  /></td>

		</tr>

		</table>

		</div>

		<!--  end forgot-inner -->

		<div class="clear"></div>

		<a href="" class="back-login">Back to login</a>

	</div>

	<!--  end forgotbox -->



</div>

<!-- End: login-holder -->

</body>

</html>