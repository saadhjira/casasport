

<!--  start nav-outer-repeat................................................................................................. START -->

<div class="nav-outer-repeat"> 

<!--  start nav-outer -->

<div class="nav-outer"> 



		<!-- start nav-right -->

		<div id="nav-right">

		

			<div class="nav-divider">&nbsp;</div>

				<div class="showhide-account">
					<?php echo $this->Html->image('admin/shared/nav/nav_myaccount.gif', array('alt' => '','width'=>93,'height'=>14)) ?>
				</div>
			
		
			
		
			
			
		


			<div class="nav-divider">&nbsp;</div>
            <?php 
				echo $this->Html->link($this->Html->image('admin/shared/nav/nav_logout.gif', 
				array('alt' => '','width'=>64,'height'=>14)),array("admin"=>false,"controller"=>"users","action"=>"logout"),array("id"=>"logout","escape"=>false)
				);

			  ?>
			  <div class="nav-divider">&nbsp;</div>
			
            
		
			<div class="clear">&nbsp;</div>

		
			<!--  start account-content -->	

			<div class="account-content">

			<div class="account-drop-inner">

	<?php  echo $this->Html->link("<b>".__('Settings',true)."</b>",array("controller"=>"users","action"=>"edit/".$this->Session->read("Auth.User.id")),array("escape"=>false,"id"=>"acc-settings")); ?>

			<!--	<div class="clear">&nbsp;</div>

				<div class="acc-line">&nbsp;</div>

				<a href="" id="acc-details">Personal details </a>

				<div class="clear">&nbsp;</div>

				<div class="acc-line">&nbsp;</div>

				<a href="" id="acc-project">Project details</a>

				<div class="clear">&nbsp;</div>

				<div class="acc-line">&nbsp;</div>

				<a href="" id="acc-inbox">Inbox</a>

				<div class="clear">&nbsp;</div>

				<div class="acc-line">&nbsp;</div> 

				<a href="" id="acc-stats">Statistics</a> -->

			</div>

			</div>

			<!--  end account-content -->

		

		</div>

		<!-- end nav-right -->





		<!--  start nav -->

		<div class="nav">

		<div class="table">

		

		<ul class="select"><li>
        <?php echo $this->Html->link("<b>Articles</b>",array("controller"=>"articles","action"=>"index"),array("escape"=>false)); ?>
		
		<div class="select_sub">

			<ul class="sub">

				<li>
					<?php echo $this->Html->link(__('Add article',true),array("controller"=>"articles","action"=>"add"),array("escape"=>false)); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('List articles',true),array("controller"=>"articles","action"=>"index"),array("escape"=>false)); ?>
					</li>
				</ul>
						</div>

		</li>

		</ul>

		

		<!-- <div class="nav-divider">&nbsp;</div>

		                    
		<ul class="select"><li>
		
		<?php echo $this->Html->link("<b>".__('Menus',true)."</b>",array("controller"=>"menus","action"=>"index"),array("escape"=>false)); ?>

		<div class="select_sub show">

			<ul class="sub">

				<li><?php echo $this->Html->link(__('Add menus',true),array("controller"=>"menus","action"=>"add"),array("escape"=>false)); ?></li>

				<li class="sub_show"><?php echo $this->Html->link(__('List menus',true),array("controller"=>"menus","action"=>"index"),array("escape"=>false)); ?></li>

			</ul>

		</div>


		</li>

		</ul>

		

		<div class="nav-divider">&nbsp;</div>

		

		<ul class="select"><li>
			<?php echo $this->Html->link("<b>".__('Categories',true)."</b>",array("controller"=>"categories","action"=>"index"),array("escape"=>false)); ?>

	<div class="select_sub">

			<ul class="sub">

				<li>
					<?php echo $this->Html->link(__('Add categories',true),array("controller"=>"categories","action"=>"add"),array("escape"=>false)); ?>
				
					</li>

				<li>
					<?php echo $this->Html->link(__('List categories',true),array("controller"=>"categories","action"=>"index"),array("escape"=>false)); ?>
				
					</li>

				</ul>

		</div>



		</li>

		</ul> -->
		
<!-- 		
<div class="nav-divider">&nbsp;</div>
		
