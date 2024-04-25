<?php
    $idfunc = $_POST['idFunc'];
    $nome = $_POST["txNome"];
    $cpf = $_POST["txCpf"];
    $telefone = $_POST["txTelefone"];
    $usuarioF = $_POST["txUsuario"];
    $senhaF = $_POST["txSenha"];



    //echo "$produto $idCategoria $valor";
    date_default_timezone_set('America/Sao_Paulo');
    $data = date("Y-m-d");
	$hora = date('H:i:s');
  

    
    include("conexao2.php");

    $stmt = $pdo->prepare("SELECT COUNT(idfunc) FROM tbFuncionarios where idfunc = $idfunc");
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_BOTH);


    if($row[0] == 0) {
        $stmt1 = $pdo->prepare("insert into tbFuncionarios(nome, cpf, telefone, usuario, senha) values('$nome', '$cpf', '$telefone', '$usuarioF', '$senhaF')");
        $stmt1->execute();

        $stmt2 = $pdo->prepare("insert into tcc.func(usuario, senha) values('$usuarioF', '$senhaF')");
        $stmt2->execute();
    } elseif ($row[0] == 1) {

        try{
            $stmt1 = $pdo -> prepare ("update tbFuncionarios set nome='$nome' where idfunc='$idfunc'");
            $stmt1->execute();
            $stmt2 = $pdo -> prepare ("update tbFuncionarios set cpf='$cpf' where idfunc='$idfunc'");
            $stmt2->execute();
            $stmt3 = $pdo -> prepare ("update tbFuncionarios set telefone='$telefone' where idfunc='$idfunc'");
            $stmt3->execute();
            $stmt4 = $pdo -> prepare ("update tbFuncionarios set usuario='$usuarioF' where idfunc='$idfunc'");
            $stmt4->execute();
            $stmt5 = $pdo -> prepare ("update tbFuncionarios set senha='$senhaF' where idfunc='$idfunc'");
            $stmt5->execute();
        }
        catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

    }
    

    

    header("location:usuario.php")
    
?>

