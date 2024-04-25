<?php
    $meuCep = $_POST["txCep"];

    $url = "https://viacep.com.br/ws/$meuCep/json/";
    $json = file_get_contents($url);    
    $data = json_decode($json);

    
    $endereco = $data->logradouro; 
    $bairro = $data->bairro;
    $cidade = $data->localidade;
    $estado = $data->uf; 
  

    
    include("conexao2.php");
    

    $stmt = $pdo->prepare("insert into tbMensalistas(cep, endereco, bairro, cidade, estado) where idMensalistas= '1' values('$cep', '$bairro', '$cidade', '$estado')");
    $stmt->execute();

    header("location:mensalistas-exibir.php")
    
?>