<?php

function display() {
  global $mod_strings;
        $jsscript = <<<EOQ
        <script>
                addToValidate('EditView','phone_office','varchar',true,'{$mod_strings['LBL_PHONE_OFFICE']}');    // mark office phone field required
                $('#phone_office_label').html('{$mod_strings['LBL_PHONE_OFFICE']} <font color="red">*</font>'); // with red * sign next to label
        </script>
EOQ;
        parent::display();
        if(empty($this->bean->fetched_row['id'])) // This makes sure, current action is not "edit"
            echo $jsscript; //echo the script
    }
