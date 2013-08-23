<?php 
	
	$videos = $box->executeQuery($result);
 ?>
<div id="content">

			<!-- Page Title -->
			<div class="post-container">
				<div class="post-container page-title" style="margin-top: 0px;padding-bottom: 12px;margin-right: 6px;">
					مرئيات
				</div>
			<?php 
				$counter = 0;
			    if (!isset($this->params['url']['p']) || $this->params['url']['p'] == 1) { 	
			 ?>
			
				<p>
				  <span class="embed-youtube" style="text-align:center; display: block;">
				    <iframe class="youtube-player" 
				    type="text/html" 
				    width="590" 
				    height="320" 
				    src=<?php  echo $videos[0]['Media'][0]['video_path'];?> 
				    frameborder="0">
				    </iframe>
				  </span>
				</p>
			<?php } ?>
				<ul id="video-category">
					<?php foreach ($videos as $vid) : ?>
					<li class="post-item">
		  		        <?php 
				          echo $this->Html->link(
				               $this->Media->videoThumbGallery($vid["Media"][0]["video_path"],"mq"),
				               $this->Article->paramsUrl($vid),
				              array('escape'=>false)
				          );
				        ?>
					    <h3>
					    	<?php echo $this->Html->link($this->Text->truncate(strip_tags($vid['Article']['title']),67),$this->Article->paramsUrl($vid)); ?>
					    </h3>
		        	</li>
		        	<?php endforeach; ?>
				</ul>
			</div>
			<!-- Pagenation -->
			<div class="pagenation">
	<ul>
	<?php 
	
	if($this->params['url']['p']){
	$current=$this->params['url']['p']; 
	
	?>
			                                 <li><a href="?p=<?php echo intval($current)+1; ?> " style="font-family: 'Droid Arabic Naskh', serif;">  الصفحة التالية >> </a></li>

	<?php
	}else{ ?>
			                                 <li><a href="?p=2" style="font-family: 'Droid Arabic Naskh', serif;">الصفحة التالية >></a></li>

<?php	}
	
	?>

        <?php  for($i=10; $i>= 1; $i--): ?>
          
           	
        <?php
      
        if(!empty($this->params['menu'])){
        	$parammenu=$this->params['menu'];
        }else{
        	$parammenu=$this->params['lien'];
        }
		$item=array_merge((array)$i,(array)$parammenu);
		if(isset($this->params['url']['p'])){
		$current=$this->params['url']['p'];
		}
		
		
		
		?>
	
		<?php
if(isset($current)){
if($current==$i){
?>
		<li class="active"><a href='?p=<?php echo $i; ?>'> <?php echo $i; ?></a></li>

<?php
}else{
	?>	<li><a href='?p=<?php echo $i; ?>'  > <?php echo $i; ?></a></li>
<?php
}
}else{
if($i==1){
?>
		<li class="active"><a href='?p=<?php echo $i; ?>' > <?php echo $i; ?></a></li>

<?php
}else{
	?>	<li><a href='?p=<?php echo $i; ?>'  > <?php echo $i; ?></a></li>
<?php
}
}

		?>
		
     <?php endfor; ?>
	<?php 
	
	if($this->params['url']['p'] && $this->params['url']['p']>1 ){
	$current=$this->params['url']['p']; 
	
	?>
			                                 <li><a href="?p=<?php echo intval($current)-1; ?> " style="font-family: 'Droid Arabic Naskh', serif;"><< الصفحة السابقة </a></li>

	<?php
	}else{ ?>
			                                

<?php	}
	
	?>
</ul>
	 </div>
			<!-- End Pagenation -->

		</div>
		<?php echo $this->element("boxes/group_column_left")?>