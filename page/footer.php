	<footer>
		<section id="footer">
			<p>Copy Right QUIABEIR RESTAURANTE GOURMET reserved all rights.</p>
			<div>
				<span><img src="/static/img/icon1.png" alt="icon" title="icon" /></span>
				<span><img src="/static/img/icon2.png" alt="icon" title="icon" /></span>
				<span><img src="/static/img/icon3.png" alt="icon" title="icon" /></span>
			</div>
		</section>
	</footer>
	<section class="login" title="LOGIN">
		<form action="/action/user/login" method="post">
			<div>
				<dl>
					<dt><label for="l_id">I D</label></dt>
					<dd><input type="text" name="l_id" id="l_id" autocomplete="off" required="required" /></dd>
				</dl>
				<dl>
					<dt><label for="l_pw">PW</label></dt>
					<dd><input type="password" name="l_pw" id="l_pw" autocomplete="off" required="required"/></dd>
				</dl>
				<input type="submit" value="LOGIN" />
			</div>
		</form>
	</section>
	<section class="join" title="JOIN">
		<form action="/action/user/join" method="post">
			<p>아래 모든 입력사항은 필수 입력사항 입니다.</p>
			<table>
				<tr>
					<th><label for="name">이름</label></th>
					<td><input type="text" id="name" name="name" /></td>
				</tr>
				<tr>
					<th><label for="j_id">I D</label></th>
					<td>
						<input type="text" id="j_id" name="j_id"  autocomplete="off"/>
						<p style="color:red" class="id_chk">아이디는 영문으로 시작해야하며, 5~16글자 사이로 만들어주세요.</p>
					</td>
				</tr>
				<tr>
					<th><label for="j_pw">PW</label></th>
					<td>
						<input type="password" id="j_pw" name="j_pw" autocomplete="off" />
						<p style="color:red" class="pw_chk">비밀번호에 !,@,#중 하나를 넣어주세요.</p>
					</td>
				</tr>
				<tr>
					<th><label for="mail">e-mail</label></th>
					<td><input type="email" id="mail" name="mail" /></td>
				</tr>
				<tr class="auto">
					<th><label for="auto">자동가입방지</label></th>
					<td>
						<canvas width="150" height="80"></canvas>
						<input type="button" value="새로고침" />
						<input type="text" id="auto" />
					</td>
				</tr>
			</table>
			<div class="move-box">
				<input type="submit" value="확인" />
				<input type="button" value="취소" />
			</div>
		</form>
	</section>
  </section>
  </body>
  </html>