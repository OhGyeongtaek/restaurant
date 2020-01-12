<?php
	class adminModel extends model{
		public function get_reserve(){
			$sql = 'SELECt * FROM `reserve` WHERE `date` = ? order by `idx` DESC';
			return $this->resultAll($sql,[$_GET['date']]);
		}

		public function update(){
			$sql = 'UPDATE `reserve` SET time = ? WHERE idx = ?';
			foreach($_POST as $key => $val){
				$idx = substr($key,-1,1);
				$arr = [$val, $idx ];
				$this->query($sql,$arr);
			}
		}

		public function canvas(){
			for($i=1; $i<=12; $i++){
				$date = $_GET['year'].'-'.sprintf("%02d",$i);
				$sql = 'SELECT *,SUM(amount) as amount FROM `reserve` WHERE `date` LIKE "%'.$date.'%"';
				$return[] = $this->resultAll($sql);
			}
			return $return;
		}
	}