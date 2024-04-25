<?php
	include("cabecalho.php");
	include("menu.php");
    include("conexao2.php");
?>

<section>

	<div class="containerzinho3">

		<?php
		$stmt = $pdo->prepare("select count(*) from tbestacionar where tipo='avulso';");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_NUM);
		?>

		<?php
		$stmt2 = $pdo->prepare("select count(*) from tbestacionar where tipo='mensalista';");
		$stmt2->execute();
		$row2 = $stmt2->fetch(PDO::FETCH_NUM);
		?>
        var data = google.visualization.arrayToDataTable([
         ['Vagas', { role: 'style' }],
         ['ocupados' , (código de puxar do bd)],           
         ['Silver', (código de puxar do bd) ],            
         ['só ouro', 7777, 'gold'],
         ]);
		


		<section>
			<div id="chart_div3"></div>
		</section>
	</div>

</section>


<div class="centralizar">
<?php
    //date_default_timezone_set('America/Sao_Paulo');
    //$datac = date("d");
    //echo "<div class='box'>";
    
    //echo "Valores recebidos no dia: $datac";
?>

<!-- Gráficos avulsos e mensalistas -->

<section>

	<div class="containerzinho">

		<?php
		$stmt = $pdo->prepare("select count(*) from tbestacionar where tipo='avulso';");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_NUM);
		?>

		<?php
		$stmt2 = $pdo->prepare("select count(*) from tbestacionar where tipo='mensalista';");
		$stmt2->execute();
		$row2 = $stmt2->fetch(PDO::FETCH_NUM);
		?>

		<!-- https://github.com/d3/d3/wiki/Gallery -->
		<!-- https://developers.google.com/chart/interactive/docs/quick_start -->

		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			// Load the Visualization API and the corechart package.
			google.charts.load('current', {
				'packages': ['corechart']
			});

			// Set a callback to run when the Google Visualization API is loaded.
			google.charts.setOnLoadCallback(drawChart);

			// Callback that creates and populates a data table,
			// instantiates the pie chart, passes in the data and
			// draws it.
			function drawChart() {

				// Create the data table.
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Topping');
				data.addColumn('number', 'Slices');
				data.addRows([
					['avulso', <?php echo $row[0]; ?>],
					['mensalista', <?php echo $row2[0]; ?>],
				]);

				// Set chart options
				var options = {
					'title': 'Quantidade de Mensalistas e Avulsos',
					'width': 500,
					'height': 300
				};

				// Instantiate and draw our chart, passing in some options.
				var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
				chart.draw(data, options);
			}
		</script>



		<section>
			<div id="chart_div"></div>
		</section>
	</div>

</section>

<!-- FIMGrafico mensalista e avulso -->

<section>
	<div class="containerzinho2">

		<?php
		$mb = 47;
		$b = 20;
		$r = 15;
		$i = 12;
		$mi = 6;
		?>

		<script type="text/javascript">
			// Load the Visualization API and the corechart package.
			google.charts.load('current', {
				'packages': ['corechart']
			});

			// Set a callback to run when the Google Visualization API is loaded.
			google.charts.setOnLoadCallback(drawChart);

			// Callback that creates and populates a data table,
			// instantiates the pie chart, passes in the data and
			// draws it.
			function drawChart() {

				// Create the data table.
				var data = new google.visualization.DataTable();
				data.addColumn('string', 'Topping');
				data.addColumn('number', 'Nº de Análises (%)');
				data.addRows([
					['Vagas Disponíveis', <?php echo $vagasd; ?>],
					['Vagas Ocupadas', <?php echo  $vagasl; ?>],
				
				]);

				// Set chart options
				var options = {
					'title': 'Gestão de vagas',
					'width': 600,
					'height': 500
				};

				// Instantiate and draw our chart, passing in some options.
				var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
				chart.draw(data, options);
			}
		</script>
		<section>
			<div id="chart_div2"></div>
		</section>

	</div>
</section>


<?php include("rodape.php")  ?>

<style>
	.containerzinho {
    margin: auto;
    width: 30%;
    padding: 20px;
    background-color: rgb(34, 123, 129);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	border-style: double;
}
.containerzinho2 {
    margin: auto;
    width: 36%;
    padding: 20px;
    background-color: rgb(34, 123, 129);
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	border-style: double;
}
.home2{
	margin: auto;
    padding: 30px 0px 20px 10px;
    text-align: center;
    background-color: rgb(34, 123, 129);
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
    width: 40%;
	border-style: groove;
}
</style>