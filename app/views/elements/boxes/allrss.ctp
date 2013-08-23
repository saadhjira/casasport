<div class="container">
	<div style="float: left; margin-right: 8px;" class="column"><?php echo $this->element("/boxes/group_column_left") ;?>
	<div id="tabs"
		class="ui-tabs ui-widget ui-widget-content ui-corner-all ui-corner-marg ">
	<div><?php 
	$result=$box->get("facebooklikebox");
	echo $box->executeQuery($result);
	?></div>
	</div>
	</div>
	<div class="content">
	<h2>خدمة RSS</h2>
	<p>هي خدمة جديدة تمكنك من الحصول على اخر الأخبار فور ورودها على الموقع
	التي قمت بالإشتراك بها في الخدمة. فبدلا من تصفح المواقع و البحث عن
	المواضيع الجديدة، فإن خدمة RSS تخطرك بما يستجد من أخبار ة مواضيع على تلك
	المواقع فور نشرها. و تشتمل الأخبار المتلقاة بهذه الطريقة في أبسط صورها
	على عنوان الخبر، و مختصر لنص الخبر، و وصلة أو رابط للنص الكامل على موقع
	منتج الخبر.</p>
	<table width="100%">
		<tbody>
			<tr>
				<td width="50%" style="vertical-align: top;">
				<h4>RSS حسب الفئة</h4>
				<table class="rsslist" style="margin-right: 14px;">
				<?php foreach ($results as $result) :?>
					<tr>
						<td><?php   
						echo $this->Html->link($this->Html->image('rss.png'),
						array('controller' => 'articles', 'action' => 'flux','par'=>$result['Category']['id'],'ext'=>'rss'),
						array('escape' => false));
						?></td>
						<td>
						<div class='' style="padding-right: 7px;"><?php echo $this->Html->link($result['Category']['title'],array('controller' => 'articles', 'action' => 'flux','par'=>$result['Category']['id'],'ext'=>'rss'));?>
						</div>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
				</td>
				<td width="50%" style="vertical-align: top;">
					<h4>RSS عام</h4>
					<table class="rsslist" style="margin-right: 14px;">
						<tr>
							<td><?php   
							echo $this->Html->link($this->Html->image('rss.png'),
							array('controller' => 'articles', 'action' => 'flux','par'=>"general",'ext'=>'rss'),
							array('escape' => false));
							?></td>
							<td>
							<div class='' style="padding-right: 7px;"><?php echo $this->Html->link("RSS جميع الفئات ",array('controller' => 'articles', 'action' => 'flux','par'=>"general",'ext'=>'rss'));?>
							</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<h3>ما هي خدمة RSS؟</h3>
	<p>خدمة RSS هي خدمة تمكنك من الحصول على آخر الأخبار فور ورودها على
	المواقع التي قمت بالإشتراك بها في هذه الخدمة. فبدلاً من تصفح المواقع
	والبحث عن المواضيع الجديدة، تخطرك خدمة RSS بما يستجد من أخبار ومواضيع
	على تلك المواقع فور نشرها، وبالتالي تتيح لمنتجي الأخبار ايصال أخبارهم
	مباشرة الى المتلقى دون الحاجة إلى زيارة مواقعهم. وتشتمل الأخبار المتلقاة
	بهذه الطريقة فى أبسط صورها على عنوان الخبر، ومختصر لنص الخبر، ووصلة أو
	رابط للنص الكامل للخبر على موقع منتج الخبر.</p>
	<h3>كيف يمكنني الاستفادة من خدمة RSS؟</h3>
	<p>يمكنك الاستفادة من خدمة RSS بعدة طرق سنذكر أهمها: أن يكون متصفح
	الإنترنت الذي تستخدمه يدعم تقنية RSS كمتصفح Mozilla Firefox والذي يمكنك
	تحميله مجاناً من موقع Mozilla، أو متصفح Opera، أو الإصدار الجديد 7.0 من
	متصفح ميكروسوفت إنترنت إكسبلورر، أو متصفح Netscape Navigator 9.0، أو
	متصفح Maxthon Internet Browser، أو متصفح Acoo Browser 1.71. الطريقة
	الأخرى هي الحصول على نسخة مما يسمى ببرنامج قارىء الأخبار (News Reader)
	والذي بإمكانه قراءة وعرض الأخبار الواردة عن طريق خدمة RSS من المواقع
	التي قمت باختيارها.</p>
	</div>
</div>