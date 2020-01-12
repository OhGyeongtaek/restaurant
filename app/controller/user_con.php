<?php
	class user extends controller{
		public function _id_chk(){
			$data = $this->now->id_chk();
			echo $data['cnt'];
		}

		public function _join(){
			$this->now->_join();
			script('가입이 완료되었습니다.','main');
		}

		public function _login(){
			$data = $this->now->login();
			if(empty($data)){
				script('아이디와 비밀번호를 확인해주세요.','main');
			}else{
				$_SESSION['id'] = $data['id'];
				$_SESSION['user'] = $data;
				header('location:/view');
			}
		}

		public function _logout(){
			unset($_SESSION['id'],$_SESSION['user']);
			header('location:/view');
		}

		public function _mypage(){
			$this->view->data['list'] = $this->now->get_list();
		}

	}