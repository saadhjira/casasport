<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META NAME="robots" CONTENT="noindex,nofollow">
<title>Internet Dreams</title>


<?php echo $this->Html->css(array('admin/screen')); ?>

<!--[if IE]>

<link rel="stylesheet" media="all" type="text/css" href="/hagga/css/pro_dropline_ie.css" />

<![endif]-->



<!--  jquery core -->

<?php echo $this->Html->script(array('jquery/jquery-1.4.1.min.js','jquery/jquery_json.js','jquery/ui.core.js',
'jquery/ui.checkbox.js','jquery/jquery.bind.js','jquery/admin_custom_jquery.js')); 
?>


<!--  checkbox styling script -->


<script type="text/javascript">

$(function(){

	$('input').checkBox();

	$('#toggle-all').click(function(){

 	$('#toggle-all').toggleClass('toggle-checked');

	$('#mainform input[type=checkbox]').checkBox('toggle');

	return false;

	});

});

</script>  
<![if !IE 7]>
<!--  styled select box script version 1 -->
<?php echo $this->Html->script(array('jquery/jquery.selectbox-0.5.js')); ?>
<script type="text/javascript">

$(document).ready(function() {

	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });

});

</script>

 



<![endif]>



<!--  styled select box script version 2 --> 


<?php echo $this->Html->script(array('jquery/query.selectbox-0.5_style_2.js')); ?>
<script type="text/javascript">

$(document).ready(function() {

	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });

	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });

});

</script>



<!--  styled select box script version 3 --> 

<?php echo $this->Html->script(array('jquery/jquery.selectbox-0.5_style_2.js')); ?>
<script type="text/javascript">

$(document).ready(function() {

	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });

});

</script>



<!--  styled file upload script --> 

<?php echo $this->Html->script(array('jquery/jquery.filestyle.js')); ?>


<script type="text/javascript" charset="utf-8">

  $(function() {

      $("input.file_1").filestyle({ 

          image: "images/forms/choose-file.gif",

          imageheight : 21,

          imagewidth : 78,

          width : 310

      });

  });

</script>



<!-- Custom jquery scripts -->
<?php echo $this->Html->script(array('jquery/custom_jquery.js','jquery/jquery.tooltip.js','jquery/jquery.dimensions.js')); ?>


 

<!-- Tooltips -->


<script type="text/javascript">

$(function() {

	$('a.info-tooltip ').tooltip({

		track: true,

		delay: 0,

		fixPNG: true, 

		showURL: false,

		showBody: " - ",

		top: -35,

		left: 5

	});

});

</script> 





<!--  date picker script -->
<?php echo $this->Html->css(array('admin/datePicker')); ?>

<?php echo $this->Html->script(array('jquery/date.js','jquery/jquery.datePicker.js')); ?>


<script type="text/javascript" charset="utf-8">

        $(function()

{



// initialise the "Select date" link

$('#date-pick')

	.datePicker(

		// associate the link with a date picker

		{

			createButton:false,

			startDate:'01/01/2005',

			endDate:'31/12/2020'

		}

	).bind(

		// when the link is clicked display the date picker

		'click',

		function()

		{

			updateSelects($(this).dpGetSelected()[0]);

			$(this).dpDisplay();

			return false;

		}

	).bind(

		// when a date is selected update the SELECTs

		'dateSelected',

		function(e, selectedDate, $td, state)

		{

			updateSelects(selectedDate);

		}

	).bind(

		'dpClosed',

		function(e, selected)

		{

			updateSelects(selected[0]);

		}

	);

	

var updateSelects = function (selectedDate)

{

	var selectedDate = new Date(selectedDate);

	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');

	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');

	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');

}

// listen for when the selects are changed and update the picker

$('#d, #m, #y')

	.bind(

		'change',

		function()

		{

			var d = new Date(

						$('#y').val(),

						$('#m').val()-1,

						$('#d').val()

					);

			$('#date-pick').dpSetSelected(d.asString());

		}

	);



// default the position of the selects to today

var today = new Date();

updateSelects(today.getTime());



// and update the datePicker to reflect it...

$('#d').trigger('change');

});

</script>



<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->

<?php echo $this->Html->script(array('jquery/date.js','jquery/jquery.pngFix.pack.js')); ?>

<script type="text/javascript">

$(document).ready(function(){

$(document).pngFix( );

});

</script>

</head>

<body> 
<h1>

</h1>
<!-- Start: page-top-outer -->

<div id="page-top-outer">    



<!-- Start: page-top -->

<div id="page-top">



	<!-- start logo -->

	<div id="logo">

	    <a href="">
		<?php //echo $this->Html->image('frontend/logo.png', array('alt' => '','width'=>156,'height'=>40))?>
		</a>

	</div>

	<!-- end logo -->

	

	<!--  start top-search -->

	<div id="top-search">
       <?php echo $this->Form->create('Search', array('type'=>'get',
			//'url' => array_merge(array('controller'=>'searches','action' => 'index'), $this->params['pass'])
			));
			
		?>
		
		<table border="0" cellpadding="0" cellspacing="0">
         <tr>

		<td>
			
			<?php 
		echo $this->Form->input('q', array('div' => false,"value"=>__('Search',true),'empty' => true,'label'=>false,"class"=>"top-search-inp",'onblur'=>"if (this.value=='') { this.value='Search'; }", "onfocus"=>"if (this.value=='Search') { this.value=''; }")); // empty creates blank option.
		?>
		</td>
		
		
<td>

</td>
		<td>

		<?php 
		echo $this->Form->select('in',array("media"=>__('Media',true),"articles"=>__('Articles',true),"users"=>__('Users',true)),null,array('div' => false,'empty' => false,'label'=>false,"class"=>"styledselect")); // empty creates blank option.
		?> 

		</td>

		<td>
        		<?php echo $form->submit('admin/shared/top_search_btn.gif');?>
		

		</td>

		</tr>

		</table>


		<?php echo $this->Form->end();?>

	</div>

 	<!--  end top-search -->

 	<div class="clear"></div>



</div>

<!-- End: page-top -->



</div>

<!-- End: page-top-outer -->

	

<div class="clear">&nbsp;</div>

<?php echo $this->element("shared/admin_menus"); ?>

 

<!-- start content-outer ........................................................................................................................START -->

<div id="content-outer">

<!-- start content -->

<div id="content">
    
	
	<?php echo $content_for_layout; ?>


	<!--  start page-heading -->

	

	<div class="clear">&nbsp;</div>



</div>

<!--  end content -->

<div class="clear">&nbsp;</div>

</div>

<!--  end content-outer........................................................END -->



<div class="clear">&nbsp;</div>

    

<!-- start footer -->         

<div id="footer">

	<!--  start footer-left -->

	<div id="footer-left">

	

	Admin Skin &copy; Copyright Internet Dreams Ltd. <span id="spanYear"></span> <a href="">www.netdreams.co.uk</a>. All rights reserved.</div>

	<!--  end footer-left -->

	<div class="clear">&nbsp;</div>

</div>

<!-- end footer -->

 

</body>

</html>