<?php 
	include("cabecalho2.php");
	include("menu2.php");
	include("conexao2.php");
	include("rodape.php");
?>
<div class="centralizar">
<h1 align='center'> Mensalistas </h1>
<div id="container" align="center">
	<!--<a href="estacionar-form.php">--><button class="novo"><a href="mensalistas-form2.php">Novo</a></button><!--</a>-->
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
					<th> Situação </th>
					<th> Excluir </th>
					<th> Alterar </th>
					
					
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
								echo "<td><a href='mensalistas-excluir2.php?id=$row[0]'><img src='deletar.svg'></a></td>";
								echo "<td>";
									echo "<a href='mensalistas-form2?idmensalista=$row[0]&dono=$row[1]&cpf=$row[2]&telefone=$row[3]&sexo=$row[4]&placa=$row[5]&marca=$row[6]&modelo=$row[7]&estadoCarro=$row[8]&cep=$row[9]&rua=$row[10]&bairro$row[11]&cidade=$row[12]&estado=$row[12]&numero=$row[13]' id='alterar''>";
										echo "<img src='editar.svg'>";
									echo "</a>";
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