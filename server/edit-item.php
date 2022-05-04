<?php


require('db.php');
$res = array();

if(isset($_POST['post_id'])){

$id = $_POST['post_id'];
$created_at = !empty($_POST['created_at']) ? $_POST['created_at'] : "";
$comment = !empty($_POST['comment']) ? $_POST['comment'] : "";

$query = "UPDATE favorites SET created_at = '$created_at', description = '$comment' WHERE id = '$id'";

$result = mysqli_query($con, $query);

header("Location: ../client/dashboard.php");
exit;
}
?>

