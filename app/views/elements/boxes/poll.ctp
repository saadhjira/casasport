<?php
$rq=$box->executeQuery($result);
$poll=$rq[0];

// Here we determine if they've already answered this poll already.
$answered_polls = $this->Session->read('answered');
$is_answered = false;
if(!is_array($answered_polls))
{
    $answered_polls = array();
}
if(in_array($poll['poll']['id'], $answered_polls)){
    	$is_answered = true;
	}
?>

<?php
// Include JQuery to show and hide the results on clicking the "View results" link. By specifying 'inline' to be false, CakePHP will know to include it within the <head> tags, and immediately where you called it.
echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js', array('inline'=>false));
?>
<div class="polls_view">
    <h2><?php echo $poll['poll']['name'];?></h2>
    <p><strong><?php echo $poll['poll']['question'];?></strong></p><br/>
    
	<?php if (!empty($poll['Choice'])):?>
        <?php // If it hasn't been answered yet, and the poll has choices associated with it, show the answer form, containing the choice and poll IDs using hidden values and radio buttons ?>
        <?php if(!$is_answered): ?>
            <?php echo $this->Form->create('Answer', array('action'=>'add'));?>
            <?php echo $this->Form->hidden('poll_id', array('value'=>$poll['poll']['id']));?>
                <table cellpadding = "0" cellspacing = "0" class="table_poll">        
                <?php
                    $i = 0;
                    foreach ($poll['Choice'] as $choice):
                        $class = null;
                        if ($i++ % 2 == 0) {
                            $class = ' class="altrow"';
                        }
                    ?>
                    <tr<?php echo $class;?>>
                        <td><?php echo $this->Form->radio('choice_id', array($choice['id']=>$choice['name']), array('hiddenField'=>false, 'legend'=>false));?></td>                
                    </tr>
                <?php endforeach; ?>
                </table>
                <div class="submit">
                    <?php echo $this->Form->submit('تصويت', array('div'=>false));?>
                    &nbsp;
                    <?php //echo $this->Html->link('شاهد النتيجة', '#', array('class'=>'trigger_results pollresult'));?>
                </div>
            <?php echo $this->Form->end();?>
        <?php endif;?>        
	
    <div id="results"<?php echo (!$is_answered?'style="  margin-top: 10px; " ':'');?>>
        <h2>نتائج إستفتاء <?php echo $poll['poll']['name'];?></h2>
        <?php 
	        $totale = null;
        	foreach($poll['Choice'] as $choice):
        	$totale = $totale + $choice['answer_count'];
        	endforeach;
        ?>
        <?php 
		$colors = array('#5D2A75;','#A31140','#4B80B6','#A8A8A8','#73337D','#99FF00','#F90','#CC99FF','#5D2A75;','#A31140','#4B80B6','#A8A8A8','#73337D','#99FF00','#F90','#CC99FF');
        $i = 0;
        foreach($poll['Choice'] as $choice):?>
        <p>
        <?php $res = ($choice['answer_count']*100)/$totale;?>
        <span><?php echo $choice['name'] ;?><br/></span>
        </p>        
        <div style="width:<?php echo $res;?>%; height: 12px; background:<?php echo $colors[$i]; $i=$i+1;?>;"></div>
        <div class="sous_result"><?php echo substr($res, 0, 5)."% | ".$choice['answer_count']." صوت ";?></div>
        <?php endforeach;?>
    </div>
    
    <?php endif; ?>
</div>