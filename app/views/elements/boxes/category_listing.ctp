<?php 

$resultcat = $box->get('category_listing'); 

	$results=$box->executeQuery($resultcat,$criteria);


		if(!empty($result['Box']['label'])){
			
			echo $result['Box']['label']; 
		}else{
			
			echo $catItem[0]['User']['realname']; 
			
		}

		//print_r($results); die();
?>

<?php 
foreach( $results as $result): ?>

<div class="art-img-text-right ">

<?php echo $this->Html->link($this->Article->extractMedPhoto($result,  array('title' => $result['Article']['title'],
	'width'=>'220px',
	'height'=>'132px',
	'class'=>'attachment-art-big-2col wp-post-image',
	'alt'=>'')),
$this->Article->paramsUrl($result),array('escape'=>false, 'rel'=>"bookmark"));
?>

 <div class="art-title">
    <?php 
    if(!empty($result['Category'][0]['title'])){
    echo $this->Html->link($result['Category'][0]['title'], $this->Article->paramsCatUrl($result['Category'][0]['permalink']),array('rel'=>'bookmark','style'=>'background-color:#e3c701;','class'=>'post-cat-box cat-'.$result['Category'][0]['id']));
    }
      ?>

    <?php echo $this->Html->link($result['Article']['title'],$this->Article->paramsUrl($result),array('class' => 'title-link', 'rel'=>'bookmark')); ?>
 </div>
 <div class="art-meta">
    		<?php
		  		 $dateFromDb = date("Y/m/d", strtotime($result['Article']['dated_at']));
		  		 $timeFromDb = date("H:i", strtotime($result['Article']['dated_at']));
		  		 $dateConverted = (string)$dateFromDb;
		  		 $liba = new DateTime($dateConverted);
		  		 $jour = (string)$liba->format('N') . PHP_EOL;
		  		 $varia = $this->Miladi->convertDay($jour);
		  		 echo $varia." ".$this->Miladi->convertMiladi($dateFromDb,true)."م ";
	       ?>
    <span class="author">
    <?php //echo $this->Html->link('<i class="icon-user"></i>'.$result['User']['realname'],$this->Article->paramsUserUrl($result,165),array('escape'=>false)); ?>
    </span>
 </div>
 <div class="art-excerpt"><?php echo  $this->Text->truncate(strip_tags($result['Article']['body']),130)  ; ?> </div>
</div>

<div class="clearfix"></div>
<?php $i++; ?>
<?php if ($i != sizeof($results)) {
	echo "<hr>";
}else{
	echo "<br>";
}
?>

<?php endforeach; ?>


                              <div class="loop-pagination clearfix">
	<p>
	<?php 
	
	if($this->params['url']['p']){
	$current=$this->params['url']['p']; 
	
	?>
		<a href="?p=<?php echo intval($current)+1; ?> " style="font-family: 'Droid Arabic Naskh', serif;"> الصفحة التالية >></a>

	<?php
	}else{ ?>
		<a href="?p=2" style="font-family: 'Droid Arabic Naskh', serif;"> الصفحة التالية >> </a>

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
		<a href='?p=<?php echo $i; ?>' class="current" > <?php echo $i; ?></a>

<?php
}else{
	?>	<a href='?p=<?php echo $i; ?>'  > <?php echo $i; ?></a>
<?php
}
}else{
if($i==1){
?>
		<a href='?p=<?php echo $i; ?>' class="current" > <?php echo $i; ?></a>

<?php
}else{
	?>	<a href='?p=<?php echo $i; ?>'  > <?php echo $i; ?></a>
<?php
}
}

		?>
		
     <?php endfor; ?>
	<?php 
	
	if($this->params['url']['p'] && $this->params['url']['p']>1 ){
	$current=$this->params['url']['p']; 
	
	?>
		 <a href="?p=<?php echo intval($current)-1; ?> " style="font-family: 'Droid Arabic Naskh', serif;"><<الصفحة السابقة  </a>

	<?php
	}else{ ?>
			                                

<?php	}
	
	?>
</p>
	 </div>



                              

			