<ul class="select"><li>
			<?php echo $this->Html->link("<b>".__('Media',true)."</b>",array("controller"=>"media","action"=>"index"),array("escape"=>false)); ?>

		<div class="select_sub">

			<ul class="sub">

				<li >
					<?php echo $this->Html->link(__('Add Media',true),array("controller"=>"media","action"=>"add"),array("escape"=>false)); ?>
				
					</li>

				<li >
					<?php echo $this->Html->link(__('List Media',true),array("controller"=>"media","action"=>"index"),array("escape"=>false)); ?>
				
					</li>

				</ul>

		

		</div>
		</li>

		</ul> -->
		<?php 
			if($_SESSION["User"]["role"] == 'Administrateur'){
		 ?>
		<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li>
			<?php echo $this->Html->link("<b>Users</b>",array("controller"=>"users","action"=>"index"),array("escape"=>false)); ?>

<div class="select_sub">

			<ul class="sub">

				<li>
					<?php echo $this->Html->link(__('Add users',true),array("controller"=>"users","action"=>"add"),array("escape"=>false)); ?>
				
					</li>

				<li>
					<?php echo $this->Html->link(__('List users',true),array("controller"=>"users","action"=>"index"),array("escape"=>false)); ?>
				
					</li>

				</ul>

		

		</div>
		</li>

		</ul>
		<?php 
			}
		 ?>
		<!-- <div class="nav-divider">&nbsp;</div>
		<ul class="select"><li>
        <?php //echo $this->Html->link("<b>Boxes</b>",array("controller"=>"Boxes","action"=>"index"),array("escape"=>false)); ?>
		
		<!--[if IE 7]><!--><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]-->

		<div class="select_sub">

			<ul class="sub">

				<li>
					<?php //echo $this->Html->link(__('Add Boxes',true),array("controller"=>"Boxes","action"=>"add"),array("escape"=>false)); ?>
				
					</li>

				<li>
					<?php// echo $this->Html->link(__('List Boxes',true),array("controller"=>"Boxes","action"=>"index"),array("escape"=>false)); ?>
				
					</li>

				</ul>

		</div>

		</li>

		</ul> 
<div class="nav-divider">&nbsp;</div>

<!-- <ul class="select"><li>
	<?php //echo $this->Html->link("<b>Comment</b>",array("controller"=>"Comments","action"=>"index"),array("escape"=>false)); ?>
<!--[if IE 7]><!--><!--<![endif]-->

		<!--[if lte IE 6]><table><tr><td><![endif]
	<div class="select_sub">

			<ul class="sub">
<!--
				<li>
					<?php echo $this->Html->link(__('Add Comment',true),array("controller"=>"categories","action"=>"add"),array("escape"=>false)); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('List Comments',true),array("controller"=>"categories","action"=>"index"),array("escape"=>false)); ?>
				
				</li> 
			</ul>
		</div>
		</li>
		</ul>
		<div class="nav-divider">&nbsp;</div> -->
<ul class="select">
	<li><?php echo $this->Html->link("<b>Polls</b>",array("controller"=>"Polls","action"=>"index"),array("escape"=>false)); ?>

	<!--[if IE 7]><!--><!--<![endif]--> <!--[if lte IE 6]><table><tr><td><![endif]-->

	<div class="select_sub">

	<ul class="sub">

		<li><?php echo $this->Html->link(__('Add Polls',true),array("controller"=>"Polls","action"=>"add"),array("escape"=>false)); ?>

		</li>

		<li><?php echo $this->Html->link(__('List Polls',true),array("controller"=>"Polls","action"=>"index"),array("escape"=>false)); ?>

		</li>

		<li><?php echo $this->Html->link(__('List Choices', true), array('controller' => 'choices', 'action' => 'index')); ?> 
		</li>

		<li><?php echo $this->Html->link(__('New Choice', true), array('controller' => 'choices', 'action' => 'add')); ?> </h1>
		</li>

	</ul>
		</li>
		</ul>
		
<div class="nav-divider">&nbsp;</div>

<!-- <ul class="select">
	<li>
		<?php echo $this->Html->link("<b>".__('Gallery',true)."</b>",array("controller"=>"Galleries","action"=>"index"),array("escape"=>false));
		?>
		<div class="select_sub">
			<ul class="sub">
				<li>
					<?php echo $this->Html->link(__('Add Galery',true),array("controller"=>"Galleries","action"=>"add"),array("escape"=>false));
					?>
				</li>
				<li>
					<?php echo $this->Html->link(__('List Galeries',true),array("controller"=>"Galleries","action"=>"index"),array("escape"=>false));
					?>
				</li>
			</ul>
		</div>
	</li>
</ul> 
		
<div class="nav-divider">&nbsp;</div>-->
		<?php 
			if($_SESSION["User"]["role"] == 'Administrateur'){
		 ?>
<ul class="select">
	<li>
		<?php echo $this->Html->link("<b>Editions</b>",array("controller"=>"Alhayats","action"=>"index"),array("escape"=>false));?>
	</li>
</ul>
<?php 
			}
		 ?>
		<div class="clear"></div>

		</div>

		<div class="clear"></div>

		</div>

		<!--  start nav -->



</div>

<div class="clear"></div>

<!--  start nav-outer -->

</div>

<!--  start nav-outer-repeat................................................... END -->


 <div class="clear"></div>