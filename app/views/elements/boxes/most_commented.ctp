<?php foreach($box->executeQuery($result) as $result): ?>
	<li>
		<a href="#"><img alt="" src="upload/img-small.jpg"></a>
		<h3><?php echo $this->Html->link($this->Text->truncate(strip_tags($result['Article']['title']),60),$this->Article->paramsUrl($result)); ?></h3>
		<span class="data-post">March 25, 2012</span>
	</li>
<?php  endforeach; ?> 