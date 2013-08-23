<div id="sidebar">
        	<ul>
        		<!-- Popular, Recent and Comments -->
        		
       			<li class="masonry">
					<div class="widget-container tabs-widget">	
						<ul class="tab-links">
							<li class="active"><a href="#popular-tab">أحدث الأخبار</a></li>
							<li><a href="#recent-tab">أكثر قراءة</a></li>
							<li><a href="#comments-tab">فيديوهات</a></li>
						</ul>	
						<div id="popular-tab">
							<ul>
								<?php $result=$box->get('home_latestnews') ?>
			      				<?php if(!empty($result)): ?>
			      					<?php echo $this->element($result['Box']['partial_name'],
			       						array(/*'cache' => array('key' => $result['Box']['cache_key'], 
			        					'time' => "{$result['Box']['cache_time']} {$result['Box']['cache_unittime']}"),*/"result"=>$result));  ?>
			       				<?php endif; ?>
							</ul>
						</div>
						<div id="recent-tab">
							<ul>
								<?php $result=$box->get('most_read') ?>
			      				<?php if(!empty($result)): ?>
			      					<?php echo $this->element($result['Box']['partial_name'],
			       						array(/*'cache' => array('key' => $result['Box']['cache_key'], 
			        					'time' => "{$result['Box']['cache_time']} {$result['Box']['cache_unittime']}"),*/"result"=>$result));  ?>
			       				<?php endif; ?>
							</ul>
						</div>
						<div id="comments-tab">
							<ul>
								<?php $result=$box->get('most_media') ?>
			      				<?php if(!empty($result)): ?>
			      					<?php echo $this->element("boxes/most_media",
			       						array(/*'cache' => array('key' => $result['Box']['cache_key'], 
			        					'time' => "{$result['Box']['cache_time']} {$result['Box']['cache_unittime']}"),*/"result"=>$result));  ?>
			       				<?php endif; ?>
							</ul>
						</div>
					</div>
				</li>
				<!-- Video Widget -->
        		<li class="masonry" style="z-index: 1;">
        			<h3 class="widget-title">إستطلاع الرأي </h3>
        			<div class="widget-container video-widget">
        				<?php $result=$box->get('poll') ;?>
				      	<?php if(!empty($result)): ?>
				      	<?php echo $this->element($result['Box']['partial_name'],
					        array("result"=>$result));  ?>
				       	<?php endif; ?>
        			</div>
        		</li>
        		<!-- End Video Widget -->

        		<!-- Advertisement widget -->
        		<li class="masonry">
        			<h3 class="widget-title">إشهار</h3>
        			<div class="widget-container ads-widget">
        				<a href="#"><?php echo $this->Html->image('frontend/upload/ads-small-0.jpg');?></a>
        				<a href="#"><?php echo $this->Html->image('frontend/upload/ads-small-1.jpg');?></a>
        				<a href="#"><?php echo $this->Html->image('frontend/upload/ads-small-2.jpg');?></a>
        				<a href="#"><?php echo $this->Html->image('frontend/upload/ads-small-3.jpg');?></a>
        			</div>
        		</li>
        		<!-- End Advertisement widget -->

        		<!-- Social Networks -->
        		<li class="masonry">
        			<h3 class="widget-title">شبكات التواصل الإجتماعي </h3>
        			<div class="widget-container social-widget">
        				<a href="#"><?php echo $this->Html->image('frontend/facebook.png');?></a>
        				<a href="#"><?php echo $this->Html->image('frontend/rss.png');?></a>
        				<a href="#"><?php echo $this->Html->image('frontend/youtube.png');?></a>
        				<a href="#"><?php echo $this->Html->image('frontend/twitter.png');?></a>
        				<a href="#"><?php echo $this->Html->image('frontend/flickr.png');?></a>
        			</div>
        		</li>
        		<!-- End Social Networks -->

        		<!-- Subscribe via email -->
        		<li class="masonry">
        			<h3 class="widget-title">صفحتنا في الفيسبوك</h3>
        			<div class="widget-container subscribe-widget">
        				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FMarocTumblr&amp;width=292&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:258px;" allowTransparency="true"></iframe>
        			</div>
        		</li>
        		<!-- End Subscribe via email -->
        	</ul>
        </div>