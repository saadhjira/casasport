<!-- Content -->
<div id="content">
    <?php 
    $Articles = $box->executeQuery($result);
    //print_r($Articles[0]); die();
    $counter = 0;
    if (!isset($this->params['url']['p']) || $this->params['url']['p'] == 1) { ?>

			<!-- Category Posts -->
	        <div class="post-container">
	        	<div class="left">
		        	<h2><a href="#"><?php echo $menuItem['Menu']['title']; //print_r($menuItem); die();?></a></h2>
		        	<div class="post-item">
						 
						<?php  echo $this -> Html -> link($this->Article->extractMedPhoto($Articles), $this -> Article -> paramsUrl($Articles[0]),array("escape"=>false) );?>
			        	<h3><?php  echo $this -> Html -> link($Articles[0]['Article']['title'], $this -> Article -> paramsUrl($Articles[0]));?></h3>
			        	<p><?php echo $this->Text->truncate(strip_tags($Articles[0]['Article']['body']),200); ?></p>
			        	<div class="post-item-footer">
			        		<a class="more-link" href="#">إقرأ المزيد</a>
			        	</div>
			        </div>
		        </div>

		        <div class="right">
		        	<ul>
		        		<?php for ($i=1; $i < 5 ; $i++) :?>   
				        		<li>
				        			<?php  echo $this -> Html -> link($this->Article->extractMedPhoto($Articles[$i]), $this -> Article -> paramsUrl($Articles[$i]),array("escape"=>false) );?>
				        			<h3><a href="#"><?php  echo $this -> Html -> link($Articles[$i]['Article']['title'], $this -> Article -> paramsUrl($Articles[$i]));?></a></h3>
				        			<span class="data-post">
				        				<?php $dateFromDb = date("Y/m/d", strtotime($Articles[$i]['Article']['dated_at']));
									  		 $timeFromDb = date("H:i", strtotime($Articles[$i]['Article']['dated_at']));
									  		 $dateConverted = (string)$dateFromDb;
									  		 $liba = new DateTime($dateConverted);
									  		 $jour = (string)$liba->format('N') . PHP_EOL;
									  		 $varia = $this->Miladi->convertDay($jour);
									  		 echo $varia." ".$this->Miladi->convertMiladi($dateFromDb,true);  ?>
									</span>
				        		</li>
						    <?php $counter++; endfor;?> 
		        	</ul>
		        </div>
	        </div>
	        <!-- End Category Posts -->
	
			<!-- Page Title -->
	<?php } else { ?>
			<div class="post-container page-title" style=" padding-bottom: 0px;padding-top: 12px;">
				<h2><?php  echo $this -> Html -> link($menuItem['Menu']['title'],'#' );?></h2>
			</div>
	<?php }// end if params['url']['p'] ?>
			<!-- End Page Title -->
			<?php for ($i=$counter+1; $i < sizeof($Articles); $i++) :?>
			<!-- One Post -->
			<div class="categories-container">
				<div class="categories-left">
					<a href="#" data-type="video"><img alt="" src="upload/post-1.jpg"></a>
					<h3><?php  echo $this -> Html -> link($Articles[$i]['Article']['title'], $this -> Article -> paramsUrl($Articles[$i]));?></h3>
			        <p><?php echo $this->Text->truncate(strip_tags($Articles[$i]['Article']['body']),300); ?></p><br/>
					
				</div>
			</div>
			<!-- End One Post -->
			<?php endfor; ?>
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

        <?php  for($i=9; $i>= 1; $i--): ?>
          
           	
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
        <!-- End Content -->

        <!-- Sidebar -->
        <div id="sidebar">
        	<?php echo $this->element("boxes/group_column_left")?>
        </div>
        <!-- End Sidebar -->

