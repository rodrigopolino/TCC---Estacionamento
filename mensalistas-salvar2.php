<?php
    $idmensalista = $_POST["idmensalista"];
    $dono = $_POST["txDono"];
    $cpf = $_POST["txCpf"];
    $telefone = $_POST["txTelefone"];
    $sexo = $_POST["txSexo"];
    $placa = $_POST["txPlaca"];
    $marca = $_POST["txMarca"];
    $modelo = $_POST["txModelo"];
    $estCarro = $_POST["txEstCarro"];
    $cep = $_POST["cep"];
    $rua = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["uf"];
    $numero = $_POST["txNumero"];
    $mensalidade = $_POST["txMensalidade"];



    //echo "$produto $idCategoria $valor";
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("Y-m-d");
	$hora = date('H:i:s');

    $datarenovacao = date('Y-m-d', strtotime('+30 days'));
  

    
    include("conexao2.php");

    $stmt = $pdo->prepare("SELECT COUNT(idmensalista) FROM tbMensalistas where idmensalista = $idmensalista");
    $stmt->execute();

    $row = $stmt ->fetch(PDO::FETCH_BOTH);

    if($row[0] == 0) {
        $stmt = $pdo->prepare("insert into tbMensalistas(dono, cpf, telefone, sexo, placa, marca, modelo, estadoCarro, cep, rua, bairro, cidade, estado, numero, datarenovacao, mensalidade) values('$dono', '$cpf', '$telefone', '$sexo', '$placa', '$marca', '$modelo', '$estCarro', '$cep', '$rua', '$bairro', '$cidade', '$estado', '$numero', '$datarenovacao', '$mensalidade')");
        $stmt->execute();
        

    } elseif ($row[0] == 1) {

        try{
            $stmt = $pdo -> prepare ("update tbMensalistas set dono='$dono' where idmensalista='$idmensalista'");
            $stmt->execute();
            $stmt2 = $pdo -> prepare ("update tbMensalistas set cpf='$cpf' where idmensalista='$idmensalista'");
            $stmt2->execute();
            $stmt3 = $pdo -> prepare ("update tbMensalistas set telefone='$telefone' where idmensalista='$idmensalista'");
            $stmt3->execute();
            $stmt4 = $pdo -> prepare ("update tbMensalistas set sexo='$sexo' where idmensalista='$idmensalista'");
            $stmt4->execute();
            $stmt5 = $pdo -> prepare ("update tbMensalistas set placa='$placa' where idmensalista='$idmensalista'");
            $stmt5->execute();
            $stmt6 = $pdo -> prepare ("update tbMensalistas set marca='$marca' where idmensalista='$idmensalista'");
            $stmt6->execute();
            $stmt7 = $pdo -> prepare ("update tbMensalistas set modelo='$modelo' where idmensalista='$idmensalista'");
            $stmt7->execute();
            $stmt8 = $pdo -> prepare ("update tbMensalistas set estadoCarro='$estCarro' where idmensalista='$idmensalista'");
            $stmt8->execute();
            $stmt9 = $pdo -> prepare ("update tbMensalistas set cep='$cep' where idmensalista='$idmensalista'");
            $stmt9->execute();
            $stmt10 = $pdo -> prepare ("update tbMensalistas set rua='$rua' where idmensalista='$idmensalista'");
            $stmt10->execute();
            $stmt11 = $pdo -> prepare ("update tbMensalistas set bairro='$bairro' where idmensalista='$idmensalista'");
            $stmt11->execute();
            $stmt12 = $pdo -> prepare ("update tbMensalistas set cidade='$cidade' where idmensalista='$idmensalista'");
            $stmt12->execute();
            $stmt13 = $pdo -> prepare ("update tbMensalistas set estado='$estado' where idmensalista='$idmensalista'");
            $stmt13->execute();
            $stmt14 = $pdo -> prepare ("update tbMensalistas set numero='$numero' where idmensalista='$idmensalista'");
            $stmt14->execute();
        }
        catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

    }

    header("location:mensalistas-exibir2.php");
    

    
    
?>

