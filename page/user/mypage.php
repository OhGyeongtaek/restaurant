<section class="mypage">
	<table>
		<thead>
			<tr>
				<th>예약자</th>
				<th>예약일</th>
				<th>예약시간</th>
				<th>인원수</th>
			
			</tr>
		</thead>
		<tbody>
			<?php foreach($list as $key => $val){?>
			<tr>
				<td><?php echo $val['name']?></td>
				<td><?php echo $val['date']?></td>
				<td><?php echo $val['time']?></td>
				<td><?php echo $val['amount']?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</section>