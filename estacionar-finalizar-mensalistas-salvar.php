<?php 
	$Idinvisivel = $_POST['Idinvisivel'];

	
	include("cabecalho.php");
	include("menu.php");
	include("conexao2.php");
	echo "<h1 align='center'> Finalizar </h1>";

	$stmt = $pdo->prepare("update tbEstacionar set situacao='OK' where id='$Idinvisivel'");	
	$stmt ->execute();

	$stmt2 = $pdo->prepare("update tbEstacionarS set situacao='OK' where id='$Idinvisivel'");	
	$stmt2 ->execute();
	//$row = $stmt ->fetch(PDO::FETCH_NUM); 

	header("location:estacionar-exibir.php");


?>