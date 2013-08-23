<?php 
	   echo $this->Html->link('',array("controller"=>$this->params['controller'],"action"=>"edit/$id"),
	   array("title"=>"edit","class"=>"icon-1 info-tooltip"));
?>
	   &nbsp;&nbsp;
<?php 
   
			
 	   echo $this->Html->link('',array("controller"=>$this->params['controller'],"action"=>"delete/$id"),
	   array("title"=>"delete","class"=>"icon-2 info-tooltip"), "Etes-vous sûr ?");
	   if(!empty($isTree) && is_bool($isTree)){
	   	echo $this->Html->link('',array("controller"=>$this->params['controller'],"action"=>"move_up/$id"),
	   array("title"=>"up","class"=>"icon-up info-tooltip"));
	   ?>
	   &nbsp;&nbsp;
	   <?php
	   echo $this->Html->link('',array("controller"=>$this->params['controller'],"action"=>"move_down/$id"),
	   array("title"=>"down","class"=>"icon-down info-tooltip"));
}?>
	 &nbsp;&nbsp;
