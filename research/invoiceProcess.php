<?php
$invoice = $_POST['grand1'];
$cid = $_POST['cid'];
echo $invoice;
echo "-------";
echo $cid;
echo "**********";
$tr=$_POST['tri'];
echo $tr;
for($x=1;$x<=$tr;$x++)
{
 $y="amt".$x;
 echo $_POST[$y];
}
?>