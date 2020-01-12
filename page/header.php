<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="restaurant, menus, find us,음식,고기,스테이크">
  <meta name="Description" content="Quiabeiro Restaurante Gourmet에 오신 것을 환영합니다.">
  <link rel="stylesheet" href="/static/css/ui.css" />
  <link rel="stylesheet" href="/static/css/common.css" />
  <link rel="stylesheet" href="/static/css/<?php echo $link?>.css" />
  <script type="text/javascript" src="/static/js/jquery.js"></script>
  <script type="text/javascript" src="/static/js/ui.js"></script>
  <script type="text/javascript" src="/static/js/js.js"></script>
  <title>Quiabeiro Restaurante Gourmet</title>
 </head>
 <body>
  <section id="wrap-body">
	<header>
		<section id="header">
			<h1><a href="/view"><img src="/static/img/logo.png" title="logo" alt="logo"></a></h1>
			<section>
				<div>
					<?php if(empty($_SESSION['id'])){ ?>
					<a href="login">LOGIN</a>
					<a href="join">JOIN</a>
					<?php }else{?>
					<span><?php echo $_SESSION['user']['name']?>님 환영합니다.</span>
					<a href="/view/user/mypage" class="logout">MYPAGE</a>
					<a href="/action/user/logout" class="logout">LOGOUT</a>
					<?php } ?>
				</div>
				<nav>
					<ul>
						<?php
							foreach(menuModel::$menu as $key => $val){
								echo '<li><a href="/view/'.$key.'/'.$key.'">'.$val.'</a></li>';
							}
							if($_SESSION['id'] === 'admin' )
								echo '<li><a href="/view/admin/admin">ADMIN</a></li>';
						?>
					</ul>
				</nav>
			</section>
		</section>
	</header>