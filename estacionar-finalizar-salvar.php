<?php 
	
	$relatos = $_POST['txRelatos'];
	$pgmt = $_POST['txPgmt'];
	$Idinvisivel = $_POST['Idinvisivel'];
	echo $Idinvisivel;
	
	include("cabecalho.php");
	include("menu.php");
	include("conexao2.php");
	echo "<h1 align='center'> Finalizar </h1>";

	

	$stmt1 = $pdo->prepare("update tbFinalizar set pgmt='$pgmt', relatos='$relatos' where idEstacionar='$Idinvisivel'");
    $stmt1->execute();
	//$stmt = $pdo->prepare("select * from tbFinalizar where idEstacionar='$Idinvisivel'");	
	//$stmt->execute();
	//$row = $stmt ->fetch(PDO::FETCH_BOTH); 
	//echo $row[9];
	
	$stmt = $pdo->prepare("update tbEstacionar set situacao='Pago' where id='$Idinvisivel'");	
	$stmt ->execute();

	$stmt2 = $pdo->prepare("update tbEstacionarS set situacao='Pago' where id='$Idinvisivel'");	
	$stmt2 ->execute();
	//$row = $stmt ->fetch(PDO::FETCH_NUM); 

	header("location:estacionar-exibir.php");


?>