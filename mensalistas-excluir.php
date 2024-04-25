<?php
    $id = $_GET['id'];

   // echo "$id";

    include("conexao2.php");
    $stmt = $pdo->prepare("delete from tbMensalistas where idmensalista='$id'");	
	$stmt ->execute();

    header("location:mensalistas-exibir.php");
?>