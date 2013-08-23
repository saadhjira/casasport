<?php $article = $box -> executeQuery($result);?>

<div class="flexslider">
	<ul class="slides">
		<?php foreach($article as $item): ?>
		<li>
     		<?php  echo $this -> Html -> link($this->Article->extractSlidePhoto($item), $this -> Article -> paramsUrl($item),array("data-type"=>"image","escape"=>false) );?>
     		<div class="flex-caption">
     			<?php //debug($item['Article']['title']); ?>
                <h1><?php echo $this->Html->link($item['Article']['title'],$this->Article->paramsUrl($item)) ?></h1>
                <p><?php echo $this->Text->truncate(strip_tags($item['Article']['body']),140); ?></p>
            </div>
		</li>
		<?php endforeach;?>
  	</ul>
</div>

