<?php 
	include("cabecalho2.php");
	include("menu2.php");
	include("conexao2.php");
	include("rodape.php");

	echo "<h1 align='center'> Finalizar </h1>";

	function segundos_em_tempo($segundos) {
		$horas = floor($segundos / 3600);
		$minutos = floor($segundos % 3600 / 60);
		$segundos = $segundos % 60;
		if ($horas < 0) {
			$minutos *= -1;
			$segundos *= -1;
		}


		return sprintf("%d:%02d:%02d", $horas, $minutos, $segundos);
	}


	$id = $_GET['id'];

    $stmt = $pdo->prepare("select * from tbEstacionar where id='$id'");	
	$stmt ->execute();
	$row = $stmt ->fetch(PDO::FETCH_NUM); 
	
	$idEstrangeiro = $row[0];
	$fnPlaca = $row[1];
	$fnMarca = $row[2];
	$fnModelo = $row[3];
	$fnDono = $row[4];
	$fnDataent = $row[5];
	$fnHoraent = $row[6];
	
	date_default_timezone_set('America/Sao_Paulo');
	$data2 = date("Y-m-d");
	$hora2 = date('H:i:s');

	//list($horas, $minutos, $segundos) = explode(':',$hora2);
	//$calc2 = $horas * 3600 + $minutos * 60 + $segundos;
	//echo $hora2;
	//echo $calc2;


	list($horas, $minutos, $segundos) = explode(':',$hora2);
	$calc = $horas * 3600 + $minutos * 60 + $segundos;

	$hora1 = $row[6];

	list($horas, $minutos, $segundos) = explode(':',$hora1);
	$calc1 = $horas * 3600 + $minutos * 60 + $segundos;
	//echo $calc1;

	$subseg = $calc - $calc1;
	$tempo = segundos_em_tempo($subseg);
	$temperc = 0;
	//echo $tempo;

	list($horas, $minutos, $segundos) = explode(':',$tempo);
	$calctempo = $horas * 3600 + $minutos * 60 + $segundos;
	//echo $calctempo;

	if ($calctempo < 3600) {
		$valor = "10";
	}
	elseif ($calctempo > 3600) {
		$valor = "15";
	}

	$fnDatasai = $data2;
	$fnHorasai = $hora2;
	$fnTempo = $tempo;
	$fnValor = $valor;


	$stmt2 = $pdo->prepare("insert into tbFinalizar(placa, marca, modelo, dono, dataent, datasai, horaent, horasai, tempo, valor, idEstacionar) values('$fnPlaca', '$fnMarca', '$fnModelo', '$fnDono', '$fnDataent', '$fnDatasai', '$fnHoraent', '$fnHorasai', '$fnTempo', '$fnValor', '$idEstrangeiro')");
    $stmt2->execute();
	
	//$stmt3 = $pdo->prepare("select * from tbFinalizar");	
    //$stmt3 ->execute();
    //$row3 = $stmt3->fetch(PDO::FETCH_NUM);



?>
<div id="container" align="center">
	<section>
		<form action="estacionar-finalizar-mensalistas-salvar2.php" method="post" id="form">
			<div>
				<input type="text" placeholder="<?php echo $row[1]; ?>" disabled="disabled"/>
			</div>

			<div>
				<input type="text" placeholder="<?php echo $row[2]; ?>" disabled="disabled"/>
			</div>

			<div>
				<input type="text" placeholder="<?php echo $row[3]; ?>" disabled="disabled"/>
			</div>

			<div>
				<input type="text" placeholder="<?php echo $row[4]; ?>" disabled="disabled"/>
			</div>
            <div>
                <input type="text" placeholder="<?php echo $row[6]; ?>" disabled="disabled"/>
            </div>
            <div>
                <input type="text" placeholder="<?php echo $hora2; ?>"/>
            </div>
			<div>
                <input type="text" placeholder="<?php echo $tempo; ?>" disabled="disabled"/>
            </div>
			<div>
				<p class="p">Relatos:</p>
                <textarea> </textarea>
            </div>
			<div>
				<input type="hidden" name="Idinvisivel" value="<?php echo $id; ?>"/>
            </div>
			<div class="salvar">
				<input type="submit" value="Salvar"/>
			</div>
		</form>
	</section>
</div>