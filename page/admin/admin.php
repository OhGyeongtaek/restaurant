<section class="admin">
	<div class="datepicker"></div>
	<div class="canvas-val"></div>
	<div>
		<select name="" id="">
			<option value="2014">2014</option>
			<option value="2015" selected>2015</option>
			<option value="2016">2016</option>
		</select>
	</div>
	<canvas width="900" height="300"></canvas>
	<section class="time-table" title="예약변경">
		<form action="/action/admin/update" method="post">
			<div class="reserve-list"></div>
			<ul class="table-view">
			<?php
				for($i=18;$i<=21;$i++){
					echo '<li data-time="'.$i.':00"><strong>'.$i.':00</strong><div></div></li>';
					if($i>=21) break;
					echo '<li data-time="'.$i.':30"><strong>'.$i.':30</strong><div></div></li>';
				}
			?>
			</ul>
			<div class="move-box">
				<input type="submit" value="변경" />
				<input type="button" value="닫기" />
			</div>
		</form>
	</section>
</section>