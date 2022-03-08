<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>臺北大學通訊工程學系</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link href="/bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/article.css" />
	<link rel="stylesheet" href="/assets/css/common.css" />
	<noscript>
		<link rel="stylesheet" href="/assets/css/noscript.css" />
	</noscript>
</head>

<?php //include "./editor/connect.php"; 
?>

<body class="">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<style>
		.left-col {
			font-size: 0.65rem;
			padding: 0.2rem 0.25rem;
			background-color: #f5f5f5;
		}

		.left-col>a {
			padding: 0.1rem 0 0 1rem;
			background-color: inherit;
		}

		a {
			color: #3b7bb9;
			text-decoration: none !important;
		}

		#content {
			padding: 0 1rem 0 1rem;
		}

		#content * {
			margin: 0;
			padding: 0;
			/* border: 0; */
			font-size: 0.6rem;
			line-height: 1rem;
			vertical-align: middle;
		}

		#content td {
			border: inherit !important;
		}
	</style>

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/mods/basic/top_banner.php"; ?>

		<?php include $_SERVER['DOCUMENT_ROOT'] . ("/mods/basic/navbar.php"); ?>

		<!-- Main -->
		<div id="main">

			<!-- Carousel -->
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/mods/basic/logo_banner.php"; ?>

			<!-- Block the area in 3:6:3 -->
			<section id="main-infomation" style="padding-top: 1rem">
				<div class="container-fluid">
					<div class="row">
						<!-- Left -->
						<div class="col-3"><?php include $_SERVER['DOCUMENT_ROOT'] . "/mods/basic/intro.php"; ?></div>
						<!-- Right -->
						<div class="col-9" id="content">
							<?php
							include $_SERVER['DOCUMENT_ROOT'] . "/mods/utils.php";
							$link = sql_connect();

							$usage = $_GET['usage'];
							$class = $_GET['class'];

							$sql = "SELECT COUNT(*) as total FROM post WHERE class=$class AND enable=1;";
							$res = sql_query($link, $sql);
							if(sql_fetch($res)['total'] == 1){
								$sql = "SELECT * as total FROM post WHERE class=$class AND enable=1;";
								$res = sql_query($link, $sql);
								$row = sql_fetch($res);
								include $_SERVER['DOCUMENT_ROOT'] . "/editor/doc/" . $row['content'] . ".php";
							}else{

							}

							switch ($usage) {
								case 'nav':
									include $_SERVER['DOCUMENT_ROOT'] . "/editor/doc/nav_item/" . $id . ".php";
									// $url = "/editor/doc/nav_item/" . $id . ".php";
									// echo "<iframe id='fcontent' src='$url' scrolling='auto' height='100%' frameborder='0' width='100%'></iframe>";
									break;
								default:
									break;
							}
							?>

						</div>
					</div>
				</div>
			</section>
		</div>

		<?php include $_SERVER['DOCUMENT_ROOT'] . '/mods/basic/footer.php'; ?>
		<!-- Scripts -->
		<script src="/bootstrap-5.1.0-dist/js/popper.min.js"></script>
		<script src="/bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/jquery.scrollex.min.js"></script>
		<script src="/assets/js/jquery.scrolly.min.js"></script>
		<script src="/assets/js/browser.min.js"></script>
		<script src="/assets/js/breakpoints.min.js"></script>
		<script src="/assets/js/util.js"></script>
		<script src="/assets/js/main.js"></script>
		<script src="/assets/js/common.js"></script>
		<script type="text/javascript">
			// function setIframeHeight(iframe) {
			// 	if (iframe) {
			// 		var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
			// 		if (iframeWin.document.body) {
			// 			iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
			// 		}
			// 	}
			// };

			// window.onload = function() {
			// 	setIframeHeight(document.getElementById('fcontent'));
			// };
		</script>

</body>

<?php

// function get_eng_index($item, $zh){
//     if(isEng()){
//         global $json;
//         $index = $json['index'];
//         echo $index[$item];

//     }else{
//         echo $zh;
//     }
// }

?>

</html>