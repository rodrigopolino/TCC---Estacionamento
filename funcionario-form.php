<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao2.php");
	include("rodape.php");

?>
<div id="container" align="center">
	<div class="hero">
	<section>
		<div class="form-box">
		<h1 align='center'> Cadastrar Funcionários </h1>
		<form action="funcionarios-salvar.php" method="post" class="input-group2">
			<input type="number" name="idFunc" value="<?php echo @$_GET['idfunc']; ?>" hidden>
			<div>
				<input type="text" placeholder="Nome" name="txNome" class="input-field2" value="<?php echo @$_GET['nome']; ?>" required/>
			</div>

			<div>
				<input type="text" placeholder="CPF" name="txCpf" class="input-field2" value="<?php echo @$_GET['cpf']; ?>" required/>
			</div>

			<div>
				<input type="text" placeholder="Telefone" name="txTelefone" class="input-field2" value="<?php echo @$_GET['telefone']; ?>" required/>
			</div>

			<div>
				<input type="text" placeholder="Usuario" name="txUsuario" class="input-field2" value="<?php echo @$_GET['usuario']; ?>" required/>
			</div>

			<div>
				<input type="text" placeholder="Senha" name="txSenha"class="input-field2" value="<?php echo @$_GET['senha']; ?>" required/>
			</div>
			<br>
			<button type="submit" class="submit-btn">Salvar</button>
        </form>
	</div>
	</section>
	</div>
</div>
<style>
    body{
        overflow-y: hidden;
	    overflow-x: hidden;
    }
</style>