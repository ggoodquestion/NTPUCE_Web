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
		.left-col{
			font-size: 0.65rem;
			padding: 0.2rem 0.25rem;
			background-color: #f5f5f5;
		}

		.left-col > a{
			padding: 0.1rem 0 0 1rem;
			background-color: inherit;
		}

		.right-col{
			padding: 0.5rem;
		}

		.right-col > div{
			padding: 0.3rem;
			margin-bottom: 1rem;
			background-color: #f5f5f5;
		}

		.welcome{
			font-size: 0.65rem;
			line-height: 0.8rem;
		}
	</style>

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
			<div id="carouselBanner" class="carousel slide" data-bs-ride="carousel" style="padding: 0rem">
				<div class="carousel-indicators" style="margin-bottom: -0.3rem">
					<button type="button" data-bs-target="#carouselBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="./images/ntpu.gif" class="d-block w-100" alt="...">
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
							<p>
							<video>
									<source src="https://www.youtube.com/watch?v=zxJTcWSAjiY"></source>
								</vedio>
							</p>

							<!--系辦公告 -->
							<div id="announcement" class="container-fluid"  >
								<div class="alert alert-primary d-flex justify-content-between container-fluid"  role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush container-fluid">
									<li class="list-group-item "><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
								</ul>
							</div>
							<br/>
							<!--招生快訊  -->
							<div id="student" class="container-fluid"  >
								<div class="alert alert-primary d-flex justify-content-between container-fluid"  role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush container-fluid">
									<li class="list-group-item "><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
								</ul>
							</div>
							<br/>
							<!-- 學術活動 -->
							<div id="academic" class="container-fluid"  >
								<div class="alert alert-primary d-flex justify-content-between container-fluid"  role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush container-fluid">
									<li class="list-group-item "><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
								</ul>
							</div>
							<br/>
							<!-- 課務訊息 -->
							<div id="lesson" class="container-fluid"  >
								<div class="alert alert-primary d-flex justify-content-between container-fluid"  role="alert">
									<div>
										系辦公告
									</div>
									<div></div>
									<div>
										<a href="#" class="alert-link">more</a>
									</div>
								</div>
								<ul class="list-group list-group-flush container-fluid">
									<li class="list-group-item "><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
  									<li class="list-group-item"><a href="#" class="list-group-item ">A third link item</a></li>
								</ul>
							</div>
						</div>

						<!-- Right -->
						<div class="col-3 right-col">
							<div style="line-height: 1.5rem">
								<img src="./images/seo-title-1.gif">
								<img src="./images/seo-title-2.gif">
								<p class="welcome">國立臺北大學通訊工程學系前身為國立台北大學通訊工程研究所，
									於2004年成立，位於南港軟體園區、中研院及新竹科學園區間，
									三峽交流道旁，為台灣高科技產業的中心點。本系主要發展通訊
									高科技產業，強調獨立思考及創新設計能力之訓練，並要求學生
									參與研究計畫，以驗證所學和獲取經驗，同時培養理論與實務兼
									備、人文與科技整合的高級人才。發展方向為通訊系統設計、通
									訊晶片設計、網路交換、數位訊號處理、多媒體通訊等相關技術。
									近年積極參與工程科技教育認證(IEET)，並於2010年通過認證。
									目前設有通訊工程學士班、碩士班、資通科技產業碩士專班、及國際學生碩士班。</p>
							</div>
							<div>
								<p><video controls>
									<source src="https://www.youtube.com/watch?v=zxJTcWSAjiY"></source>
								</vedio></p>
							</div>
							<div>
								<p>hello</p>
							</div>

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