<?php
    include("cabecalho.php");
    include("menu.php"); 
    include("conexao2.php");
    include("rodape.php");
    
?>

<div class="centralizar">
<table class="table">
				<thead>
					<!--<th> Id </th>-->
					<th> Placa </th>
					<th> Marca </th>
                    </thead>
				<tbody>
                    <?php
                    $stmt = $pdo->prepare("select * from tbEstacionar order by id desc");	
                    $stmt ->execute();
                    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
                        echo "<tr>";				
                            /*echo "<td>$row[0] </td>";*/
                            echo "<td>$row[1] </td>";
                            echo "<td>$row[2] </td>";
                    }
                    
                    ?>
                    
<div class="centralizar">
<?php
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<div class='content'>";
    date_default_timezone_set('America/Sao_Paulo');
    $datac = date("d");
    echo "<div class='box'>";
    
    echo "Valores recebidos no dia: $datac";

    echo "<br>";

    $stmt = $pdo->prepare("select sum(valor) from tbFinalizar");	
    $stmt ->execute();
    $row = $stmt ->fetch(PDO::FETCH_BOTH);
    echo "R$ $row[0],00";
    
    echo "</div>";

    echo "<br>";
    
    echo "<div class='box'>";
    echo "Quantidade de carros em aberto:";

    echo "<br>";

    $stmt = $pdo->prepare("select count(*) from tbEstacionar where situacao='Em aberto'");	
    $stmt ->execute();
    $row2 = $stmt ->fetch(PDO::FETCH_BOTH);

    echo "$row2[0] veículo(s)";
    echo "</div>";    

    echo "<br>";

    echo "<div class='box'>";
    echo "Quantidade de vagas disponíveis:";

    echo "<br>";

    $vagasd = 20 - $row2[0];

    echo "$vagasd veículo(s)";
    echo "</div>";  
    
    echo "<br>";

    echo "<div class='box'>";
    echo "Quantidade de vagas ocupadas:";

    echo "<br>";

    $vagasl = 20 - $vagasd;

    echo "$vagasl veículo(s)";
    echo "</div>";
    echo "</div>";
?>




<style>
*{
    overflow-y: hidden;
}
.table {
	width: 20vw;
	text-align: center;
	/*float: right;*/
	margin-top: -25%;
	margin-bottom: 30%;
	/*margin-right: 10%px;*/
	margin-left: 60%;
	border: 1px solid;
	border-radius: 8px;
	font-family: Arial;
	font-size: 13px;
	font-weight: 700;
}
</style>