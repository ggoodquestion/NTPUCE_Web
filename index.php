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
			<a><img src="./images/logo-3.png" class="image fit px-1 pt-1"></a>
			<div>
				<ul id="ul-top">
					<li><a>English</a></li>
					<li><a>聯絡我們</a></li>
					<li><a>臺北大學</a></li>
				</ul>
			</div>
		</div>

		<?php include("./templates/navbar.php"); ?>

		<!-- Main -->
		<div id="main">

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
							<div id="announcement" class="container-fluid" style="border:2px black solid" >
								<div class="alert alert-primary d-flex justify-content-between container-fluid"  role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item "><a href="#" class="list-group-item list-group-item-action">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item list-group-item-action">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item list-group-item-action">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item list-group-item-action">A third link item</a></li>
								</ul>
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