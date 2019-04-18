<?
		
		
		class response_msg_sql
		{
			protected $response;
			public function __construct(int $start = 0, int $howmuch = 10)
			{

				$this->response = 
				(new PDO("mysql:host=localhost; dbname=ALFA", "mysql", "mysql", 
				[
						PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				        PDO::ATTR_EMULATE_PREPARES   => false, ] ))
						->
						query("SELECT user, email, 
						text FROM messages LIMIT $start, $howmuch ")->fetchAll();				
			}
			public function __toString()
			{
				return json_encode($this->response);
			}
		}
		// To HTML
		class response_html Extends response_msg_sql
		{
			protected function html_block_template
			($name, $email, $text):string
			{ 
				return 
				"
				<div class = 'msg_ui_container'> 
					<div class = 'msg_container_head'>
						<div class = 'msg_ui_name'>$name</div>
						<div class = 'msg_ui_email'>$email</div>
					</div>
					<div class = 'msg_ui_text'>$text</div>
				</div>";
			}
			public function ToHtml(string $html = "", 
									   int $counter = 1):string
			{
				
				if(!$this->response[$counter]){ return $html;}

				$html .= 
					$this->html_block_template
					($this->response[$counter]["user"], $this->response[$counter]["email"],
					 $this->response[$counter]["text"]);
					return $this->ToHtml($html, ++$counter);
			}
			public function __toString()
			{
				return $this->ToHtml();
			}
		}
?>