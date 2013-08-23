	
<!doctype html>
<html>

<head>
	<title>كازاسبور</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<?php echo $this->Html->css(array('frontend/underconstruction.css')); ?>
		

</head>
<body>
	<div id="underconstruction-container">
		<div id="logo">
			<a href="index-2.html"><img alt="" src="app/webroot/img/frontend/logo.png" style="width: 188px;"></a>
		</div>
		<div id="content">
			<h1 id="underconstruction-title">الموقع قيد الإنجاز ... انتظرونا</h1>
			<div id="countdown-container">
			</div>
		</div>
	</div>

	<?php echo $this->Html->script(array('frontend/jquery.min.js','frontend/jquery.countdown.js'));?>	

	<script type="text/javascript">
		$(function () {
			var date_end = new Date(2013, 9-1, 15); //date(year, month - 1, day)
			$('#countdown-container').countdown({until: date_end, format: 'DHMS'});
		});
	</script>
	
</body>

</html>
