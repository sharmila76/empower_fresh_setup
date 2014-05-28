<?php /* Smarty version 2.6.11, created on 2014-04-25 04:41:24
         compiled from modules/Eval_Evaluations/Addqa.html */ ?>
<form name="EditView" method="GET" action="index.php">
    <input type="hidden" name="module" value="Eval_Evaluations">
    <input type="hidden" name="action" value="Addqa">
    
    <table style="border:1px solid silver; padding:5px; margin-bottom:10px;">
        <tr>
            <td>
                <label>Select a subject</label>
            </td>
            <?php if ($this->_tpl_vars['SUBJECT_LIST']): ?>
            <td><select name='subject_name'>
                    <?php $_from = $this->_tpl_vars['SUBJECT_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
                    <option value="<?php echo $this->_tpl_vars['value']['subject_description']; ?>
"><?php echo $this->_tpl_vars['value']['subject_description']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
            <?php endif; ?>
        </tr>
        <tr>
            <td>
                <label>Question code</label>
            </td>
            <td>
                <input type="text" name="question_code" value="Auto" disabled>
            </td>
        </tr>
        <tr>
            <td>
                <label>Question type</label>
            </td>
            <td><select name='question_type'>
                    <option value="multiple_choice">Multiple choice</option>
                    <option value="single_choice">Single choice</option>
                    <option value="logical_questions">Logical questions</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label>Number of Answers</label>
            </td>
            <td>
                <input id="number_of_questions" type="text" name="number_of_answers">
            </td>        
        </tr>
        <tr>
            <td>
                <label>Question</label>
            </td>
            <td>
                <textarea name="question_name"cols="30" rows="4"></textarea>
            </td>        
        </tr>
    </table>           
    <table style="border:1px solid silver; padding:5px; margin-bottom:10px;">
        <tr>
            <th>SI</th>
            <th>Answers</th>		
            <th>Flag</th>
        </tr>
        <tr>
            <td>1</td>
            <td><input type="text" name="answer1"></td>		
            <td><input type="checkbox" name="correct1"></td>
        </tr>
        <tr>
            <td>2</td>
            <td><input type="text" name="answer2"></td>		
            <td><input type="checkbox" name="correct2"></td>
        </tr>
        <tr>
            <td>3</td>
            <td><input type="text" name="answer3"></td>		
            <td><input type="checkbox" name="correct3"></td>
        </tr>
        <tr>
            <td>4</td>
            <td><input type="text" name="answer4"></td>		
            <td><input type="checkbox" name="correct4"></td>
        </tr>
    </table>
    <input type="submit" value="Submit" name="submit_question">
</form>

