<?php
    $id = $_GET['idfunc'];

   // echo "$id";

    include("conexao2.php");
    $stmt = $pdo->prepare("delete from tbFuncionarios where idfunc='$id'");	
	$stmt ->execute();

    header("location:usuario.php");
?>