<?php
if(isset($_GET['p'])) {
	$p = htmlspecialchars($_GET['p']);
} else {
	$p = 'home';
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Tobias Bartz">
	<meta name="keywords" content="Corona, CoronaVirus, Charts, CoronaVirusCharts">
	<meta name="description" content="Erfahren sie mehr über das CoronaVirus! Sehen sie die Entwicklung an und verfolgen sie die aktuellesten Daten.">
	
	
    <title>Corona-Virus-Charts | Sars-CoV-2 - Charts by Tobias Bartz</title>
	
	<link rel="icon" href="assets/img/virus.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo+Black">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body onLoad="onLoader()" style="margin: 0">
	<div id="loader"></div>
	
	<div id="page" style="display: none" class="animate-bottom">
		<?php include('templates/navbar.php'); ?>
		<?php include('templates/' . $p . '.php'); ?>
		<?php include('templates/footer.php'); ?>
	</div>
	
	<script>
		var myVar;

		function onLoader() {
  			myVar = setTimeout(showPage, 3000);
		}

		function showPage() {
  			document.getElementById("loader").style.display = "none";
  			document.getElementById("page").style.display = "block";
		}
	</script>
	
	<script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>
</html>