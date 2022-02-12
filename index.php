<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>台北大學創新創業中心</title>
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
			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="..." class="d-block w-100" alt="...">
					</div>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>

			<!-- Block the area in 3:6:3 -->
			<section id="main-infomation">
				<div class="container">
					<div class="row">
						<!-- Left -->
						<div class="col-3">
							<ul>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">新生專區</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">競賽資訊</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">專題製作</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">學分學程/微學程</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">獎學金</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">系友專區</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">通訊系學會</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">相片集錦</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">大學程式能力檢定</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">榮譽榜</a></li>
								<li><a href="http://www.ce.ntpu.edu.tw/files/2019.pdf" target="_blank">問與答</a></li>
							</ul>
						</div>
						<!-- Middle -->
						<div class="col-6">

							<div id="announcement"></div>
							<div id="student"></div>
							<div id="academic"></div>
							<div id="lesson"></div>
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