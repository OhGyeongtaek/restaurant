<?php
	class model{
		public $db;
		public function __construct(){
			$this->db = new PDO('mysql:host=127.0.0.1; dbname=restaurant1; charset=utf8','root','');
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		
		public function query($sql,$arr=[]){
			try{
				$stmt = $this->db->prepare($sql);
				$stmt->execute($arr);
				return $stmt;
			}catch(PDOException $e){
				exit(nl2br($e));
			}
		}

		public function entity($arr){
			if(!is_array($arr)) return [];
			foreach($arr as $key => $val){
				if(is_array($val)) $arr[$key] = $this->entity($val);
				else				$arr[$key] = htmlentities(stripslashes($val),ENT_QUOTES,'utf-8');
			}
			return $arr;
		}

		public function result($sql,$arr=[]){
			return $this->entity($this->query($sql,$arr)->fetch());
		}

		public function resultAll($sql,$arr=[]){
			return $this->entity($this->query($sql,$arr)->fetchAll());
		}
	}