<?php
    $id = $_GET['id'];

   // echo "$id";

    include("conexao2.php");
    $stmt = $pdo->prepare("delete from tbEstacionar where id='$id'");	
	$stmt ->execute();

    header("location:estacionar-exibir2.php");
?>