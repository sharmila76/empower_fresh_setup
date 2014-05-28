<?php /* Smarty version 2.6.11, created on 2014-04-25 11:57:17
         compiled from modules/Eval_Evaluations/Assigntest.html */ ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript">
    <?php echo '
    function check() {
        var jsonobject = '; ?>
'<?php echo $this->_tpl_vars['json_array']; ?>
'<?php echo ';
        var parse_data = JSON.parse(jsonobject);
        var subject_name = document.getElementById("subject_name").value;
        document.getElementById("time_allocation").value = parse_data[subject_name];
    }
    '; ?>

</script>
<form name="EditView" method="GET" action="index.php">
    <input type="hidden" name="module" value="Eval_Evaluations">
    <input type="hidden" name="action" value="Questions">

    <table style="border:1px solid silver; padding:5px; margin-bottom:10px;">
        <tr>
            <td>
                <label>Name of the candidate</label>
            </td>
            <td>
                <input type="text" name="candidate_name" value=<?php echo $this->_tpl_vars['candidate_name']; ?>
>
            </td>
        </tr>
        <tr>
            <td>
                <label>Select Subject</label>
            </td>
            <?php if ($this->_tpl_vars['SUBJECT_LIST']): ?>
            <td><select id="subject_name" name="subject_name" onChange="check();">
                    <option>Select</option>
                    <?php $_from = $this->_tpl_vars['SUBJECT_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
                    <option id="subject_name" value="<?php echo $this->_tpl_vars['value']['subject_description']; ?>
"><?php echo $this->_tpl_vars['value']['subject_description']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
            <?php endif; ?>
        </tr>
        <tr>
            <td>
                <label>Number of Questions</label>
            </td>
            <td>
                <input id="number_of_questions" type="text" name="number_of_questions" value=<?php echo $this->_tpl_vars['questions']; ?>
>
            </td>        
        </tr>
        <td>
            <label>Time Allocated</label> 
        </td>
        <td>
            <input id="time_allocation" type="text" name="allocation_time" disabled>Minutes
        </td>
    </table>
    <input type="submit" value="Start" name="start_test">
</form>



