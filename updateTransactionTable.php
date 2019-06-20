<?php
$v=0;
if(isset($_POST['one']))
{$v=1;
	$receiver=$_POST['one'];
}
else if(isset($_POST['two'])) {
	$v=1;
	$receiver=$_POST['two'];
}
else if(isset($_POST['three']))
{$v=1;
	$receiver=$_POST['three'];
}
else if(isset($_POST['four']))
{$v=1;
	$receiver=$_POST['four'];
}
else if(isset($_POST['five']))
{$v=1;
	$receiver=$_POST['five'];
}
else if(isset($_POST['six']))
{$v=1;
	$receiver=$_POST['six'];
}
else if(isset($_POST['seven']))
{$v=1;
	$receiver=$_POST['seven'];
}
else if(isset($_POST['eight']))
{$v=1;
	$receiver=$_POST['eight'];
}
else if(isset($_POST['nine']))
{$v=1;
	$receiver=$_POST['nine'];
}
else if(isset($_POST['ten']))
{$v=1;
$receiver=$_POST['ten'];
}
else
{$v=0;
	echo "transaction cannot be proceeded as the receiver  was not selected.so,try a new transaction";
}
?>
<?php
if($v==1)
{
    include 'db.php';
    session_start();
$from_name = $_SESSION["fromName"];
$to_name = $receiver;
$amount = $_POST['amount'];
# debit
$query_debit = "UPDATE users
SET credits = credits - '$amount'
WHERE name = '$from_name'
";
$run = $con->query($query_debit);
if($run){
    // echo "<b>query_debit is successfullt</b><br /><b>$query_debit</b>";
}else{
    // error
}
# credit
$query_credit = "UPDATE users
SET credits = credits + '$amount'
WHERE name = '$to_name'
";
$run = $con->query($query_credit);
if($run){
    // echo "query_credit is successfull";
}else{
    // error
}

echo "<h3>Transaction has been successful !</h3>";
echo "<h4>You can go Home and verify the credits !</h4>";
# "" update transfer Table ""
$query_transfer_table = "
INSERT INTO transfers (from_name, to_name, credits) VALUES ('$from_name', '$to_name', '$amount');
";
$run = $con->query($query_transfer_table);
if($run){
    // echo "query_transfer_table is successfull";
}else{
    // error
}
}
?>