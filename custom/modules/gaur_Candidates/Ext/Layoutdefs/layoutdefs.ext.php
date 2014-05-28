<?php 
 //WARNING: The contents of this file are auto-generated

 
 //WARNING: The contents of this file are auto-generated


// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["activities"] = array (
  'order' => 10,
  'sort_order' => 'desc',
  'sort_by' => 'date_start',
  'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
  'type' => 'collection',
  'subpanel_name' => 'activities',
  'module' => 'Activities',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateTaskButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopScheduleMeetingButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopScheduleCallButton',
    ),
    3 => 
    array (
      'widget_class' => 'SubPanelTopComposeEmailButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);


// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["history"] = array (
  'order' => 20,
  'sort_order' => 'desc',
  'sort_by' => 'date_modified',
  'title_key' => 'LBL_HISTORY',
  'type' => 'collection',
  'subpanel_name' => 'history',
  'module' => 'History',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateNoteButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopArchiveEmailButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopSummaryButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);


// created: 2010-02-27 02:18:35
$layout_defs["gaur_Candidates"]["subpanel_setup"]["refer_references_gaur_candidates"] = array (
  'order' => 100,
  'module' => 'refer_References',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_REFER_REFERENCES_GAUR_CANDIDATES_FROM_REFER_REFERENCES_TITLE',
  'get_subpanel_data' => 'refer_references_gaur_candidates',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'refer_References',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-03-02 03:40:29
$layout_defs["gaur_Candidates"]["subpanel_setup"]["gaur_candidates_eval_evaluations"] = array (
  'order' => 100,
  'module' => 'Eval_Evaluations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GAUR_CANDIDATES_EVAL_EVALUATIONS_FROM_EVAL_EVALUATIONS_TITLE',
  'get_subpanel_data' => 'gaur_candidates_eval_evaluations',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'Eval_Evaluations',
      'mode' => 'MultiSelect',
    ),
  ),
);



// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["activities"] = array (
  'order' => 10,
  'sort_order' => 'desc',
  'sort_by' => 'date_start',
  'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
  'type' => 'collection',
  'subpanel_name' => 'activities',
  'module' => 'Activities',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateTaskButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopScheduleMeetingButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopScheduleCallButton',
    ),
    3 => 
    array (
      'widget_class' => 'SubPanelTopComposeEmailButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);


// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["history"] = array (
  'order' => 20,
  'sort_order' => 'desc',
  'sort_by' => 'date_modified',
  'title_key' => 'LBL_HISTORY',
  'type' => 'collection',
  'subpanel_name' => 'history',
  'module' => 'History',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateNoteButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopArchiveEmailButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopSummaryButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);


// created: 2010-02-27 02:18:35
$layout_defs["gaur_Candidates"]["subpanel_setup"]["refer_references_gaur_candidates"] = array (
  'order' => 100,
  'module' => 'refer_References',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_REFER_REFERENCES_GAUR_CANDIDATES_FROM_REFER_REFERENCES_TITLE',
  'get_subpanel_data' => 'refer_references_gaur_candidates',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'refer_References',
      'mode' => 'MultiSelect',
    ),
  ),
);



// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["activities"] = array (
  'order' => 10,
  'sort_order' => 'desc',
  'sort_by' => 'date_start',
  'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
  'type' => 'collection',
  'subpanel_name' => 'activities',
  'module' => 'Activities',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateTaskButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopScheduleMeetingButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopScheduleCallButton',
    ),
    3 => 
    array (
      'widget_class' => 'SubPanelTopComposeEmailButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);


// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["history"] = array (
  'order' => 20,
  'sort_order' => 'desc',
  'sort_by' => 'date_modified',
  'title_key' => 'LBL_HISTORY',
  'type' => 'collection',
  'subpanel_name' => 'history',
  'module' => 'History',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateNoteButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopArchiveEmailButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopSummaryButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);


// created: 2010-02-27 02:18:35
$layout_defs["gaur_Candidates"]["subpanel_setup"]["refer_references_gaur_candidates"] = array (
  'order' => 100,
  'module' => 'refer_References',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_REFER_REFERENCES_GAUR_CANDIDATES_FROM_REFER_REFERENCES_TITLE',
  'get_subpanel_data' => 'refer_references_gaur_candidates',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'refer_References',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-03-02 03:40:29
$layout_defs["gaur_Candidates"]["subpanel_setup"]["gaur_candidates_eval_evaluations"] = array (
  'order' => 100,
  'module' => 'Eval_Evaluations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GAUR_CANDIDATES_EVAL_EVALUATIONS_FROM_EVAL_EVALUATIONS_TITLE',
  'get_subpanel_data' => 'gaur_candidates_eval_evaluations',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'Eval_Evaluations',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-03-02 03:40:55
$layout_defs["gaur_Candidates"]["subpanel_setup"]["gaur_candidates_oss_job"] = array (
  'order' => 100,
  'module' => 'OSS_Job',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GAUR_CANDIDATES_OSS_JOB_FROM_OSS_JOB_TITLE',
  'get_subpanel_data' => 'gaur_candidates_oss_job',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'OSS_Job',
      'mode' => 'MultiSelect',
    ),
  ),
);



// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["activities"] = array (
  'order' => 10,
  'sort_order' => 'desc',
  'sort_by' => 'date_start',
  'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
  'type' => 'collection',
  'subpanel_name' => 'activities',
  'module' => 'Activities',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateTaskButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopScheduleMeetingButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopScheduleCallButton',
    ),
    3 => 
    array (
      'widget_class' => 'SubPanelTopComposeEmailButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);


// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["history"] = array (
  'order' => 20,
  'sort_order' => 'desc',
  'sort_by' => 'date_modified',
  'title_key' => 'LBL_HISTORY',
  'type' => 'collection',
  'subpanel_name' => 'history',
  'module' => 'History',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateNoteButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopArchiveEmailButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopSummaryButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);


// created: 2010-02-27 02:18:35
$layout_defs["gaur_Candidates"]["subpanel_setup"]["refer_references_gaur_candidates"] = array (
  'order' => 100,
  'module' => 'refer_References',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_REFER_REFERENCES_GAUR_CANDIDATES_FROM_REFER_REFERENCES_TITLE',
  'get_subpanel_data' => 'refer_references_gaur_candidates',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'refer_References',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-03-02 03:40:29
$layout_defs["gaur_Candidates"]["subpanel_setup"]["gaur_candidates_eval_evaluations"] = array (
  'order' => 100,
  'module' => 'Eval_Evaluations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GAUR_CANDIDATES_EVAL_EVALUATIONS_FROM_EVAL_EVALUATIONS_TITLE',
  'get_subpanel_data' => 'gaur_candidates_eval_evaluations',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'Eval_Evaluations',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-03-02 03:40:55
$layout_defs["gaur_Candidates"]["subpanel_setup"]["gaur_candidates_oss_job"] = array (
  'order' => 100,
  'module' => 'OSS_Job',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GAUR_CANDIDATES_OSS_JOB_FROM_OSS_JOB_TITLE',
  'get_subpanel_data' => 'gaur_candidates_oss_job',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'OSS_Job',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-03-02 04:11:10
$layout_defs["gaur_Candidates"]["subpanel_setup"]["gaur_candidates_refer_referrals"] = array (
  'order' => 100,
  'module' => 'Refer_Referrals',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GAUR_CANDIDATES_REFER_REFERRALS_FROM_REFER_REFERRALS_TITLE',
  'get_subpanel_data' => 'gaur_candidates_refer_referrals',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'Refer_Referrals',
      'mode' => 'MultiSelect',
    ),
  ),
);



// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["activities"] = array (
  'order' => 10,
  'sort_order' => 'desc',
  'sort_by' => 'date_start',
  'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
  'type' => 'collection',
  'subpanel_name' => 'activities',
  'module' => 'Activities',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateTaskButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopScheduleMeetingButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopScheduleCallButton',
    ),
    3 => 
    array (
      'widget_class' => 'SubPanelTopComposeEmailButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);


// created: 2010-02-25 07:30:17
$layout_defs["gaur_Candidates"]["subpanel_setup"]["history"] = array (
  'order' => 20,
  'sort_order' => 'desc',
  'sort_by' => 'date_modified',
  'title_key' => 'LBL_HISTORY',
  'type' => 'collection',
  'subpanel_name' => 'history',
  'module' => 'History',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateNoteButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopArchiveEmailButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopSummaryButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'gaur_candidates_activities_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);



//auto-generated file DO NOT EDIT
$layout_defs['gaur_Candidates']['subpanel_setup']['refer_references_gaur_candidates']['override_subpanel_name'] = 'gaur_Candidatesdefault';


//auto-generated file DO NOT EDIT
$layout_defs['gaur_Candidates']['subpanel_setup']['gaur_candidates_refer_referrals']['override_subpanel_name'] = 'gaur_Candidatesdefault';


//auto-generated file DO NOT EDIT
$layout_defs['gaur_Candidates']['subpanel_setup']['gaur_candidates_eval_evaluations']['override_subpanel_name'] = 'gaur_Candidatesdefault';


//auto-generated file DO NOT EDIT
$layout_defs['gaur_Candidates']['subpanel_setup']['gaur_candidates_oss_job']['override_subpanel_name'] = 'gaur_Candidatesdefault';


?>