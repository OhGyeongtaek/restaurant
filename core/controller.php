<?php
	class controller{
		public $model = [];
		public $now1;
		public $view;

		public function __construct(){
			$this->view = new view();
			$this->loadModel('menu');
		}

		public function loadModel($file){
			if(is_file(MODEL.$file.'_model.php')){
				include MODEL.$file.'_model.php';
				$model = $file.'Model';
				if($file === $_GET['controller']){
					$this->now = new $model();
				}else{
					$this->model[$file] = new $model();
				}
			}
		}
	}