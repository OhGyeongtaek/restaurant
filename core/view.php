<?php
	class view{
		public $data = [];

		public function init(){
			$this->data['link'] = empty($_GET['method'])? "main" : 'sub';
		}

		public function excute(){
			$this->init();
			extract($this->data);
			include PAGE.'header.php';
			include PAGE.$link.'.php';
			include PAGE.'footer.php';
		}
	}