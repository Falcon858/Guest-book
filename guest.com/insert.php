<p><a href = "/index.php">To main</a></p>
<?
	class INSERT_Message
	{
		protected $pdo;
		public function getError():string
		{
			return json_encode($this->pdo->errorInfo());
		}
		public function __construct($name, $email, $text)
		{
			$this->pdo = new PDO("mysql:host=localhost; dbname=ALFA", "mysql", "mysql", 
		[
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	        PDO::ATTR_EMULATE_PREPARES   => false,
		]) or die("pdo connect error");
			$this->pdo = $this->pdo->prepare(
			"
			
			INSERT INTO messages (user, email, text) VALUES
			( :user, :email, :text);");
			$this->pdo->bindParam(':user', $name);
			$this->pdo->bindParam(':email', $email);
			$this->pdo->bindParam(':text', $text);
			$this->pdo->execute(); 
		}
	}
	
?>

<div id = "error">
<?
	
	
		if($_GET["user"] && $_GET["email"] && $_GET["text"])
		{
			echo (new INSERT_Message($_GET["user"], $_GET["email"], $_GET["text"]))->getError();
		}
	
?>
</div>