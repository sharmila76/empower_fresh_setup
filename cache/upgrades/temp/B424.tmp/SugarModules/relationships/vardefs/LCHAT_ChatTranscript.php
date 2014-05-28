<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 12:53:41
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 13:06:47
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 13:13:15
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 13:14:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-12 13:15:04
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 12:36:24
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 12:44:12
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 17:05:45
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 18:34:17
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 18:40:33
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-14 18:41:55
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-21 11:35:19
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts"] = array (
  'name' => 'lchat_chattranscript_accounts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_accounts_name"] = array (
  'name' => 'lchat_chattranscript_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat6f60ccounts_ida',
  'link' => 'lchat_chattranscript_accounts',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat6f60ccounts_ida"] = array (
  'name' => 'lchat_chat6f60ccounts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads"] = array (
  'name' => 'lchat_chattranscript_leads',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_leads_name"] = array (
  'name' => 'lchat_chattranscript_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat5156dsleads_ida',
  'link' => 'lchat_chattranscript_leads',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat5156dsleads_ida"] = array (
  'name' => 'lchat_chat5156dsleads_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_leads',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts"] = array (
  'name' => 'lchat_chattranscript_contacts',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_contacts_name"] = array (
  'name' => 'lchat_chattranscript_contacts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat1fdbontacts_ida',
  'link' => 'lchat_chattranscript_contacts',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat1fdbontacts_ida"] = array (
  'name' => 'lchat_chat1fdbontacts_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_contacts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_CONTACTS_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities"] = array (
  'name' => 'lchat_chattranscript_opportunities',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chattranscript_opportunities_name"] = array (
  'name' => 'lchat_chattranscript_opportunities_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'lchat_chat071bunities_ida',
  'link' => 'lchat_chattranscript_opportunities',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
?>
<?php
// created: 2010-07-21 11:54:09
$dictionary["LCHAT_ChatTranscript"]["fields"]["lchat_chat071bunities_ida"] = array (
  'name' => 'lchat_chat071bunities_ida',
  'type' => 'link',
  'relationship' => 'lchat_chattranscript_opportunities',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LCHAT_CHATTRANSCRIPT_OPPORTUNITIES_FROM_LCHAT_CHATTRANSCRIPT_TITLE',
);
?>
