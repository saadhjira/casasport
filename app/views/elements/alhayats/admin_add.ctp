<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><?php 
		echo $this->Html->image('admin/shared/side_shadowleft.jpg', array('alt' => '','width'=>20,'height'=>300))
		?></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><?php echo $this->Html->image('admin/shared/side_shadowright.jpg', array('alt' => '','width'=>20,'height'=>300))
		?></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td><!--  start content-table-inner -->
		<div id="content-table-inner">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr valign="top">
					<td><!-- start id-form --><?php  echo $this -> Form -> create('Alhayat', array('type' => 'file'));?>

					<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
						<tr>
							<th valign="top">Page:</th>
							<td><?php
							echo $this -> Form -> hidden('Category.id');
							echo $this -> Form -> input('Category.page', array("label" => false, 'error' => false, 'size' => '50', 'dir' => "rtl"));
							?></td>
						</tr>
						
						<tr>
							<th valign="top">Titre:</th>
							<td><?php
							echo $this -> Form -> input('Category.title', array("label" => false, 'error' => false, 'size' => '50', 'dir' => "rtl"));
							?></td>
						</tr>
						
						<tr>
							<th valign="top">PDF:</th>
							<td><?php
							echo $this -> Form -> input('Category.PDF', array('type' => 'file',"label" => false, 'error' => false, 'size' => '50', 'dir' => "rtl"));
							?></td>
						</tr>
						
						<tr>
							<th valign="top">IDML:</th>
							<td><?php
							echo $this -> Form -> input('Category.IDML', array('type' => 'file',"label" => false, 'error' => false, 'size' => '50', 'dir' => "rtl"));
							?></td>
						</tr>
						
						<tr>
							<th>&nbsp;</th>
							<td valign="top"><?php echo $this -> Form -> end(array('label' => 'Submit', "class" => "form-submit"));?></td>
							<td></td>
						</tr>
					</table>
