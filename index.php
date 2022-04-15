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
	<link href="./bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/common.css" />
	<link rel="icon" href="/images/icon.jpg" type="image/x-icon" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<?php //include "./editor/connect.php"; 
?>

<body class="">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<style>
		.right-col {
			padding: 0.5rem;
		}

		.left-col {
			font-size: 0.65rem;
			padding: 0.2rem 0;
			background-color: #f5f5f5;
		}

		.left-col>a {
			padding: 0.1rem 0 0 1rem;
			background-color: inherit;
			color: #2a6aa8;
		}

		.mid-col {
			font-size: 0.6rem;
			padding: 0.2rem 0.25rem;
			background-color: #f5f5f5;
			margin-bottom: 0.9rem;
		}

		.mid-col>li {
			padding: 0.1rem 0.1rem;
			background-color: inherit;
		}

		.alert {
			padding: 0.33rem;
			margin: 0.2rem 0;
		}

		.lm>div {
			margin-bottom: 1rem;
		}

		#info-wrapper>div {
			padding: 0 0.5rem 0 0;
		}

		#info-wrapper {
			margin-right: -2rem;
		}

		.post-item {
			display: inline-block;
			white-space: nowrap;
			overflow: hidden;
		}

		.post-item>a {
			color: #2a6aa8;
			text-align: left !important;
		}

		#navPanel {
			display: block;
		}

		small {
			font-size: 0.5rem;
		}
	</style>

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">
		<?php include "./mods/basic/top_banner.php"; ?>

		<?php include("./mods/basic/navbar.php"); ?>

		<!-- Main -->
		<div id="main">

			<!-- Carousel -->
			<?php include "./mods/basic/logo_banner.php"; ?>

			<!-- Block the area in 3:9 -->
			<div id="main-infomation" style="padding-top: 1rem">
				<div class="container-fluid">
					<div class="row m-0">
						<!-- Left -->
						<div class="col-sm-12 col-md-3 lm px-md-1 px-0">
							<?php include "./mods/basic/leftcol.php"; ?>
							<?php include "./mods/basic/intro.php"; ?>
						</div>
						<!-- Middle -->
						<div class="col-sm-12 col-md-9 px-md-1 px-0">

							<!-- 公告區 -->
							<div class="container-fluid">
								<div class="row" id="info-wrapper">
									<?php
									$link = sql_connect();
									$sql = "SELECT * FROM class INNER JOIN mods ON mods.id=class.mods AND mods.name='info';";
									$result = sql_query($link, $sql);
									while ($row = sql_fetch($result)) {
									?>
										<div class="col-md-6 col-sm-12">
											<div id="announcement" class="mid-col">
												<div class="alert alert-light d-flex justify-content-between" role="alert">
													<div>
														<?php echo $row['title']; ?>
													</div>
													<div>
														<a href="<?php
																	// Use $row[0] to avoid selecting mods' id
																	echo '/mods/basic/content.php?class=' . $row[0]; ?>" class="alert-link">more</a>
													</div>
												</div>
												<ul class="list-group list-group-flush mid-col">
													<?php
													$id = $row[0];
													$sql = "SELECT * FROM post WHERE class=$id AND enable=1 ORDER BY published DESC LIMIT 5;";
													$res = sql_query($link, $sql);
													while ($row2 = sql_fetch($res)) {
														$title = $row2['title'];
														$pid = $row2['id'];
														$published = explode(' ', $row2['published'])[0];
														echo "<li class='list-group-item d-flex flex-row post-item'>
																<small>$published&ensp;&ensp;</small>
															<a href='/mods/basic/post.php?id=$pid' name='info' title='$title'>$title</a>
															</li>";
													}
													?>
												</ul>
											</div>
										</div>
									<?php
									}
									sql_disconnect($link);
									?>
								</div>
							</div>

							<!--形象影片 -->
							<iframe width="100%" height="300rem" src="https://www.youtube-nocookie.com/embed/zxJTcWSAjiY?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include './mods/basic/footer.php'; ?>
		<!-- Scripts -->
		<script src="./bootstrap-5.1.0-dist/js/popper.min.js"></script>
		<script src="./bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrollex.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/common.js"></script>

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