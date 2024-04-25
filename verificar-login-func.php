<?php
    include("conexao2.php");

    $func = $_POST["txFunc"];
    $senhaFunc= $_POST["txSenhaFunc"];

    $stmt2 = $pdo->prepare("select count(*) from tbFuncionarios where usuario='$func' and senha='$senhaFunc'");
    $stmt2->execute();
    $row1 = $stmt2->fetch(PDO::FETCH_BOTH);

   
    if($row1[0] == 1) {
        header("location:home2.php");
    }
    else {
        $_SESSION['nao_logado'] = true;
        header("location:index.php");
    }

?>