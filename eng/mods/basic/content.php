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
	<link rel="icon" href="/images/icon.jpg" type="image/x-icon" />
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
			padding: 0 0rem 0 0rem;
		}

		#content * {
			margin: 0;
			padding: 0;
			/* border: 0; */
			line-height: 1.5rem;
			vertical-align: middle;
		}

		/* #content td {
			border: inherit !important;
		} */

		.table-wrapper>table>tbody>tr>td {
			padding: 0 0 0 0.5rem;
		}

		.table-wrapper {
			padding-right: 1rem;
			font-size: 0.8rem;
		}

		hr {
			border-bottom-color: #555555 !important;
			margin: 0.3rem 0 !important;
			border-bottom: 0rem !important;
		}

		.link {
			font-size: 0.8rem;
			line-height: 0.5rem !important;
			color: #2a6aa8;
			text-decoration: none !important;
		}

		.s-txt {
			font-size: 0.6rem !important;
		}

		.tb {
			line-height: 1.2rem;
		}
	</style>

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/eng/mods/basic/top_banner.php"; ?>

		<?php include $_SERVER['DOCUMENT_ROOT'] . ("/eng/mods/basic/navbar.php"); ?>

		<!-- Main -->
		<div id="main">

			<!-- Carousel -->
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/eng/mods/basic/logo_banner.php"; ?>

			<!-- Block the area in 3:6:3 -->
			<section id="main-infomation" style="padding-top: 1rem">
				<div class="container-fluid">
					<div class="row m-0">
						<!-- Left -->
						<div class="col-sm-12 col-md-3 px-md-1 px-0"><?php include $_SERVER['DOCUMENT_ROOT'] . "/eng/mods/basic/intro.php"; ?></div>
						<!-- Right -->

						<?php
						// Utils is include in navbar.php
						$link = sql_connect();
						$usage = $_GET['usage'];
						$class = trim($_GET['class']);

						$sql = "SELECT * FROM post WHERE class=$class AND enable=1;";
						$res = sql_query($link, $sql);

						$count = 0;
						$data = array();
						while ($row = sql_fetch($res)) {
							$count++;
							$data[] = $row;
						}
						if ($count === 1) {
							$row = $data[0];
							if ($row['href'] != '') {
								$href = $row['href'];
								echo "<script>window.location.href = '$href';</script>";
							} else {
								echo '<link rel="stylesheet" href="/assets/css/article.css" />';

								echo '<div class="col-sm-12 col-md-9 pe-md-1 ps-md-3 px-0">';
								echo '<h3 class="title">' . $row['title'] . '</h3><hr/>';
								echo '<div id="content" class="mt-4">';
								include $_SERVER['DOCUMENT_ROOT'] . "/editor/doc/" . $row['content'] . ".php";
								echo '</div>';
							}
						} else {
							// 以下參數準備給分頁器使用
							$totalPage = ceil($count / 8);
							$currentPage = 1;
							if (isset($_GET['page'])) $currentPage = $_GET['page'];
							$main_url = "/eng/mods/basic/content.php?class=" . $class;
							$paramName = 'page';

							// 用SQL在查詢一次指定範圍的資料
							$start = ($currentPage - 1) * 8;
							$sql = "SELECT * FROM post WHERE class=$class AND enable=1 ORDER BY published DESC LIMIT $start, 8;";
							$res = sql_query($link, $sql);

							echo '<style>td {
								padding-top: 0.5rem !important;
								padding-bottom: 0.5rem !important;
							};</style>';

							echo '<link rel="stylesheet" href="/assets/css/main.css" />';
							echo '<div class="col-sm-12 col-md-9 p-3" id="">';
							echo '<div class="">
								<table>
									<thead>
										<tr>
											<th class="col-10">Title</th>
											<th class="col-2">Published</th>
										</tr>
									</thead>
									<tbody class="tb">';
							while ($row = sql_fetch($res)) {
								$ts = explode(" ", $row['published'])[0];
								echo "
										<tr class=''>
											<td><a class='link' href='/eng/mods/basic/post.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></td>
											<td><small class='s-txt'>" . $ts . "</small></td>
										</tr>";
							}
							echo '</tbody>
									</table>
								</div>';


							// Generate pagination by utils function
							echo '<div class="d-flex justify-content-center">';
							generatePagination($totalPage, $currentPage, $main_url, $paramName);
							echo '</div></div></div';
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

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/eng/mods/basic/footer.php'; ?>
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
		$("#content").find("img").each(function() {
			$(this).addClass("img-fluid");
		});
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