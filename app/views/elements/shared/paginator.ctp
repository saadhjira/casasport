<!--  start paging..................................................... -->
<?php $paginator->options(array('url' => $this->passedArgs)); ?>
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">

			<tr>

			<td>

				<!--<a href="" class="page-far-left"></a>-->

				
                <?php echo $this->Paginator->prev('',  array('class' => 'page-left'), '', array('class' => 'page-left')); ?>
				<div id="page-info">
				<?php
				echo $this->Paginator->counter(array('format' =>'Page <b> %page% </b> of %pages%'));
			
			//echo $this->Paginator->numbers(); 
?>
</div>
				
                <?php echo $this->Paginator->next("", array('class' => 'page-right'), '', array('class' => 'page-right')); ?> 
				

				<!--<a href="" class="page-far-right"></a>-->

			</td>

			<td>
           <!--
			<select  class="styledselect_pages">

				<option value="">Number of rows</option>

				<option value="">1</option>

				<option value="">2</option>

				<option value="">3</option>

			</select>
            -->
			</td>

			</tr>

			</table>

			<!--  end paging................ -->