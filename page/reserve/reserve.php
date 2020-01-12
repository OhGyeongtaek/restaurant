<?php
	$user = isset($_SESSION['user']['name'])? $_SESSION['user']['name'] : '손님';
?>
<section class="reserve">
	<div class="date"></div>
	<div class="play-box" title="예약하기">
		<form action="/action/reserve/reserve_save" method="post">
			<input type="hidden" name="date" id="date" />
			<table>
				<tr>
					<th>성명</th>
					<td colspan="3"><?php echo $user; ?></td>
				</tr>
				<tr>
					<th>예약일</th>
					<td class="date-view"></td>
					<th><label for="time">예약시간</label></th>
					<td>
						<select name="time" id="time">
							<?php
								for($i=18; $i <= 21; $i++){
									echo '<option value="'.$i.'">'.$i.'</option>';
								}
							?>
						</select>
						시
						<select name="minite" id="minite">
							<option value="00">00</option>
							<option value="30">30</option>
						</select>
						분
					</td>
				</tr>
				<tr>
					<th><label for="amount">예약인원</label></th>
					<td><input type="text" name="amount" id="amount" disabled="disabled" max="200" min="1" value="1"/></td>
					<th>예약가능 인원</th>
					<td class="total-amount">200명</td>
				</tr>
			</table>
			<div class="move-box">
				<input type="button" value="예약확인" />
				<input type="submit" value="예약하기" />
			</div>
		</form>
	</div>
</section>