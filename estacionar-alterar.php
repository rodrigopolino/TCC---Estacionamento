<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao2.php");
    include("rodape.php");
?>
<h1 align='center'> Estacionar </h1>
<section>
    
    <form action="estacionar-salvar.php" method="post">
        <div class ="espaco">
            <input class="form-control" type="hidden" placeholder="IdEsatacionar" name="txidEstacionar" value="<?php echo @$_GET['id']?>">
        </div>
        <div class ="espaco">
            <input class="form-control" type="text" placeholder="Placa" name="txPlaca" value="<?php echo @$_GET['placa']?>">
        </div>

        <div class ="espaco">
            <input  class="form-control" type="text" placeholder="Marca" name="txMarca" value="<?php echo @$_GET['marca']?>"/>
        </div>

        <div class ="espaco">
            <input  class="form-control" type="text" placeholder="Modelo" name="txModelo" value="<?php echo @$_GET['modelo']?>"/>
        </div>

        <div class ="espaco">
            <input  class="form-control" type="text" placeholder="Dono" name="txDono" value="<?php echo @$_GET['dono']?>"/>
        </div>

        <div class ="espaco">
            <input class="btn btn-danger" type="submit" value="Salvar"/>
        </div>

    </form>
</section>