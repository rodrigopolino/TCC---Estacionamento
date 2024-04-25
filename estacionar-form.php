<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao2.php");
    include("rodape.php");

	//echo "<h1 align='center'> Cadastrar Veículos </h1>"
?>
<body>
<div class="hero">
            <div class="form-box">
			<h2 align='center'> Cadastrar Veículos </h2>
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="avulsos()">Avulsos</button>
                    <button type="button" class="toggle-btn" onclick="mensalista()">Mensalista</button>
                </div>
                <form id="avulsos" class="input-group" method="post" action="estacionar-salvar.php">

                    <input type="number" name="idEstacionar" value="<?php echo @$_GET['id']; ?>" hidden>
        
                    <input type="text" class="input-field" placeholder="Placa" name="txPlaca" value="<?php echo @$_GET['placa']; ?>" required>
                    <input type="text" class="input-field" placeholder="Marca do Carro" name="txMarca" value="<?php echo @$_GET['marca']; ?>" required>
					<input type="text" class="input-field" placeholder="Modelo do Carro" name="txModelo" value="<?php echo @$_GET['modelo']; ?>" required>
					<input type="text" class="input-field" placeholder="Dono" name="txDono" value="<?php echo @$_GET['dono']; ?>" required>
                    <div>
                    <?php 
                        $stmt2 = $pdo->prepare("select * from tbEstacionar");
                        $stmt2->execute(); 
                    ?>
                    </div>
                    <!--<input type="checkbox" class="chech-box"><span>Lembre minha senha</span>-->
                    <br>
					<button type="submit" class="submit-btn">Salvar</button>
                </form>
                <form id="mensalista" class="input-group" method="post" action="estacionar-salvar-mensalista.php">

                    <input type="text" class="input-field" placeholder="Placa" name="txPlacaM" required>
					<br>
                    <button type="submit" class="submit-btn">Salvar</button>
                </form>
            </div>
        </div>
        <script>
            var x = document.getElementById("avulsos")
            var y = document.getElementById("mensalista")
            var z = document.getElementById("btn")

            function mensalista(){
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }
            function avulsos(){
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0";
            }
        </script>
</body>
<style>
    body{
        overflow-y: hidden;
	    overflow-x: hidden;
    }
</style>