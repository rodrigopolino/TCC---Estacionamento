<?php 
	include("cabecalho2.php");
	include("menu2.php");
	include("conexao2.php");
	include("rodape.php");
?>
<div class="centralizar">
<h1 align='center'> Estacionar </h1>
<div id="container" align="center">
	<!--<a href="estacionar-form.php">--><button class="novo"><a href="estacionar-form2.php">Novo</a></button><!--</a>-->
	<br>
	<section>	
		<?php
			$stmt = $pdo->prepare("select * from tbEstacionar order by id desc");	
			$stmt ->execute();

		?>
		<div id="tbEstacionar">
			<table class="table" cellspacing="1">
				<thead>
					<!--<th> Id </th>-->
					<th> Placa </th>
					<th> Marca </th>
					<th> Modelo </th>
					<th> Dono </th>
					<th> Data </th>
					<th> Entrada</th>
					<th> Situação</th>
					<th> Tipo </th>
					<th> Controle </th>
					<th> </th>
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
								
								$stmt2 = $pdo->prepare("select count(*) from tbEstacionar where placa='$row[1]' and tipo='avulso' and situacao='Pago'");
    							$stmt2->execute();
    							$row2 = $stmt2->fetch(PDO::FETCH_BOTH);
								$stmt5 = $pdo->prepare("select count(*) from tbEstacionar where placa='$row[1]' and tipo='Mensalista' and situacao='OK'");
    							$stmt5->execute();
    							$row5 = $stmt5->fetch(PDO::FETCH_BOTH);

   								if($row2[0] == 1){
        							echo "<td><a href='estacionar-excluir2.php?id=$row[0]'><img src='deletar.svg'></a></td>";
    							} 
								elseif($row5[0] == 1) {
									echo "<td><a href='estacionar-excluir2.php?id=$row[0]'><img src='deletar.svg'></a></td>";
								}
								else {
									echo "<td>";
									if($row[8] == "avulso" && $row[7] == "Em aberto") {
										echo "<a href='estacionar-finalizar2.php?id=$row[0]'><img src='finalizar.svg'> </a>";
										
										echo "<td>";
											echo "<a href='estacionar-form2?id=$row[0]&placa=$row[1]&marca=$row[2]&modelo=$row[3]&dono=$row[4]' id='alterar''>";
												echo "<img src='editar.svg'>";
											echo "</a>";
										echo "</td>";
									}
									if($row[8] =="Mensalista") {
										echo "<a href='estacionar-finalizar-mensalistas2.php?id=$row[0]'><img src='finalizar.svg'> </a>";
									}
								}
								echo "</td>";
									
							echo "</tr>";				
						}	
					?>	
				</tbody>		
			</table>
		</div>	
	</section>
</div>
</div>