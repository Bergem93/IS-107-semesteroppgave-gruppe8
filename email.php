<html>
	<head>
	<title>Innputskjema</title>
	</head>
	<body>

	<?php

	
	// Meldinger blir sendt til gitt epost
	$strEmail = "bergem@live.no";

	// Henter input fra brukeren
	$strMessage = $_POST["Melding"];
	
	

	mail($strEmail,"Innsendt melding",$strMessage);
	header('Location: Side1000.html');
	
	

	
	
	?>

	</body>
	</html>