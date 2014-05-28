<?php
// created: 2010-12-06 18:52:00
$dictionary["lg_PortalUser"]["fields"]["contacts_lg_portaluser"] = array (
  'name' => 'contacts_lg_portaluser',
  'type' => 'link',
  'relationship' => 'contacts_lg_portaluser',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_LG_PORTALUSER_FROM_CONTACTS_TITLE',
);
$dictionary["lg_PortalUser"]["fields"]["contacts_lg_portaluser_name"] = array (
  'name' => 'contacts_lg_portaluser_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_LG_PORTALUSER_FROM_CONTACTS_TITLE',
  'save' => true,
  'id_name' => 'contacts_l86fcontacts_ida',
  'link' => 'contacts_lg_portaluser',
  'table' => 'contacts',
  'module' => 'Contacts',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["lg_PortalUser"]["fields"]["contacts_l86fcontacts_ida"] = array (
  'name' => 'contacts_l86fcontacts_ida',
  'type' => 'link',
  'relationship' => 'contacts_lg_portaluser',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_CONTACTS_LG_PORTALUSER_FROM_CONTACTS_TITLE',
);
