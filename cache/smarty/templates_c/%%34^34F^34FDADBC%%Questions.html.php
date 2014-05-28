<?php /* Smarty version 2.6.11, created on 2014-04-25 07:36:49
         compiled from modules/Eval_Evaluations/Questions.html */ ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="themes/iSales/js/jquery.countdownTimer.js"></script>
<script type="text/javascript">
    <?php echo '
    $(function() {
        $(\'#ms_timer\').countdowntimer({
        minutes: \'';  echo $this->_tpl_vars['time'];  echo '\',
                seconds: 00,
                size: "lg"
        });
                var minute = ';  echo $this->_tpl_vars['time'];  echo ' * 60000;
                setTimeout(function () { FadeDiv(); }, minute);
                function FadeDiv() {
                    var confirm_box = confirm(\'hai\');
                    if(confirm_box) {
                        $("#question_form").submit();
                    }
                }
                    });
                    
            '; ?>

</script>

<form id="question_form" method="GET" action="index.php">
    <input type="hidden" name="module" value="Eval_Evaluations">
    <input type="hidden" name="action" value="Questions">
    <?php if ($this->_tpl_vars['questions_list']): ?>
    <table style="border:0px; float: right;">
        <tr>
            <td style="width:60px;text-align:center;">Minutes</td>
            <td style="width:70px;text-align:center;">Seconds</td>
        </tr>
        <tr>
            <td colspan="4"><span id="ms_timer"></span></td>
        </tr>
    </table>
    
    <input type="hidden" name="candidate_name" value="<?php echo $this->_tpl_vars['candidate_name']; ?>
">
    <input type="hidden" name="subject_code" value="<?php echo $this->_tpl_vars['subject_code']; ?>
">
    
    <?php $_from = $this->_tpl_vars['questions_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
    <table>
        <tr>
        <input type="hidden" name="question[]" value="<?php echo $this->_tpl_vars['value']['question_code']; ?>
">
        <input type="hidden" name="correct_answer[]" value="<?php echo $this->_tpl_vars['value']['correct_answer']; ?>
">
        <td><?php echo $this->_tpl_vars['value']['question_name']; ?>
</td>
        </tr>
        <tr>
            <td><input name="<?php echo $this->_tpl_vars['value']['question_code']; ?>
[]" type="checkbox" value="<?php echo $this->_tpl_vars['value']['answer1']; ?>
"><?php echo $this->_tpl_vars['value']['answer1']; ?>
</td>
        </tr>   
        <tr>    
            <td><input name="<?php echo $this->_tpl_vars['value']['question_code']; ?>
[]" type="checkbox" value="<?php echo $this->_tpl_vars['value']['answer2']; ?>
"><?php echo $this->_tpl_vars['value']['answer2']; ?>
</td>
        </tr>
        <tr>
            <td><input name="<?php echo $this->_tpl_vars['value']['question_code']; ?>
[]" type="checkbox" value="<?php echo $this->_tpl_vars['value']['answer3']; ?>
"><?php echo $this->_tpl_vars['value']['answer3']; ?>
</td>
        </tr>
        <tr>
            <td><input name="<?php echo $this->_tpl_vars['value']['question_code']; ?>
[]" type="checkbox" value="<?php echo $this->_tpl_vars['value']['answer4']; ?>
"><?php echo $this->_tpl_vars['value']['answer4']; ?>
</td>
        </tr>
        <tr>
            <td>---</td>
        </tr>
    </table>
    <?php endforeach; endif; unset($_from); ?>
    <input type="submit" value="Submit Test" name="submit_test">
    <?php endif; ?>    
</form>