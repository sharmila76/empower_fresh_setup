<?php
global $current_user, $mod_strings, $app_list_strings, $app_strings;

?>
<div class="moduleTitle">
 <h2><?php echo $mod_strings['LBL_MODULE_NAME']?>: <?php echo $mod_strings['LNK_SETTINGS']?></h2>
</div>
<div class="clear"></div>
<form method="POST" action="index.php">
<input type="hidden" name="module" value="Timesheet" />
<input type="hidden" name="action" value="SaveSettings" />

<?php
$admin = new Administration();
$admin->retrieveSettings('timesheet');

if (class_exists('SecurityGroup')) {
  $enable_security_groups = true;
  if (isset($admin->settings['timesheet_enable_security_groups'])) {
    $enable_security_groups = !empty($admin->settings['timesheet_enable_security_groups']);
  }
?>
<div id="SecurityGroups">
 <table class="edit view" width="100%" cellspacing="1" cellpadding="0" border="0">
  <tr>
   <td colspan="2"><h3 align="left"><?php echo $mod_strings['LBL_SECURITY_GROUPS']?></h3>
   <i><?php echo $mod_strings['LBL_SECURITY_GROUPS_DESC']?></i></td>
  </tr>
  <tr>
   <td width="20%"><input type="radio" name="enable_security_groups" value="1" id="enable_security_groups" <?php echo ($enable_security_groups ? 'checked' : '')?> />
   <label for="enable_security_groups"><?php echo $mod_strings['LBL_ENABLE_SECURITY_GROUPS']?></label></td>
   <td><input type="radio" name="enable_security_groups" value="0" id="disable_security_groups" <?php echo ($enable_security_groups ? '' : 'checked')?> />
   <label for="disable_security_groups"><?php echo $mod_strings['LBL_DISABLE_SECURITY_GROUPS']?></label></td>
  </tr>
 </table>
</div>
<?php
}
else {
?>
<div id="SecurityGroups">
 <table class="edit view" width="100%" cellspacing="1" cellpadding="0" border="0">
  <tr>
   <td><h3 align="left"><?php echo $mod_strings['LBL_SECURITY_GROUPS']?></h3></td>
  </tr>
  <tr>
   <td><?php echo $mod_strings['LBL_SECURITY_GROUPS_POSSIBILITY']?></td>
  </tr>
 </table>
</div>
<?php
}
if (class_exists('Team')) {
  $enable_teams = true;
  if (isset($admin->settings['timesheet_enable_teams'])) {
    $enable_teams = !empty($admin->settings['timesheet_enable_teams']);
  }
?>
<div id="Teams">
 <table class="edit view" width="100%" cellspacing="1" cellpadding="0" border="0">
  <tr>
   <td colspan="2"><h3 align="left"><?php echo $mod_strings['LBL_TEAMS']?></h3>
   <i><?php echo $mod_strings['LBL_TEAMS_DESC']?></i></td>
  </tr>
  <tr>
   <td width="20%"><input type="radio" name="enable_teams" value="1" id="enable_teams" <?php echo ($enable_teams ? 'checked' : '')?> />
   <label for="enable_teams"><?php echo $mod_strings['LBL_ENABLE_TEAMS']?></label></td>
   <td><input type="radio" name="enable_teams" value="0" id="disable_teams" <?php echo ($enable_teams ? '' : 'checked')?> />
   <label for="disable_teams"><?php echo $mod_strings['LBL_DISABLE_TEAMS']?></label></td>
  </tr>
 </table>
</div>
<?php
}
else {
?>
<div id="Teams">
 <table class="edit view" width="100%" cellspacing="1" cellpadding="0" border="0">
  <tr>
   <td><h3 align="left"><?php echo $mod_strings['LBL_TEAMS']?></h3></td>
  </tr>
  <tr>
   <td><?php echo $mod_strings['LBL_TEAMS_POSSIBILITY']?></td>
  </tr>
 </table>
</div>
<?php
}
?>
<div id="Status">
 <table class="edit view" width="100%" cellspacing="1" cellpadding="0" border="0">
  <tr>
   <td colspan="4"><h3 align="left"><?php echo $mod_strings['LBL_MATRIX_STATUS_FILTER']?></h3></td>
  </tr>
  <tr>
   <td width="20%"><?php echo $mod_strings['LBL_STATUS_FILTER_PROJECT']?></td>
   <td>
   <?php
   $status_list = $app_list_strings['project_status_dom'];
   $selected = $status_list;
   if (isset($admin->settings['timesheet_project_status'])) {
     $selected = unserialize(base64_decode($admin->settings['timesheet_project_status']));
     $selected = array_flip($selected);
   }
   foreach ($status_list as $k => $v) {
     echo '<input type="checkbox" name="project_status[]" value="'.$k.'" '.(isset($selected[$k])?'checked':'').' id="project_status_'.$k.'" />'
          . '&nbsp;<label for="project_status_'.$k.'">'.$v.'</label><br />';
   }
   ?>
   </td>
   <td width="20%"><?php echo $mod_strings['LBL_STATUS_FILTER_PROJECT_TASK']?></td>
   <td>
   <?php
   $status_list = $app_list_strings['project_task_status_options'];
   $selected = $status_list;
   if (isset($admin->settings['timesheet_project_task_status'])) {
     $selected = unserialize(base64_decode($admin->settings['timesheet_project_task_status']));
     $selected = array_flip($selected);
   }
   foreach ($status_list as $k => $v) {
     echo '<input type="checkbox" name="project_task_status[]" value="'.$k.'" '.(isset($selected[$k])?'checked':'').' id="project_task_status_'.$k.'" />'
          . '&nbsp;<label for="project_task_status_'.$k.'">'.$v.'</label><br />';
   }
   ?>
   </td>
  </tr>
  <tr>
   <td width="20%"><?php echo $mod_strings['LBL_STATUS_FILTER_CASES']?></td>
   <td colspan="3">
   <?php
   $status_list = $app_list_strings['case_status_dom'];
   $selected = $status_list;
   if (isset($admin->settings['timesheet_cases_status'])) {
     $selected = unserialize(base64_decode($admin->settings['timesheet_cases_status']));
     $selected = array_flip($selected);
   }
   foreach ($status_list as $k => $v) {
     echo '<input type="checkbox" name="cases_status[]" value="'.$k.'" '.(isset($selected[$k])?'checked':'').' id="cases_status_'.$k.'" />'
          . '&nbsp;<label for="cases_status_'.$k.'">'.$v.'</label><br />';
   }
   ?>
   </td>
  </tr>
 </table>
</div>

<input title="<?php echo $app_strings['LBL_SAVE_BUTTON_TITLE']?>" accessKey="<?php echo $app_strings['LBL_SAVE_BUTTON_KEY']?>" class="button primary" type="submit" name="button" value="<?php echo $app_strings['LBL_SAVE_BUTTON_LABEL']?>" />

</form>