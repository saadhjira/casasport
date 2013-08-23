<?php $articles = $box->executeQuery($result);?>

<?php foreach($articles as $item): ?>
	<li>
		<?php  echo $this -> Html -> link($this->Article->extractSlidePhoto($item), $this -> Article -> paramsUrl($item),array("escape"=>false) );?>
		<h3><?php echo $this->Html->link($item['Article']['title'],$this->Article->paramsUrl($item)); ?></h3>
		<span class="data-post"><?php  echo date("H:i",strtotime($item['Article']['dated_at'])-3600);?></span>
	</li>
<?php endforeach;?>

