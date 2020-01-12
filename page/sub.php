<div class="sub">
	<div class="sub_back"></div>
</div>
<section class="content">

	<header>
		<ul>
			<?php
				foreach(menuModel::$menu as $key => $val){
					$class = $key === $_GET['controller']? 'active' : '';
					echo '<li><a href="/view/'.$key.'/'.$key.'" class="'.$class.'">'.$val.'</a></li>';
				}
				if($_SESSION['id'] === 'admin' ){
					$class = 'admin' === $_GET['controller']? 'active' : '';
					echo '<li><a href="/view/admin/admin" class="'.$class.'">ADMIN</a></li>';
				}
			?>
		</ul>
	</header>
	<aside>
		<a href="/view"><img src="/static/img/home.png" alt="home" title="home" /></a>
		<a href="/view">HOME</a>
		&gt;
		<strong><?php echo @menuModel::$menu[$_GET['controller']];?></strong>
	</aside>
	<section class="now-content">
		<?php
			if(is_file(PAGE.$_GET['controller'].'/'.$_GET['method'].'.php')){
				include PAGE.$_GET['controller'].'/'.$_GET['method'].'.php';
			}else echo '컨텐츠가 없습니다.';
		?>
	</section>

</section>