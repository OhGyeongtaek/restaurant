<?php
	class reserveModel extends model{
		public function get_amount(){
			$time1 = ($_GET['time']-2).':'.$_GET['minite'].":00";
			$time2 = ($_GET['time']+2).':'.$_GET['minite'].":00";

			$time1 = date('H:i:s',strtotime('+1 minute'.$time1));
			$time2 = date('H:i:s',strtotime('-1 minute'.$time2));

			$sql = 'SELECT 
						*,SUM(amount) as amount
					FROM `reserve`
					WHERE `date` = ? AND
							TIME(`time`) BETWEEN "'.$time1.'" AND "'.$time2.'"';

			$data = $this->result($sql, [$_GET['date']]);
			return $data;
		}

		public function reserve_save(){
			$sql = 'INSERT INTO `reserve` SET
						`id` = ?,
						`time` = ?,
						`date` = ?,
						`amount` = ?,
						`name`= ?';

			$arr = [$_SESSION['id'],
					$_POST['time'].':'.$_POST['minite'].':00',
					$_POST['date'],
					$_POST['amount'],
					$_SESSION['user']['name'] ];

			$this->query($sql,$arr);
		}
	}