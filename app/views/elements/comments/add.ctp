   <div  id="formWrapper">
   
	 <h2>تعليقك على الموضوع</h2>
	 	<p class="textrule">
   		على الراغبين في التعليق أن يلتزموا في كتابة تعليقاتهم بآداب النقاش وأخلاقيات الحوار، وذلك بتجنب السب والقذف أو استعمال الكلمات النابية والخادشة للحياء أو الحاطة من الكرامة الإنسانية.
	</p>
	<?php echo $this->Form->create('Comment' , array("style"=>"width:300px;",'type' => 'post' ,'action'=>'add'));?>
       
          <p>
          	<label for="name"><small>الإسم</small></label>
           <!-- <input type="text" name="name" id="name" value="" size="22" /> -->
            <?php
				
		        echo $this->Form->input('nickname',array("label"=>false,"error"=>false));
				?>
				
				
          </p>
          <p>
          	<label for="email"><small>البريد الإلكتروني</small></label>
          
				<?php
				
		        echo $this->Form->input('email',array("label"=>false,"error"=>false,'dir'=>"ltr"));
				?>
				
          <p>
          	<?php
				echo $this->Form->input('body',array("label"=>false,'error' => false,'dir'=>"rtl"));
		        echo $this->Form->hidden('fg_key',array("value"=>$articleItem['Article']['id']));
			?>
				
         <!--   <textarea name="comment" id="comment" cols="50%" rows="10"></textarea> -->
            <label for="comment" style="display:none;"><small>التعليق</small></label>
          </p>
          <p>
         
           
           
        
          <?php echo $this->Form->end(array("id"=>"comment_submit",'label' => 'أرسل',"class"=>"form-submit"));?>
            
         </p>
</div>