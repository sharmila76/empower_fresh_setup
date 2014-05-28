<?php

require_once('iportal/include/MVC/View/views/view.edit.php');

class lg_PortalUserViewEdit extends ViewEdit {

	function lg_PortalUserViewEdit() {
		parent::ViewEdit();
	}

	function preDisplay() {



		parent::preDisplay();
	}

	function display() {
		//var_dump($this);

		global $current_portal_user;
		global $current_language;

		if (file_exists('iportal/modules/lg_PortalUser/' . $current_language . 'lang.php'))
			include_once('iportal/modules/lg_PortalUser/' . $current_language . 'lang.php');

		$contacts = $current_portal_user->get_linked_beans('contacts_lg_portaluser', 'Contact');
		$iportal_contact = $contacts[0];
		$this->bean->fill_in_relationship_fields();
		$this->bean->contact_id = $iportal_contact->id;
		$this->bean->related_contact = $iportal_contact->name;
//var_dump($iportal_contact);

		$this->bean->contact_name = $iportal_contact->name;

		$this->ss->assign("CONTACT_NAME", $iportal_contact->first_name);
		$this->ss->assign("CONTACT_LASTNAME", $iportal_contact->last_name);
		$this->ss->assign("phone_work", $iportal_contact->phone_work);
		$this->ss->assign("phone_mobile", $iportal_contact->phone_mobile);


		$this->ss->assign("primary_address_street", $iportal_contact->primary_address_street);
		$this->ss->assign("primary_address_city", $iportal_contact->primary_address_city);
		$this->ss->assign("primary_address_state", $iportal_contact->primary_address_state);
		$this->ss->assign("primary_address_postalcode", $iportal_contact->primary_address_postalcode);
		$this->ss->assign("primary_address_country", $iportal_contact->primary_address_country);

		$this->ss->assign("primary_address_country", $iportal_contact->email);

		$this->ss->assign("id", $this->bean->id);
		$this->ss->assign("name1", $this->bean->name);
		$this->bean->name.=" " . $this->bean->lastname;


		$this->ss->assign("alt_address_street", $iportal_contact->alt_address_street);
		$this->ss->assign("alt_address_city", $iportal_contact->alt_address_city);
		$this->ss->assign("alt_address_state", $iportal_contact->alt_address_state);
		$this->ss->assign("alt_address_postalcode", $iportal_contact->alt_address_postalcode);
		$this->ss->assign("alt_address_country", $iportal_contact->alt_address_country);
		$this->ss->assign("email", $iportal_contact->email1);




		$probability_script = <<<EOQ
	<script>

function check_custom_data(){
    contact_name=document.getElementById('contact_lastname').value;
    name=document.getElementById('name').value;
    lastname=document.getElementById('lastname').value;
    if ((contact_name=="")||(name=="")||(lastname=="")){
      alert("Required Fields are missing");
   }else{
        if(ValidateForm())
         return check_form('EditView');
        
   }
   return false;
}


function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true
	}

function ValidateForm(){
	var emailID=document.getElementById('email')

	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	return true
 }



</script>
EOQ;


		parent::display();

		echo $probability_script;
	}

}

?>
