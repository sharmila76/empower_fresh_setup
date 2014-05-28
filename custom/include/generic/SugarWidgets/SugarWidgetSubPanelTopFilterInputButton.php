<?php
if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');

class SugarWidgetSubPanelTopFilterInputButton extends SugarWidgetSubPanelTopButton {

  function display(&$widget_data) {
    global $current_user, $timedate;
    $user_id = get_select_options_with_id(get_user_array(true), $user_id);
    ?>
    <form method='post'>
      <b>Select Employee : </b> <select name="user_id"><?= $user_id; ?></select>
      <b>From Date : </b><input name="from_date" id="date_start_field" size="11" maxlength="10" type="text" /> <img src="themes/default/images/jscalendar.gif" id="date_start_picker" align="absmiddle" />
      <b>End Date : </b><input name="end_date" id="date_end_field" size="11" maxlength="10" type="text" /> <img src="themes/default/images/jscalendar.gif"  id="date_end_picker" align="absmiddle" /> 
      <input type='submit' name='filter_data' value='Filter'>
    </form>
    <script type="text/javascript">
      Calendar.setup({
        inputField: "date_start_field", showsTime: false, button: "date_start_picker", singleClick: true, step: 1
      });
      Calendar.setup({
        inputField: "date_end_field", showsTime: false, button: "date_end_picker", singleClick: true, step: 1
      });
    </script>
    <?php
    if (isset($_POST['filter_data'])) {
      $assigned_user_id = "";
      if (!empty($_POST['user_id'])) {
        $assigned_user_id = "t.assigned_user_id = '" . $_POST['user_id'] . "' AND ";
      }
      $date_start_format = NULL;
      if (!empty($_POST['from_date'])) {
        $date_start_format = $_POST['from_date'];
      }

      $date_end_format = NULL;
      if (!empty($_POST['end_date'])) {
        $date_end_format = $_POST['end_date'];
      }

      $date_start = $timedate->to_db_date($date_start_format, false);
      $date_end = $timedate->to_db_date($date_end_format, false);

      $date_where = '';
      if (!empty($date_start) && !empty($date_end)) {
        $date_where .= "t.date_booked BETWEEN CAST('" . $date_start . "' AS DATE) AND CAST('" . $date_end . "' AS DATE)";
      } else if (!empty($date_start)) {
        $date_where .= "CAST('" . $date_start . "' AS DATE) BETWEEN CAST('" . $date_start . "' AS DATE) AND t.date_booked";
      } else if (!empty($date_end)) {
        $date_where .= "t.date_booked BETWEEN t.date_booked AND CAST ('" . $date_end . "' AS DATE)";
      }
      $q = "SELECT pt.name name, u.user_name,t.actual,pt.id, IFNULL(t.billable, 0) billable,pt.date_start,pt.date_finish,t.date_booked, u.id user_id, pt.project_id, t.parent_type,  t.parent_id,  t.description FROM timesheet t INNER JOIN project_task pt ON t.parent_id = pt.id LEFT JOIN users u ON t.assigned_user_id = u.id WHERE $assigned_user_id t.deleted = 0 AND t.parent_id IN (SELECT pt.id FROM project_task pt INNER JOIN project p ON pt.project_id = p.id WHERE p.id = '" . $_GET['record'] . "' AND pt.deleted = 0)";

      if ($date_where != '') {
        $q .= " AND ($date_where) ";
      }
      $q .= "ORDER BY DATE(pt.date_start) ASC";
      
      $res = $GLOBALS['db']->query($q);
      while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
        $entries[] = $row;
      }
      ?>
      <table width="100%" cellspacing="0" cellpadding="0" border="0" class="list view">
        <tbody>
          <tr role="presentation" class="pagination">
            <td align="right" colspan="20">
              <table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="left"><ul class="clickMenu fancymenu SugarActionMenu"><li class="single"><form id="formprojects_project_tasks" name="form" method="post" action="index.php">
                            <input type="hidden" value="ProjectTask" name="module">
                            <input type="hidden" value="<?php echo $_GET['record']; ?>" name="project_id">
                            <input type="hidden" value="EmpowerCSI-Internal Portal Activities" name="project_name">
                            <input type="hidden" value="EmpowerCSI-Internal Portal Activities" name="projects_project_tasks_name">
                            <input type="hidden" value="Project" name="return_module">
                            <input type="hidden" value="DetailView" name="return_action">
                            <input type="hidden" value="<?php echo $_GET['record']; ?>" name="return_id">
                            <input type="hidden" value="projects_project_tasks" name="return_relationship">
                            <input type="hidden" value="EmpowerCSI-Internal Portal Activities" name="return_name">
                            <input type="hidden" value="EditView" name="action">
                            <input type="hidden" value="Project" name="parent_type">
                            <input type="hidden" value="EmpowerCSI-Internal Portal Activities" name="parent_name">
                            <input type="hidden" value="<?php echo $_GET['record']; ?>" name="parent_id">
                            <input type="submit" value="Create" id="ProjectTask_create_button_old" name="ProjectTask_create_button" class="button" accesskey="" title="Create" style="display: none;">
                          </form></li></ul></td>
                  </tr></tbody></table>
            </td>
          </tr>
          <tr>
            <?php
            if (count($entries) > 0) {
              $actual_hrs = 0;
              $billable_hrs = 0;
              foreach ($entries as $entry) {
                $actual_hrs += $entry['actual'];
                $billable_hrs += $entry['billable'];
              }
            }
            ?>
            <?php
            $u_id = $_POST['user_id'];
            $sel_name = "SELECT u.user_name FROM users u WHERE u.id='$u_id'";
            $result = $GLOBALS['db']->query($sel_name);
            while ($u_name = $GLOBALS['db']->fetchByAssoc($result)) {
              $selected_user_name = $u_name['user_name'];
            }
            ?>
            <td>
              <?php
              echo 'User : ' . $selected_user_name;
              ?>
            </td>
            <td>
              <?php echo 'Total Actual Hrs :' . $actual_hrs; ?>
            </td>
            <td>
              <?php echo 'Total Billable Hrs :' . $billable_hrs; ?>
            </td>
          </tr>
          <tr height="20">
            <th width="40%" scope="col"><span style="white-space:normal;" sugar="slot0"><a href="javascript:void(0)" class="listViewThLinkS1">Name &nbsp;<img width="8" height="10" border="0" align="absmiddle" alt="Sort" src="themes/default/images/arrow.gif?v=e-hAUzW7QwvtVEs7Ps2Jkw"></a></span></th>

            <th width="10%" scope="col"><span style="white-space:normal;" sugar="slot1"><a href="javascript:void(0)" class="listViewThLinkS1">Assigned To &nbsp;<img width="8" height="10" border="0" align="absmiddle" alt="Sort" src="themes/default/images/arrow.gif?v=e-hAUzW7QwvtVEs7Ps2Jkw"></a></span></th>

            <th width="10%" scope="col"><span style="white-space:normal;" sugar="slot2"><a href="javascript:void(0)" class="listViewThLinkS1">Total Actual Effort (hrs) &nbsp;<img width="8" height="10" border="0" align="absmiddle" alt="Sort" src="themes/default/images/arrow.gif?v=e-hAUzW7QwvtVEs7Ps2Jkw"></a></span></th>

            <th width="10%" scope="col"><span style="white-space:normal;" sugar="slot3"><a href="javascript:void(0)" class="listViewThLinkS1">Total Billable Effort (hrs) &nbsp;<img width="8" height="10" border="0" align="absmiddle" alt="Sort" src="themes/default/images/arrow.gif?v=e-hAUzW7QwvtVEs7Ps2Jkw"></a></span></th>

            <th width="20%" scope="col"><span style="white-space:normal;" sugar="slot4"><a href="javascript:void(0)" class="listViewThLinkS1">Start Date: &nbsp;<img width="8" height="10" border="0" align="absmiddle" alt="Sort" src="themes/default/images/arrow.gif?v=e-hAUzW7QwvtVEs7Ps2Jkw"></a></span></th>

            <th width="20%" scope="col"><span style="white-space:normal;" sugar="slot5"><a href="javascript:void(0)" class="listViewThLinkS1">Finish Date: &nbsp;<img width="8" height="10" border="0" align="absmiddle" alt="Sort" src="themes/default/images/arrow.gif?v=e-hAUzW7QwvtVEs7Ps2Jkw"></a></span></th>
          </tr>
          <?php
          if (count($entries) > 0) {
            foreach ($entries as $entry) {
              ?><tr height="20" class="oddListRowS1">
                <td valign="top" class="" scope="row"><span sugar="slot29b"><a href="index.php?module=ProjectTask&amp;action=DetailView&amp;record=<?= $entry['id'] ?>"><?= $entry['name'] ?></a></span></td>

                <td valign="top" class="" scope="row"><span sugar="slot30b"><a href="index.php?module=Users&amp;action=DetailView&amp;record=<?= $entry['user_id'] ?>"><?= $entry['user_name'] ?></a></span></td>

                <td valign="top" class="" scope="row"><span sugar="slot31b">
                    <?= $entry['actual'] ?></span></td>

                <td valign="top" class="" scope="row"><span sugar="slot32b">
                    <?= $entry['billable'] ?></span></td>

                <td valign="top" class="" scope="row"><span sugar="slot33b">
                    <?= $entry['date_start'] ?></span></td>

                <td valign="top" class="" scope="row"><span sugar="slot34b">
                    <?= $entry['date_finish'] ?></span></td>
              </tr><?php
            }
          } else {
            ?><tr height="20" class="oddListRowS1">
              <td valign="top" class="" scope="row" colspan='6'>
                <span>NO RECORD FOUND</span></td>
            </tr><?php } ?>
        </tbody>
      </table>      
      <?php
    }
  }

}
