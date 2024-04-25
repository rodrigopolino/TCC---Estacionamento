<?php
	include("cabecalho.php");
	include("menu.php");
    include("conexao2.php");
    include("rodape.php");
?>
<div class="conteiner1">
<section>	
	<?php
    date_default_timezone_set('America/Sao_Paulo');
	  $data2 = date("Y-m-d");
    
		// 1ª Tabela
    $stmt = $pdo->prepare("SELECT count(id) from tbFinalizar where datasai='$data2'");
	  $stmt ->execute();
    while($row = $stmt ->fetch(PDO::FETCH_BOTH)){
        $mb = $row[0]; 
    }	

    $dataontem = date('Y-m-d', strtotime('-1 days'));

    $stmt2 = $pdo->prepare("SELECT count(id) from tbFinalizar where datasai='$dataontem'");
	  $stmt2 ->execute();
    while($row = $stmt2 ->fetch(PDO::FETCH_BOTH)){
        $b = $row[0]; 
    }	

    $dataontem1 = date('Y-m-d', strtotime('-2 days'));

    $stmt3 = $pdo->prepare("SELECT count(id) from tbFinalizar where datasai='$dataontem1'");
	  $stmt3 ->execute();
    while($row = $stmt3 ->fetch(PDO::FETCH_BOTH)){
        $r = $row[0]; 
    }	

    $dataontem2 = date('Y-m-d', strtotime('-3 days'));

    $stmt4 = $pdo->prepare("SELECT count(id) from tbFinalizar where datasai='$dataontem2'");
	  $stmt4 ->execute();
    while($row = $stmt4 ->fetch(PDO::FETCH_BOTH)){
        $i = $row[0]; 
    }	

    $dataontem3 = date('Y-m-d', strtotime('-4 days'));

    $stmt5 = $pdo->prepare("SELECT count(id) from tbFinalizar where datasai='$dataontem3'");
	  $stmt5 ->execute();
    while($row = $stmt5 ->fetch(PDO::FETCH_BOTH)){
        $e = $row[0]; 
    }	

    $dataontem4 = date('Y-m-d', strtotime('-5 days'));

    $stmt6 = $pdo->prepare("SELECT count(id) from tbFinalizar where datasai='$dataontem4'");
	  $stmt6 ->execute();
    while($row = $stmt6 ->fetch(PDO::FETCH_BOTH)){
        $f = $row[0]; 
    }	

    $dataontem5 = date('Y-m-d', strtotime('-6 days'));

    $stmt7 = $pdo->prepare("SELECT count(id) from tbFinalizar where datasai='$dataontem5'");
	  $stmt7 ->execute();
    while($row = $stmt7 ->fetch(PDO::FETCH_BOTH)){
        $g = $row[0]; 
    }
    // ------------------------------------------------------------------------------------------------------------
    // 2ª Tabela
    $stmt = $pdo->prepare("select count(*) from tbestacionar where tipo='avulso';");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM);

    $stmt2 = $pdo->prepare("select count(*) from tbestacionar where tipo='mensalista';");
    $stmt2->execute();
    $row2 = $stmt2->fetch(PDO::FETCH_NUM);

    // ------------------------------------------------------------------------------------------------------------
    // 3ª Tabela
    $data2 = date("Y-m-d");
    
	
    $stmt = $pdo->prepare("SELECT sum(valor) from tbFinalizar where datasai='$data2'");
	  $stmt ->execute();
    while($row1 = $stmt ->fetch(PDO::FETCH_BOTH)){
        $mb = $row1[0]; 
    }	

    $dataontem = date('Y-m-d', strtotime('-1 days'));

    $stmt2 = $pdo->prepare("SELECT sum(valor) from tbFinalizar where datasai='$dataontem'");
	  $stmt2 ->execute();
    while($row7 = $stmt2 ->fetch(PDO::FETCH_BOTH)){
        $b = $row7[0]; 
    }	

    $dataontem1 = date('Y-m-d', strtotime('-2 days'));

    $stmt3 = $pdo->prepare("SELECT sum(valor) from tbFinalizar where datasai='$dataontem1'");
	  $stmt3 ->execute();
    while($row3 = $stmt3 ->fetch(PDO::FETCH_BOTH)){
        $r = $row3[0]; 
    }	

    $dataontem2 = date('Y-m-d', strtotime('-3 days'));

    $stmt4 = $pdo->prepare("SELECT sum(valor) from tbFinalizar where datasai='$dataontem2'");
	  $stmt4 ->execute();
    while($row4 = $stmt4 ->fetch(PDO::FETCH_BOTH)){
        $i = $row4[0]; 
    }	

    $dataontem3 = date('Y-m-d', strtotime('-4 days'));

    $stmt5 = $pdo->prepare("SELECT sum(valor) from tbFinalizar where datasai='$dataontem3'");
	  $stmt5 ->execute();
    while($row5 = $stmt5 ->fetch(PDO::FETCH_BOTH)){
        $e = $row5[0]; 
    }	



    

	?>

</section>
</div>
<div class="conteiner2">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Quantidade de carros", { role: "style" } ],
        ["Há 7 dias", <?php echo $g; ?>, "blue"],
        ["Há 6 dias", <?php echo $f; ?>, "#b87333"],
        ["Há 5 dias", <?php echo $e; ?>, "#yellon"],
        ["Há 4 dias", <?php echo $i; ?>, "#purple"],
        ["Anteontem", <?php echo $r; ?>, "red"],
        ["Ontem", <?php echo $b; ?>, "silver"],
        ["Hoje", <?php echo $mb; ?>, "green"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Quantidade de carros estacionados na semana",
        width: 630,
        height: 260,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  
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
                'width': 380,
                'height': 210
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Quantidade de carros'],
          ["Há 7 dias", <?php echo $g; ?>],
          ["Há 6 dias", <?php echo $f; ?>],
          ["Há 5 dias", <?php echo $e; ?>],
          ["Há 4 dias", <?php echo $i; ?>],
        ]);

        var options = {
          title: 'Gols feitos pelo Palmeiras',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>



    <section>
        <div id="chart_div"></div>
    </section>
    </div>

<style>
    *{
        overflow-y: hidden;
        justify-content: center;
    }
    div{
        display: grid;
        margin: 8px auto;
    }
    /*conteiner2{
        margin-right: 200px;
    }*/
</style>
  </head>
  <body>
  <div id="chart_div"></div>
  <div id="columnchart_values" style="width: 1600px; height: 700px";></div>
  <div id="piechart_3d" style="width: 900px; height: 1000px;"></div>
  </body>
  </html>