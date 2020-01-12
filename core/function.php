<?php
	function script($txt,$type,$url=""){
		switch($type){
			case "return" : $url = $_SERVER['HTTP_REFERER']; break;
			case "main" : $url = "/view"; break;
		}

		echo '	<script>
					alert("'.$txt.'");
					location.href="'.$url.'"
				</script>';
	}