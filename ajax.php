<?php

if(isset($_POST['suits'])) {
  foreach ($_POST['suits'] as $a) {
     echo $a; 
  }
}
echo 'Package submitted successfully.';

?>
