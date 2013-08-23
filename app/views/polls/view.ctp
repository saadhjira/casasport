<?php

// Here we determine if they've already answered this poll already.
$answered_polls = $this->Session->read('answered');
$is_answered = false;
if(!is_array($answered_polls))
{
    $answered_polls = array();
}
if(in_array($poll['Poll']['id'], $answered_polls))
{
    $is_answered = true;
}
?>
<?php
// Include JQuery to show and hide the results on clicking the "View results" link. By specifying 'inline' to be false, CakePHP will know to include it within the <head> tags, and immediately where you called it.
echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js', array('inline'=>false));
?>
<div class="polls view">
    <h2><?php echo $poll['Poll']['name'];?></h2>
    <p><strong><?php echo $poll['Poll']['question'];?></strong></p>
    <p>&nbsp;</p>
    
	<?php if (!empty($poll['Choice'])):?>
        <?php // If it hasn't been answered yet, and the poll has choices associated with it, show the answer form, containing the choice and poll IDs using hidden values and radio buttons ?>
        <?php if(!$is_answered): ?>
            <?php echo $this->Form->create('Answer', array('action'=>'add'));?>
            <?php echo $this->Form->hidden('poll_id', array('value'=>$poll['Poll']['id']));?>
                <table cellpadding = "0" cellspacing = "0">        
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
                    <?php echo $this->Form->submit('Submit', array('div'=>false));?>
                    &nbsp;
                    <?php echo $this->Html->link('View results', '#view_results', array('class'=>'trigger_results'));?>
                </div>
            <?php echo $this->Form->end();?>
        <?php endif;?>        
    <div id="results"<?php echo (!$is_answered?' style="display: none;"':'');?>>
        <h3>Results for poll, <?php echo $poll['Poll']['name'];?></h3>
        <?php foreach($poll['Choice'] as $choice):?>
        <p><span style="font-style: italic;"><?php echo $choice['name'];?></span> &raquo; <strong><?php echo $choice['answer_count'];?> votes</strong></p>        
        <?php endforeach;?>
    </div>
    
    <?php endif; ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('.trigger_results').click(function(){
        $('#results').fadeToggle(200);
        return false;
    });
});
</script>