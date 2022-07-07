<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="icon" href="./IMG/tomato.ico">
<title>Medidor Temperatura, Humedad</title>
<link rel="stylesheet" href="CSS/inicio.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Humedad', 0]
        ]);
        var data1 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Temperatura', 0]
        ]);
        var data2 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['H. del suelo',0]
        ]);
        var options = {
          width: 200, height: 200,
          redFrom: 75, redTo: 100,
          yellowFrom:55, yellowTo: 100,
          minorTicks: 7
        };

        var chart = new google.visualization.Gauge(document.getElementById('humedad'));
        var chart1 = new google.visualization.Gauge(document.getElementById('temp'));
        var chart2 = new google.visualization.Gauge(document.getElementById('hsuelo'));
        chart.draw(data, options);
        chart1.draw(data1, options);
        chart2.draw(data2, options);
        setInterval(function() {
            var JSON=$.ajax({
                url:"https://sensores7sb.000webhostapp.com/get-datos.php?q=1",
                dataType: 'json',
                async: false}).responseText;
            var Respuesta=jQuery.parseJSON(JSON);
            
          data.setValue(0, 1,Respuesta[0].humedadR);
          data1.setValue(0, 1,Respuesta[0].temperatura);
          data2.setValue(0, 1,Respuesta[0].humedadS);
          chart.draw(data, options);
          chart1.draw(data1, options);
          chart2.draw(data2, options);
        }, 1300);
        
      }
    </script>
</head>
<body>
  <div class="contenedor">
    <h1>Sistema de monitoreo en tiempo real </h1>
    <h2>para el sembrio de tomate</h2>
    <div id="humedad" ></div>
    <div id="temp" ></div>
    <div id="hsuelo" ></div>
    <p id="mh">Medidor de Humedad</p>
    <p id="mt">Medidor de Temperatura</p>
    <p id="ms">Medidor de Humedad </p>
    <p id="ms1">del suelo</p>
  </div>
   
</body>
</html>
