<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao2.php");
	include("rodape.php");
?>
<div class="centralizar">
<h1 align='center'> Mensalistas </h1>
<div id="container" align="center">
	<br>
	<section>	
		<?php
			$stmt = $pdo->prepare("select * from tbMensalistas order by idmensalista desc");	
			$stmt ->execute();

		?>
		<div id="tbMensalistas">
			<table class="table" cellspacing="1">
				<thead>
					<!--<th> Id </th>-->
					<th> Dono </th>
					<th> CPF </th>
					<th> Telefone </th>
					<th> Sexo </th>
					<th> Placa </th>
					<th> Marca </th>
					<th> Modelo</th>
					<th> Estado do Carro </th>
                    <th> CEP</th>
                    <th> Rua</th>
                    <th> Bairro</th>
                    <th> Cidade</th>
                    <th> Estado</th>
                    <th> Número</th>
                    <th> Data Renovação</th>
                    <th> Mensalidade</th>
					<th> &nbsp </th>
					
				</thead>
				<tbody>
					<?php
						while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
							echo "<tr>";				
								/*echo "<td>$row[0] </td>";*/
								echo "<td>$row[1] </td>";
								echo "<td>$row[2] </td>";
								echo "<td>$row[3] </td>";
								echo "<td>$row[4] </td>";
								echo "<td>$row[5] </td>";		
								echo "<td>$row[6] </td>";	
								echo "<td>$row[7] </td>";
								echo "<td>$row[8] </td>";
                                echo "<td>$row[9] </td>";
                                echo "<td>$row[10] </td>";
                                echo "<td>$row[11] </td>";
                                echo "<td>$row[12] </td>";
                                echo "<td>$row[13] </td>";
                                echo "<td>$row[14] </td>";
                                echo "<td>$row[15] </td>";
                                echo "<td>$row[16] </td>";
								echo "<td><a href='mensalistas-exibir.php?id=$row[0]'><img src='voltar.svg'></a></td>";
							echo "</tr>";				
						}
					?>	
				</tbody>		
			</table>
		</div>	
	</section>
</div>
</div>