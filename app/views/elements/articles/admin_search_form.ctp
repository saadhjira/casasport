<?php       
            $article=ClassRegistry::init('Article');
            $authors = $article -> User -> find('list');
			$categories = $article-> Category -> generatetreelist(null, "{n}.Category.id", "{n}.Category.title");
			$boxes = $article-> Box -> generatetreelist(null, "{n}.Box.id", "{n}.Box.title");
?>
<?php echo $this->Form->create('Article', array('type'=>'get', 'action' => 'search'));?>
<table border="0" cellpadding="0" cellspacing="0"  id="id-form" >
		<tr>
			<td width="20">
				
			</td>
			<td width="140">
				<?php  echo $this->Form->select('usid', $authors,empty($this->passedArgs['usid'])?"":$this->passedArgs['usid'],array('empty'=>__('Author',true)));?>
			</td>
				
			<td width="11">
				<?php //echo $this->Form->dateTime('dated','DMY', 'NONE', NULL , array('maxYear'=>1930,'minYear'=>date('Y', strtotime('now'))), true);?>
			</td>
			
			<td width="140">
				<?php  //echo $this->Form->select('categoris', $categri,empty($this->passedArgs['categoris'])?"":$this->passedArgs['categoris'],array('empty'=>__('Categories',true)));
					
					echo $this->Form->select('ctid',$categories,empty($this->passedArgs['ctid'])?"":$this->passedArgs['ctid'],array('empty'=>__('Categories',true)));
				?>
			</td>
			<td width="230">
				<?php  //echo $this->Form->select('categoris', $categri,empty($this->passedArgs['categoris'])?"":$this->passedArgs['categoris'],array('empty'=>__('Categories',true)));
					
					echo $this->Form->select('bxid',$boxes,empty($this->passedArgs['bxid'])?"":$this->passedArgs['bxid'],array('empty'=>__('Boxes',true)));
				?>
			</td>
			<td width="90">
				<?php echo $this->Form->checkbox('phd', array('label' => __('published'),'checked '=>empty($this->passedArgs['phd'])?false:true)); ?>
			</td>
			
			
			<td>
 				<?php echo $form->button(__('Search',true),array('type'=>'submit') );?>
			</td>

		</tr>
</table>	
<?php echo $this->Form->end();?>

