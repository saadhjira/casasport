<?php echo $this->Html->script('tiny_mce/tiny_mce.js'); ?>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "exact",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
        directionality : "rtl",
        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,|,styleselect,formatselect,fontselect,fontsizeselect",
       	theme_advanced_buttons2 : "search,replace,|,undo,removeformat,redo,|,link,unlink,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
       	//theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
       theme_advanced_buttons3 : "visualaid,|,sub,sup,|,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      //  theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",
        elements:'ArticleBody',

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>

<div id="page-heading"><h1>
        	<?php echo $this->Html->link(__('liste des article',true),array("controller"=>"articles","action"=>"admin_index"));?>
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
<?php echo $this->Form->create('Article' , array( 'type' => 'file' ));?>

	
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">


		<tr>

			<th valign="top">Type d'article:</th>

			<td>
				<?php
					echo $this->Form->input(
			            'article_type',
			            array(
			            	"label"=>false,
			                'empty' => "Type d'article",
			                'type' => 'select',
			                'options' => array("Article Grand", "Article Moyen", "Photo", "Bref")
			            )
					);
				?>
			</td>

		</tr>
		
		<tr>

			<th valign="top">Sur Titre:</th>

			<td>
				<?php
		        echo $this->Form->input('surtitre',array("label"=>false,'error' => false,'size'=>'50','dir'=>"rtl"));
				?>
			</td>

		</tr>
		
		<tr>

			<th valign="top"><?php __('Title') ;?>:</th>

			<td>
				<?php
				echo $this->Form->hidden('id');
		        echo $this->Form->input('title',array("label"=>false,'error' => false,'size'=>'50','dir'=>"rtl"));
				?>
				
			</td>
			<td>
			
				<?php if($error=$this->Form->error( 'title', __('Title is required',true))):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>
			

		</tr>
		<tr>

			<th valign="top"><?php __('Sub Title') ;?>:</th>

			<td>
				<?php
		        echo $this->Form->input('head',array("label"=>false,'error' => false,'size'=>'50','dir'=>"rtl"));
				?>
				
			</td>
		</tr>
		<tr>

			<th valign="top"><?php __('meta first key') ;?>:</th>

			<td>
				<?php
		        echo $this->Form->input('meta_first_key',array("label"=>false,'error' => false,'size'=>'50','dir'=>"rtl"));
				?>
				
			</td>
		</tr>
		<?php if(empty($this -> data['Article']['slug'])) : ?>
		
		<tr>

			<th valign="top"><?php __('Slug') ;?>:</th>

			<td>
				<?php
				
					echo $this->Form->input('slug',array("label"=>false,'error' => false,'size'=>'50','dir'=>"rtl"));
		
		        
				?>
				
			</td>
			<td>
			
				<?php if($error=$this->Form->error('slug', __('Slug is required',true))):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>
		</tr>
			<?php endif; ?>
		<tr>

			<th valign="top"><?php __('published') ;?>:</th>

			<td  width="10">
				 <?php echo $this->Form->input("published" , array('label'=>false,'type' => 'checkbox')); ?>
				
			</td>

			<td></td>

		</tr>
		
		<tr>

			<th valign="top">publier journal :</th>

			<td  width="10">
				 <?php echo $this->Form->input("published_magazine" , array('label'=>false,'type' => 'checkbox')); ?>
				
			</td>

			<td></td>

		</tr>
		
		 
 <tr>

			<th valign="top"><?php __('Author') ;?>:</th>

			<td>


			 <?php 
			 
		
			  	
	echo	$this->Form->input('author_id',array('label'=>false));
			  
			 
			?>
			

			</td>

			<td>
            </td>

		</tr>
		  <tr>

			<th valign="top"><?php __('Date published') ;?>:</th>

			<td>


			 <?php 
			 
			 echo $this->Form->dateTime('dated_at','DMY',  null , array('maxYear'=>2020,'minYear'=>1900,"empty" => false)); 
			?>
			

			</td>

			<td>
            </td>

		</tr>
		
		
        <tr>

			<th valign="top"><?php __('Categories') ;?>:</th>

			<td>
				<?php echo $this->Form->input("Category",array("label"=>false,'size'=>'25'));
				 ?>
			</td>

			<td>
            </td>

		</tr>
		 <tr>

			<th valign="top"><?php __('Boxes') ;?>:</th>

			<td>
				<?php echo $this->Form->input("Box",array("label"=>false,'size'=>'25'));
				 ?>
			</td>

			<td>
            </td>

		</tr>
		<tr>

			<th valign="top"><?php __('Source') ;?>:</th>

			<td>
				<?php
				
		        echo $this->Form->input('source',array("label"=>false,'dir'=>"rtl"));
				?>
				
			</td>
	
			

		</tr>
		<tr>

			<th valign="top"><?php __('weight') ;?>:</th>

			<td>
				<?php
				
		        echo $this->Form->input('weight',array("label"=>false,'dir'=>"rtl"));
				?>
				
			</td>
	
			

		</tr>
		<tr>

			<th valign="top"><?php  __('description') ;?>:</th>

			<td>
				
				<?php
	echo $this->Form->input('short',array("label"=>false));
				 
				 ?>
			</td>

			<td>
            </td>

		</tr>
		<tr>

			<th valign="top"><?php __('Body') ;?>:</th>

			<td>
				
				<?php
				echo $this->Form->input('body',array("label"=>false,"cols"=>"50","rows"=>"20"));
				 
				 ?>
			</td>

			<td>
            </td>

		</tr>
		
		<tr>

			<th valign="top"><?php __('upload') ;?>:</th>

			<td>
				
				<?php echo $this->Form->input("Media.-1.media" , array('label'=>false,'type' => 'file')); ?>
			</td>

			<td>
				
            </td>

		</tr>
		<tr>

			<th valign="top"></th>

			

			<td>
				  
			   <?php 
					   $photos=Set::extract("Article/Media[media_content_type=/image/i]",$this->data);
					   
			   ?>
				<?php  if(!empty($photos)):?>
					
					
					<div style="width:400px;height:200px;overflow:auto;">
						
				<table>
					<?php //print_r($this->data['Media']) ?>
				<?php foreach($this->data['Media'] as $key=>$val): ?>
					
				<?php if(eregi("image",$val['media_content_type'])):?>
				<tr>
				<td valign="top" width="30">
				  <?php echo $this->Form->input("Media.remove.{$val["id"]}" , array('label'=>false,'hiddenField'=>false,'type' => 'checkbox','value'=>"{$val['media_file_path']}")); ?>
				</td>
					<td  width="95">
				       <?php   echo $this->Html->image('/attachments/photos/small/' .$val['media_file_path'] ); ?>
					</td>
					<td>
					  <?php $k=$key; echo $this->Form->input("Media.$k.caption" , array('label'=>false,'dir'=>"rtl")); 
					    echo $this->Form->hidden("Media.$k.id" , array('label'=>false)); 
					   echo $this->Form->hidden("Media.$k.media_file_path" , array('label'=>false)); ?>
					</td>
					</tr>
				<?php endif?>
				<?php endforeach; ?>
				
						
					</table>
					</div>
				<?php endif; ?>
             
            </td>

		</tr>
		
		 <tr>

			<th valign="top"><?php __('Vedio') ;?></th>
     
			<td>
            <table>
            	<?php $videos=Set::extract("Article/Media[media_content_type=video]",$this->data) ;
			if($videos){
						
						$idmedia=$videos[0]['Media']['id'];
						$video_path=$videos[0]['Media']['video_path'];
					}
			?>
            	<tr>
            		
            		<td><?php  if($videos && $video_path ){echo $this->Media->videoThumb($video_path);} ?></td>
            		<td ><?php  echo $this->Form->input('Media.-2.video_path' , array('value'=>!empty($video_path)?$video_path:"",'label'=>false,'size'=>'50'));
					
		
			
			echo $this->Form->hidden("Media.-2.id" , array('value'=>!empty($idmedia)?$idmedia:"",'label'=>false)); 
 			echo $this->Form->hidden("Media.-2.media_content_type" , array('label'=>false,"value"=>"video")); ?></td>
 			
            		
            	</tr>
            </table>
            
			
			</td>

			<td>
				
            </td>

		</tr>
		
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			
			<?php echo $this->Form->end(array('label' => 'Submit',"class"=>"form-submit"));?>
			
			
		</td>
		<td></td>
	</tr>
</table>