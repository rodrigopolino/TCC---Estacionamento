<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao2.php");
    include("rodape.php");

?>
<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>
<div id="container" align="center">
    <div class="hero">
	<section>
        <div class="form-box3">
        <h1 align='center'> Cadastrar Mensalistas </h1>
		<form action="mensalistas-salvar.php" method="post" class="input-group3">
        <fieldset id="dados">    
            <input type="number" name="idmensalista" value="<?php echo @$_GET['idmensalista']; ?>" hidden>
			<div>
				<input type="text" placeholder="Dono" name="txDono" class="input-field2" value="<?php echo @$_GET['dono']; ?>"/>
			</div>

			<div>
				<input type="text" placeholder="CPF" name="txCpf" class="input-field2" value="<?php echo @$_GET['cpf']; ?>"/>
			</div>

			<div>
				<input type="text" placeholder="Telefone" name="txTelefone" class="input-field2" value="<?php echo @$_GET['telefone']; ?>"/>
			</div>

			<div>
				<input type="text" placeholder="Sexo" name="txSexo" class="input-field2" value="<?php echo @$_GET['sexo']; ?>"/>
			</div>

			<div>
				<input type="text" placeholder="Placa" name="txPlaca" class="input-field2" value="<?php echo @$_GET['placa']; ?>"/>
			</div>

			<div>
				<input type="text" placeholder="Marca" name="txMarca" class="input-field2" value="<?php echo @$_GET['marca']; ?>"/>
			</div>

			<div>
				<input type="text" placeholder="Modelo" name="txModelo" class="input-field2" value="<?php echo @$_GET['modelo']; ?>"/>
			</div>

			<div>
				<input type="text" placeholder="Estado do Carro" name="txEstCarro" class="input-field2" value="<?php echo @$_GET['estadoCarro']; ?>"/>
			</div>
        </fieldset>
        <fieldset id="cep2">
			<div>
			<input name="cep" type="text" id="cep" placeholder="CEP" value=""
               onblur="pesquisacep(this.value);" class="input-field2" value="<?php echo @$_GET['cep']; ?>"/>
			</div>
			<div>
			<input name="rua" type="text" id="rua" placeholder="Rua" class="input-field2" value="<?php echo @$_GET['rua']; ?>"/>
			</div>
       	 	<div>
				<input name="bairro" type="text" id="bairro" placeholder="Bairro" class="input-field2" value="<?php echo @$_GET['bairro']; ?>"/> <br>
			</div>
			<div>
			<input name="cidade" type="text" id="cidade" placeholder="Cidade" class="input-field2" value="<?php echo @$_GET['cidade']; ?>"/>
			</div>
			<div>
			<input name="uf" type="text" id="uf" placeholder="Estado" class="input-field2" value="<?php echo @$_GET['estado']; ?>"/>
			</div>
            
            <div>
				<input type="text" placeholder="Número" name="txNumero" class="input-field2" value="<?php echo @$_GET['numero']; ?>"/>
			</div>

            <div>
				<input type="text" placeholder="Mensalidade" name="txMensalidade" class="input-field2" value="<?php echo @$_GET['mensalidade']; ?>"/>
			</div>
            <br>
            <button type="submit" class="submit-btn">Salvar</button>
        </fieldset>
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

<?php

    if(isset($_POST["cep"])){

        $cep = $_POST["cep"];
    
        $url = "https://viacep.com.br/ws/$cep/json/";
        $json = file_get_contents($url);    
        $data = json_decode($json);
    
    
        $logradouro = $data->logradouro;
        $bairro = $data->bairro;
        $localidade = $data->localidade;
        $uf = $data->uf;
    }


?>
	
