<?php


print_r($_POST);
echo 'hi';

if(isset($_POST['suits'])) {
  foreach ($_POST['suits'] as $a) {
     echo $a; 
  }
}

?>




