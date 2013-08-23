<?php 
	//print_r($menus);
?>
<div id="main-menu-left-nav">
	<a href="#">left</a>
</div>

<div id="main-menu-right-nav">
	<a href="#">right</a>
</div>
<!-- Search Form 
<form action="http://www.examples.com/" method="get">
       	<div id="search-bar">
         	<input type="text" name="s" placeholder="Search" value="Search">
          	<input type="submit" value="">
      	</div>
     	</form>
     	<!-- End Search Form -->
<div id="sf-menu-container" >
	<ul class="sf-menu">
		
		<?php foreach($menus as $k=>$fv): ?>
			<li <?php echo "class =".(isset($this->params['menu']) ? ($this->params['menu']==$fv["Menu"]["permalink"] ? "current" :"") :'') ?>>
				<?php
					echo $this->Html->link($fv["Menu"]["title"], array('controller' => 'pages', 'action' => 'show', 'menu' =>$fv['Menu']['permalink'], 'ext' => 'html'));
				?>
				<!-- <ul class="sub-menu">
					<li><a href="#">Bussines</a></li>
					<li><a href="#">News</a></li>
					<li><a href="#">Science</a></li>
					<li><a href="#">Health</a></li>
					<li><a href="#">Technology</a></li>
					<li><a href="#">Travel</a></li>
					<li><a href="#">Gamming</a></li>
				</ul>-->
			</li>
		<?php endforeach; ?>
	</ul>
</div>