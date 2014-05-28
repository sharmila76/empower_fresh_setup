<?php
class TimesheetLogicHook {
  function before_save(&$bean, $event, $arguments) {
    // check whether it is TimesheetTimer object
    if ($bean->object_name == 'TimesheetTimer')
      return;

    $bean->name = $bean->parent_type . ": " . $bean->actual;
  }

  // called on after_ui_frame
  function closeOpenTimers($event, $arguments) {
  }

  function reminder($event, $arguments) {
  }
}
?>