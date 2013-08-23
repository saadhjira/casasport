<?php  $Articles = $box -> executeQuery($result);
//print_r($result); die();
?>

<div class="row-fluid last_news_ticker">
	<div class="span12">
		<ul id="js-news" class="js-hidden">
			<?php
			foreach ($Articles as $title) {
				//print_r($title);
				echo '<li class="news-item">' . $this -> Html -> link($title['Article']['title'], $this -> Article -> paramsUrl($title)) . '</i>';
			}
			?>
			<!-- <li class="news-item"><?php echo $this->Html->link($title['Article']['title'],$this->Article->paramsUrl($title)); ?></li> -->
		</ul>
	</div>
</div>