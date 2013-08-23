<tr>

			<th valign="top"><?php __('Password')?>:</th>

			<td>
				<?php echo $this->Form->input("pass_new",array("label"=>false,"type"=>"password","error"=>false,"value"=>""));
				 ?>
			</td>

			<td>
				<?php if($error=$this->Form->error( 'pass_new')):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
            </td>

		</tr>
		<tr>

			<th valign="top"><?php __('Confirm Password')?>:</th>

			<td>
				
				<?php
				echo $form->input('passwd_confirm', array("label"=>false,'error'=>false,'value'=>'','type'=>'password'));?>
			</td>

			<td>
				<?php if($error=$this->Form->error( 'passwd_confirm')):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
            </td>

</tr>