<?php
	class admin extends controller{
		public function _get_reserve(){
			$data = $this->now->get_reserve();
			foreach($data as $key => $val){
				echo '<div class="reserve-data">
							<input type="hidden" data-idx="'.$val['idx'].'">
							'.$val['name'].'['.date('H:i',strtotime($val['time'])).']
					  </div>';
			}
		}

		public function _update(){
			$this->now->update();
			script('변경되었습니다.','return');
		}

		public function _canvas(){
			$canvas = $this->now->canvas();
			foreach($canvas as $key => $val){
				$amount = empty($val[0]['amount'])? 0 : $val[0]['amount'];
				echo '<input type="hidden" value="'.$amount.'" class="m'.($key+1).'">';
			}
		}
	}