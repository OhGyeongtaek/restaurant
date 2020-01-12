<?php
	class userModel extends model{
		public function id_chk(){
			$sql = 'SELECT COUNT(*) as `cnt` FROM `user` WHERE id = ?';
			return $this->result($sql,[$_GET['id']]);		
		}

		public function _join(){
			$sql = 'INSERT INTO `user` SET
						`id` = ?,
						`pw` = ?,
						`mail` = ?,
						`name` = ?';

			$this->query($sql,[	$_POST['j_id'],
								sha1($_POST['j_pw']),
								$_POST['mail'],
								$_POST['name'] ]);
		}

		public function login(){
			$sql = 'SELECT * FROM `user` WHERE id = ? AND pw = ?';
			
			$data = $this->result($sql,[$_POST['l_id'],
										sha1($_POST['l_pw']) ]);
			return $data;
		}

		public function get_list(){
			$sql = 'SELECT * FROM `reserve` WHERE `date` >=  NOW() AND id = ?';
			return $this->resultAll($sql,[$_SESSION['id']]);
		}
	}