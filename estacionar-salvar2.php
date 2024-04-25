<?php
    $id = $_POST['idEstacionar'];
    $placa = $_POST["txPlaca"];
    $marca = $_POST["txMarca"];
    $modelo = $_POST["txModelo"];
    $dono = $_POST["txDono"];

    $placaM = $_POST["txPlacaM"];

    $situacao = "Em aberto";

    //echo "$produto $idCategoria $valor";
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("Y-m-d");
	$hora = date('H:i:s');

  

    
    include("conexao2.php");

    $stmt = $pdo->prepare("SELECT COUNT(id) FROM tbEstacionar where id = $id");
    $stmt->execute();

    $row = $stmt ->fetch(PDO::FETCH_BOTH);


    if($row[0] == 0) {
        $stmt3 = $pdo->prepare("select count(*) from tbMensalistas where placa='$placaM'");
        $stmt3->execute();
        $row2 = $stmt3->fetch(PDO::FETCH_BOTH);

        if($row2[0] == 1){
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


            
        } 
        else {
            $avulso = "avulso";

            $stmt = $pdo->prepare("insert into tbEstacionar(placa, marca, modelo, dono, data, hora, situacao, tipo) values('$placa', '$marca', '$modelo', '$dono', '$data', '$hora', '$situacao', '$avulso')");
            $stmt->execute();

            $stmt2 = $pdo->prepare("insert into tbEstacionarS(placa, marca, modelo, dono, data, hora, situacao) values('$placa', '$marca', '$modelo', '$dono', '$data', '$hora', '$situacao')");
            $stmt2->execute();
        }

    } elseif ($row[0] == 1) {

        try{
            $stmt = $pdo -> prepare ("update tbEstacionar set placa='$placa' where id='$id'");
            $stmt->execute();
            $stmt2 = $pdo -> prepare ("update tbEstacionar set marca='$marca' where id='$id'");
            $stmt2->execute();
            $stmt3 = $pdo -> prepare ("update tbEstacionar set modelo='$modelo' where id='$id'");
            $stmt3->execute();
            $stmt4 = $pdo -> prepare ("update tbEstacionar set dono='$dono' where id='$id'");
            $stmt4->execute();
        }
        catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

    }
   

    header("location:estacionar-exibir2.php")
    
?>