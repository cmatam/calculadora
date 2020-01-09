<!DOCTYPE html>
<html>
	<head>
		<title>Calculadora</title>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155862397-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-155862397-1');
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>
		ESTADO:<span id="estado">Iniciando</span><br><br>
		<input type="text" id="valor" value="1"><br><br>
		<button onclick="deptr()">PTR</button><br><br>
		<button onclick="deusd()">USD</button><br><br>
		<button onclick="deves()">BS</button><br><br>
		<br>
		<b>PTR</b>: <div id="salptr"></div>
		<b>USD</b>: <div id="salusd"></div>
		<b>VES</b>: <div id="salves"></div>
		<script>

		function deptr()
		{
			val = $("#valor").val();
			$("#salptr").html(val);
			$("#salusd").html(val*USD);
			$("#salves").html(val*VES);
		}

		function deusd()
		{
			val = $("#valor").val();
			$("#salptr").html(val/USD);
			$("#salusd").html(val);
			$("#salves").html(val*VES/USD);
		}

		function deves()
		{
			val = $("#valor").val();
			$("#salptr").html(val/VES);
			$("#salusd").html(val/(VES/USD));
			$("#salves").html(val);
		}

		function consultar_precios()
		{
			$("#estado").html("Consultando");
			$.post('https://petroapp-price.petro.gob.ve/price/',
			{
				coins: ["PTR"],
				fiats: ["USD","BS"]
			},
			function(json)
			{
				$("#estado").html("OK");
				USD = json.data.PTR.USD;
				VES = json.data.PTR.BS;
				deptr();
			}).fail(
			function(json)
			{
				$("#estado").html("Error");
			});
		}

		window.onload = function()
		{
			consultar_precios();
		};
		</script>
	</body>
</html>