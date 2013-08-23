<tr>

			<th valign="top"><?php __('RealName')?>:</th>

			<td>
				<?php
				
		        echo $this->Form->input('realname',array("label"=>false,"error"=>false));
				?>
				
			</td>

			<td>
				<?php if($error=$this->Form->error('realname','This field cannot be left blank')):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>

		</tr>
		<?php 
			if($_SESSION["User"]["role"] == 'Administrateur'){
		 ?>
		<tr>
		<th valign="top"> <?php __('Disabled')?>:</th>

			<td  width="10">
				 <?php echo $this->Form->input("disabled" , array('label'=>false,'type' => 'checkbox')); ?>
				
			</td>

			<td></td>
		</tr>
		<?php 
			}
		 ?>
		<tr>

			<th valign="top"> <?php __('Username')?>:</th>

			<td>
				<?php
				
		        echo $this->Form->input('username',array("label"=>false,"error"=>false));
				?>
				
			</td>

			<td>
				<?php if($error=$this->Form->error('username','alphaNumeric required')):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>

		</tr>
		<tr>
			<th valign="top"> <?php __('Email')?>:</th>
			<td>
				<?php
				
		        echo $this->Form->input('email',array("label"=>false,"error"=>false));
				?>
				
			</td>

			<td>
				<?php if($error=$this->Form->error('email','Please provide valid email address.')):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>

		</tr>
		<?php 
			if($_SESSION["User"]["role"] == 'Administrateur'){
		 ?>
		<tr>
			<th valign="top"> <?php __('Groups')?>:</th>
			<td>
				<?php
				   echo $this->Form->input('group_id',array('label'=>false,'empty'=>__('groupe',true)));
				?>
				
			</td>

			<td>
				
				
			</td>

		</tr>
		<?php 
			}
		 ?>
		<tr>
			<th valign="top"> <?php __('Langue')?>:</th>
			<td>
				<?php
				   echo $this->Form->input('lang',array('label'=>false,'empty'=>false,'options'=>array('eng'=>'en','arb'=>'ar')));
				?>
				
			</td>

			<td>
				
				
			</td>

		</tr>
		<tr>

			<th valign="top"><?php __('Biography')?>:</th>

			<td>
				<?php echo $this->Form->input('biography',array("label"=>false,"error"=>false));?>
				
			</td>

			<td>
				
				
			</td>

		</tr>