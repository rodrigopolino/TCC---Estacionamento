<?php
    $id = $_POST['idEstacionar'];
  
    $placaM = $_POST["txPlacaM"];
    $marcaM = $_POST["txMarca"];
    $modeloM = $_POST["txModelo"];
    $donoM = $_POST["txDono"];

    $situacao = "Em aberto";

    //echo "$produto $idCategoria $valor";
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("Y-m-d");
	$hora = date('H:i:s');

  

    
    include("conexao2.php");

        $stmt3 = $pdo->prepare("select count(*) from tbMensalistas where placa='$placaM'");
        $stmt3->execute();
        $row2 = $stmt3->fetch(PDO::FETCH_BOTH);

            $stmt2 = $pdo->prepare("select * from tbMensalistas where placa='$placaM'");
            $stmt2->execute();
            $row2 = $stmt2->fetch(PDO::FETCH_BOTH);
            $marcaM = $row2[6];
            $modeloM = $row2[7];
            $donoM = $row2[1];
            $situacaoM = $row2[8];
            $mensalista = "Mensalista";
            $stmt4 = $pdo->prepare("insert into tbEstacionar(placa, marca, modelo, dono, data, hora, situacao, tipo) values('$placaM', '$marcaM', '$modeloM', '$donoM', '$data', '$hora', '$situacao', '$mensalista')");
            $stmt4->execute();



    header("location:estacionar-exibir.php")
    
?>