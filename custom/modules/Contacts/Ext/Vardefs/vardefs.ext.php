<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-12-06 18:52:00
$dictionary["Contact"]["fields"]["contacts_lg_portaluser"] = array (
  'name' => 'contacts_lg_portaluser',
  'type' => 'link',
  'relationship' => 'contacts_lg_portaluser',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_LG_PORTALUSER_FROM_LG_PORTALUSER_TITLE',
);
$dictionary["Contact"]["fields"]["contacts_lg_portaluser_name"] = array (
  'name' => 'contacts_lg_portaluser_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_CONTACTS_LG_PORTALUSER_FROM_LG_PORTALUSER_TITLE',
  'save' => true,
  'id_name' => 'contacts_ld6e8taluser_idb',
  'link' => 'contacts_lg_portaluser',
  'table' => 'lg_portaluser',
  'module' => 'lg_PortalUser',
  'rname' => 'name',
);
$dictionary["Contact"]["fields"]["contacts_ld6e8taluser_idb"] = array (
  'name' => 'contacts_ld6e8taluser_idb',
  'type' => 'link',
  'relationship' => 'contacts_lg_portaluser',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_CONTACTS_LG_PORTALUSER_FROM_LG_PORTALUSER_TITLE',
);

?>