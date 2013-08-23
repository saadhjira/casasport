<div id="page-heading"><h1>
        	<?php echo $this->Html->link(__('List Boxes',true),array("controller"=>"Boxes","action"=>"admin_index"));?>
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
<?php echo $this->Form->create('Box' , array( 'type' => 'post' ));?>

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>

			<th valign="top"><?php __('Title') ;?>:</th>

			<td>
				<?php
				echo $this->Form->hidden('id');
		        echo $this->Form->input('title',array("label"=>false,"error"=>false));
				?>
				
			</td>

<td>
			
				<?php if($error=$this->Form->error( 'title',  __('Title is required',true))):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>

			<td></td>

		</tr>
		
		<tr>
            <th valign="top"><?php __('page_type') ;?>:</th>
            <td><?php echo $this->Form->input('page_type',array("options"=>array("menu"=>"Menu","article"=>"Article","rss_feed"=>"Rss feed"),"label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>

			<th valign="top"><?php __('fg_key') ;?>:</th>

			<td><?php echo $this->Form->input('fg_key',array("label"=>false,"error"=>false,"empty"=>false));?></td>
			 <td></td><td></td>

		</tr>
		<tr>

			<th valign="top"><?php __('Parent Boxes') ;?>:</th>
			<td><?php echo $this->Form->input('parent_id',array("label"=>false));?></td>
            <td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('select') ;?>:</th>
            <td><?php echo $this->Form->input('select',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('contain') ;?><br><i></>ex value:User,Category or false , or nothing:</i></th>
            <td><?php echo $this->Form->input('contain',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('from') ;?>:</th>
            <td><?php echo $this->Form->input('from',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		
		<tr>
            <th valign="top"><?php __('joins')  ;?><br><i>(ex:ArticlesCategory,ArticlesBox)</i>:</th>
            <td><?php echo $this->Form->input('joins',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		
		<tr>
            <th valign="top"><?php __('where') ;?>:</th>
            <td><?php echo $this->Form->input('where',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('orderBy') ;?>:</th>
            <td><?php echo $this->Form->input('orderBy',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('limit') ;?>:</th>
            <td><?php echo $this->Form->input('limit',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('label') ;?>:</th>
            <td><?php echo $this->Form->input('label',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('link') ;?>:</th>
            <td><?php echo $this->Form->input('link',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('auto') ;?>:</th>
            <td><?php echo $this->Form->input('auto',array("checked"=>true,"label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('isHtml') ;?>:</th>
            <td><?php echo $this->Form->input('isHtml',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('html') ;?>:</th>
            <td><?php echo $this->Form->input('html',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('partial_name') ;?>:</th>
            <td><?php echo $this->Form->input('partial_name',array(
			"options"=>array(
			"/boxes/featured_silde"=>"/boxes/featured_silde",
			"/boxes/hpage_cat"=>"/boxes/hpage_cat",
			"/boxes/latestnews"=>"/boxes/latestnews",
			"/boxes/hpage_group_cats"=>"/boxes/hpage_group_cats",
			"/boxes/hpage_latest"=>"/boxes/hpage_latest",
			"/boxes/pub_left"=>"/boxes/pub_left",
			"/boxes/group_column_left"=>"/boxes/group_column_left",
			"/boxes/most_read"=>"/boxes/most_read",
			"/boxes/blogroll_main"=>"/boxes/blogroll_main",
			"/boxes/blogroll_latest"=>"/boxes/blogroll_latest",
			"/boxes/most_read"=>"/boxes/most_read",
			"/boxes/most_commented"=>"/boxes/most_commented",
			"/boxes/home"=>"/boxes/home",
			"/boxes/morocco"=>"/boxes/morocco",
			"/boxes/maghreb"=>"/boxes/maghreb",
			"/boxes/middleeast"=>"/boxes/middleeast",
			"/boxes/worldnews"=>"/boxes/worldnews",
			"/boxes/business"=>"/boxes/business",
			"/boxes/sport"=>"/boxes/sport",
			"/boxes/artandculture"=>"/boxes/artandculture",
			"/boxes/lifeandstyle"=>"/boxes/lifeandstyle",
			"/boxes/society"=>"/boxes/society",
			"/boxes/most_media"=>"/boxes/most_media",
			"/boxes/media"=>"/boxes/media",
			"/boxes/playlist"=>"/boxes/playlist",
			"/boxes/agenda"=>"/boxes/agenda",
			"/boxes/sondage1300x405"=>"/boxes/sondage1300x405",
			"/boxes/sondage2300x405"=>"/boxes/sondage2300x405",
			"/boxes/poll"=>"/boxes/poll",
			"/boxes/media_playlist"=>"/boxes/media_playlist",
			"/boxes/gallery_playlist"=>"/boxes/gallery_playlist",
			"/boxes/home_milafat_footer"=>"/boxes/home_milafat_footer",
			"/boxes/alhayat_pdf"=>"/boxes/alhayat_pdf",
			"/boxes/newspapers_today"=>"/boxes/newspapers_today",
			
			),
			"label"=>false,
			"error"=>false));?></td>
			

		</tr>
		<!--
		<tr>
            <th valign="top"><?php __('cache_key') ;?>:</th>
            <td><?php echo $this->Form->input('cache_key',array(
			"label"=>false,
			"error"=>false));?></td>
			<td></td><td></td>

		</tr>
		-->
		<tr>
            <th valign="top"><?php __('cache_time') ;?>:</th>
            <td><?php echo $this->Form->input('cache_time',array(
			"label"=>false,
			"error"=>false));?></td>
			<td><?php echo $this->Form->input('cache_unittime',array(
			"options"=>array("seconds"=>"seconds","minutes"=>"minutes","hours"=>"hours","days"=>"days"),
			"empty"=>false,
			"label"=>false,
			"error"=>false));?></td><td></td>

		</tr>
		<tr>
            <th valign="top"><?php __('disabled') ;?>:</th>
            <td><?php echo $this->Form->input('disabled',array("label"=>false,"error"=>false));?></td>
			<td></td><td></td>

		</tr>
       
		
		
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<?php echo $this->Form->end(array('label' => 'Submit',"class"=>"form-submit"
			));?>
			
			
		</td>
		<td></td>
	</tr>
</table>