




<div id="page-heading"><h1>
        	<?php echo $this->Html->link(__('List media',true),array("controller"=>"media","action"=>"admin_index"));?>
		</h1></div>

<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>

	<th rowspan="3" class="sized">
		<?php echo $this->Html->image('admin/shared/side_shadowleft.jpg', array('alt' => '','width'=>20,'height'=>300))?>
	</th>

	<th class="topleft"></th>

	<td id="tbl-border-top">&nbsp;</td>

	<th class="topright"></th>

	<th rowspan="3" class="sized">
		<?php echo $this->Html->image('admin/shared/side_shadowright.jpg', array('alt' => '','width'=>20,'height'=>300))?>
	</th>

</tr>

<tr>

	<td id="tbl-border-left"></td>

	<td>

	<!--  start content-table-inner -->

	<div id="content-table-inner">

	

	<table border="0" width="100%" cellpadding="0" cellspacing="0">

	<tr valign="top">

	<td>

	
<!-- start id-form -->
<?php echo $this->Form->create('Media', array('type' => 'file')); ?>


		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>

			<th valign="top"><?php __('Title') ;?>:</th>
			

			<td>
				<?php
				echo $this->Form->hidden('id');
				echo $this->Form->input('title',array("label"=>false,'error' => false,'dir'=>"rtl"));
		       
				?>
				
			</td>
	<td>
			
				<?php if($error=$this->Form->error( 'title',  __('Title is required',true))):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>
			

		</tr>
		
		
		
		
       <tr>

			<th valign="top"><?php __('Caption') ;?>:</th>
			

			<td>
				<?php
				
				echo $this->Form->input('caption',array("label"=>false,'error' => false,'dir'=>"rtl"));
		       
				?>
				
			</td>
	<td>
			
				
				
			</td>
			

		</tr>
	
		<tr>

			<th valign="top"><?php __('upload') ;?>:</th>

			<td>
				
				<?php echo $this->Form->input('media' , array('label'=>false,'type' => 'file')); ?>
			</td>

			<td>
				
            </td>

		</tr>
		<tr>

		<th valign="top"><?php __('Picture');?>:</th>

			<td>
			<?php 	if($this->data['Media']['media_content_type']=="video"){
					
			 echo $this->Media->videoThumb($this->data["Media"]["video_path"]);	
			 echo $this->Form->input('video_path' , array("label"=>false,'error' => false,'size'=>'50')); 
				
			}else{
				 echo $this->Html->image('/attachments/photos/small/' .$this->data['Media']['media_file_path'] ); 	
				
			}
			
			
			
			?>
				
			</td>

			<td>
				
            </td>

		</tr>
	
		</tr>
		
		
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			
			
			
				<?php echo $this->Form->end(array('label' => 'Submit',"class"=>"form-submit"));?>
			
		</td>
		<td></td>
	</tr>
	
</table>