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
			padding: 0.2rem 0.25rem;
			background-color: #f5f5f5;
		}

		.left-col>a {
			padding: 0.1rem 0 0 1rem;
			background-color: inherit;
		}

		.mid-col {
			font-size: 0.65rem;
			;
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
	</style>

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">
		<?php include "./mods/basic/top_banner.php"; ?>

		<?php include("./mods/navbar.php"); ?>

		<!-- Main -->
		<div id="main">

			<!-- Carousel -->
			<?php include "./mods/basic/logo_banner.php"; ?>

			<!-- Block the area in 3:6:3 -->
			<section id="main-infomation" style="padding-top: 1rem">
				<div class="container-fluid">
					<div class="row">
						<!-- Left -->
						<div class="col-3">
							<div class="list-group list-group-flush left-col">
								<a href="#" class="list-group-item list-group-item-action">新生專區</a>
								<a href="#" class="list-group-item list-group-item-action">競賽資訊</a>
								<a href="#" class="list-group-item list-group-item-action">專題製作</a>
								<a href="#" class="list-group-item list-group-item-action">學分學程/微學程</a>
								<a href="#" class="list-group-item list-group-item-action">獎學金</a>
								<a href="#" class="list-group-item list-group-item-action">系友專區</a>
								<a href="#" class="list-group-item list-group-item-action">通訊系學會</a>
								<a href="#" class="list-group-item list-group-item-action">相片集錦</a>
								<a href="#" class="list-group-item list-group-item-action">大學程式能力檢定</a>
								<a href="#" class="list-group-item list-group-item-action">榮譽榜</a>
								<a href="#" class="list-group-item list-group-item-action">問與答</a>
							</div>
						</div>
						<!-- Middle -->
						<div class="col-6">
							<!--形象影片 -->
							<iframe width="100%" height="300rem" src="https://www.youtube-nocookie.com/embed/zxJTcWSAjiY?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

							<!--系辦公告 -->
							<div id="announcement" class="container-fluid mid-col ">
								<div class="alert alert-light d-flex justify-content-between" role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush container-fluid mid-col">
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
								</ul>
							</div>
							<!--招生快訊  -->
							<div id="student" class="container-fluid mid-col ">
								<div class="alert alert-light d-flex justify-content-between" role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush container-fluid mid-col">
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
								</ul>
							</div>
							<!-- 學術活動 -->
							<div id="academic" class="container-fluid mid-col ">
								<div class="alert alert-light d-flex justify-content-between" role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush container-fluid mid-col">
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
								</ul>
							</div>
							<!-- 課務訊息 -->
							<div id="lesson" class="container-fluid mid-col ">
								<div class="alert alert-light d-flex justify-content-between" role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush mid-col">
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
									<li class="list-group-item "><a href="#">A third link item</a></li>
								</ul>
							</div>
						</div>

						<!-- Right -->
						<?php include "./mods/basic/intro.php"; ?>
					</div>
				</div>
			</section>
		</div>

		<?php include './mods/footer.php'; ?>
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