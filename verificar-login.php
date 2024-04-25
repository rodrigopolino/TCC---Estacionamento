<?php
    include("conexao2.php");

    $adm = $_POST["txAdm"];
    $senhaAdm = $_POST["txSenhaAdm"];

    //$adm = $_POST["txFunc"];
    //$adm = $_POST["txSenhaFunc"];



    $stmt = $pdo->prepare("select count(*) from tcc.usuario where usuario='$adm' and senha='$senhaAdm'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_BOTH);

    //$stmt2 = $pdo->prepare("select count(*) from tbFuncionarios where usuario='$adm' and senha='$senhaAdm'");
    //$stmt2->execute();
    //$row1 = $stmt2->fetch(PDO::FETCH_BOTH);

    if($row[0] == 1){
        $_SESSION['usuario'] = $adm;
        $_SESSION['senha'] = $senhaAdm;
        header("location:home.php");
    } 
    //elseif($row1[0] == 1) {
        //header("location:estacionar-exibir.php");
    //}
    else {
        $_SESSION['nao_logado'] = true;
        header("location:index.php");
    }

?>