<!DOCTYPE html>
<html>
	<head>
		<title>Seguidores</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>
		<div id="login">
			<a href="https://www.instagram.com/oauth/authorize?client_id=478654202804198&redirect_uri=https://petrocal.000webhostapp.com/ig.php&scope=user_profile,user_media&response_type=code">Login</a>
		</div>
		<script>
		
		TOKEN = <?php isset($_GET['access_token'])?echo "$_GET['access_token']":""; ?> 

		function consultar_precios()
		{
			$("#estado").html("Consultando");
			$.post('https://petroapp-price.petro.gob.ve/price/',
			{
				/**
https://api.instagram.com/oauth/authorize
  ?client_id={app-id}
  &redirect_uri={redirect-uri}
  &scope=user_profile,user_media
  &response_type=code

  https://socialsizzle.herokuapp.com/auth/?code=AQDp3TtBQQ...#_

curl -X POST \
  https://api.instagram.com/oauth/access_token \
  -F client_id={app-id} \
  -F client_secret={app-secret} \
  -F grant_type=authorization_code \
  -F redirect_uri={redirect-uri} \
  -F code={code}

  curl -X GET \
  'https://graph.instagram.com/{user-id}?fields=id,username&access_token={access-token}'
				 */
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
			//consultar_precios();
			;
		};
		</script>
	</body>
</html>