<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

echo '<table style="border:1px solid silver; margin-top:15px; width:100%" id="tblFeatures" style="height:auto">
  <tr style="text-align:center; color:#FFFFFF; background-color:#236fbd">
    <td>Select</td>
     <td>Packages</td>
    <td>Users</td>
    <td>Subscription</td>
    <td>Price</td>
  </tr>';

$id = $_GET["id"];
$sql = "SELECT * FROM package_pricemaster where packagecode = '$id' order by PackageName asc"; 
$result = $GLOBALS['db']->query($sql);
while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
  echo"<tr><td style='text-align:center'><input name='val' onClick='CalculateVal(this);' value=". $row['Price'] ." type='checkbox'/></td><td>". $row['PackageName'] ."</td><td>". $row['TotUsers'] ."</td><td>". $row['Subscription'] ."</td><td style='text-align:right;'>". $row['Price'] ."</td></tr>";
}
echo '<tr><td colspan="3" style="text-align:right"></td><td style="text-align:right;">Total Amount : </td><td style="font-weight:bold; text-align:right; border-top:1px solid silver;"><span id="Totalcost" >0.00</span></td></tr>
  </table>';

echo '<div style="text-align:right; padding:10px;"><a href="index.php?module=Addpackage&action=Cart"><img src="themes/iSales/images/cart.png" style="height:35px"></a></div>';

$this->ss->display($this->getCustomFilePathIfExists('modules/Addpackage/Cart.html'));

