<?	session_start();	?>
<head>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link href="external.css" rel="stylesheet">
	<link href="grid/simple-grid.min.css" rel="stylesheet">
	<link href="/custom_grid.css" rel="stylesheet">
<head>
<body>
<div class = "head_container">
	
	<div id = "getform">Post message</div>
	
</div>
<div>
	<form id = "postmess" action="/insert.php" method="GET">
		<input type="text" name="user" value="">Имя пользователя<Br>
		<input type="email" name="email" value="">E-mail<Br>
		<input type="text" name="text" value="">Text</p>
	 <p><input id = "textinput" type="submit" name = "Send"></p>
	</form>
</div>
<div class = "container_msg">
<?	 include "form.html" ?>

<?	if($_GET["insert"])
	{
		if($_GET["user"] && $_GET["email"] && $_GET["text"])
		{
			(new INSERT_Message($_GET["name"], $_GET["email"], $_GET["text"]));
		}
	}
?>
</div>
<div class = "container_msg">

<?	include "sql_response.php" ;	echo (new response_html());	?>

</div>
<script type = "text/javascript" src = "/ajax.js"></script>
</body>
