<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao2.php");
	include("rodape.php");
?>
<div class="centralizar">
<h1 align='center'> Usuários </h1>
<div id="container" align="center">
	<!--<a href="estacionar-form.php">--><button class="novo"><a href="funcionario-form.php">Novo</a></button><!--</a>-->
	<br>
	<section>	
		<?php
			$stmt = $pdo->prepare("select * from tbFuncionarios order by idfunc desc");	
			$stmt ->execute();

		?>
		<div id="tbEstacionar">
			<table class="table" cellspacing="1">
				<thead>
					<!--<th> Id </th>-->
					<th> Nome </th>
					<th> CPF </th>
					<th> Telefone </th>
					<th> Usuario </th>
					<th> Senha </th>
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
								echo "<td><a href='funcionario-excluir.php?idfunc=$row[0]'><img src='deletar.svg'></a></td>";
								echo "<td>";
									echo "<a href='funcionario-form?idfunc=$row[0]&nome=$row[1]&cpf=$row[2]&telefone=$row[3]&usuario=$row[4]&senha=$row[5]' id='alterar''>";
										echo "<img src='editar.svg'";
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