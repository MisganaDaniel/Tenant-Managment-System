<!DOCTYPE html>
<html>
<body>

<?php
$date1=date_create("2019-01-20");
$date2=date_create("2019-01-21");
$diff=date_diff($date1,$date2);
echo $diff->format("%a");

$hehe = "4 years";
$convert = (int)$hehe;

echo number_format(floor($hehe)) - 2;

?>

</body>
</html>