<?php
	class reserve extends controller{
		public function _amount_chk(){
			$amount = $this->now->get_amount();
			echo $amount['amount'];
		}

		public function _reserve_save(){
			if(empty($_SESSION['id'])){
				script('로그인 이후 이용이 가능합니다.','main');
			}
			$this->now->reserve_save();
			script('예약이 완료되었습니다.','main');
		}
	}