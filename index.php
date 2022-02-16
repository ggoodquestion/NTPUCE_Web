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

	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">

		<div id="top">
			<div class="px-1 pt-1">
				<a><img src="./images/logo-3.png" class="image fit" style="margin-bottom:0 !important"></a>
				<div>
					<ul id="ul-top" align="right">
						<li><a>English</a></li>
						<li><a>聯絡我們</a></li>
						<li><a href="https://new.ntpu.edu.tw/" target="_blank">臺北大學</a></li>
					</ul>
				</div>
			</div>
		</div>

		<?php include("./templates/navbar.php"); ?>

		<!-- Main -->
		<div id="main">

			<!-- Carousel -->
			<div id="carouselExampleIndicators" class="carousel slide home-banner" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="./images/logo-3.png" class="d-block w-100" alt="...">
					</div>
				</div>
				<a class="carousel-control-prev" data-bs-target="#carouselIndicators" data-bs-slide="prev" role="button" id="carousel-prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</a>
				<a class="carousel-control-next" data-bs-target="#carouselIndicators" data-bs-slide="next" role="button" id="carousel-next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</a>
			</div>

			<!-- Block the area in 3:6:3 -->
			<section id="main-infomation">
				<div class="container">
					<div class="row">
						<!-- Left -->
						<div class="col-3">
							<div class="list group">
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
							<!--系辦公告 -->
							<div id="announcement" class="dark">
								<div class="alert alert-primary" role="alert">
									系辦公告 <a href="#" class="alert-link">more</a>.
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
								</div>
							</div>
							<!--招生快訊  -->
							<div id="student">
								<div class="alert alert-primary" role="alert">
									招生快訊 <a href="#" class="alert-link">more</a>.
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
								</div>
							</div>
							<!-- 學術活動 -->
							<div id="academic">
								<div class="alert alert-primary" role="alert">
									學術活動 <a href="#" class="alert-link">more</a>.
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
								</div>
							</div>
							<!-- 課務訊息 -->
							<div id="lesson">
								<div class="alert alert-primary" role="alert">
									課務訊息 <a href="#" class="alert-link">more</a>.
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
									<a href="#" class="list-group-item list-group-item-action">A third link item</a>
								</div>
							</div>
						</div>

						<!-- Right -->
						<div class="col-3">
							<p>hello</p>
							<p>title</p>
							<p>index</p>

						</div>
					</div>
				</div>
			</section>
		</div>

		<?php include './templates/footer.php'; ?>
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