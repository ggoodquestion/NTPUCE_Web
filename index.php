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

<?php include "./editor/connect.php"; ?>

<body class="">
	<!-- Wrapper -->
	<div id="wrapper" class="fade-in">


		<!-- Intro -->
		<!-- <div id="intro">
			<img src="./images/banner_logo.png" class="logo-img" />
			<br />
			<br />
			<h2>Center of Innovation & Entrepreneurship</h2>
			<p>
				本中心主要培育國立臺北大學創業團隊，透過專業課程學習、專業人士交流、創新創意活動舉辦
				<br />，協助進駐團隊建立可行的商業模式並發展具體的行銷策略。
			</p>
			<ul class="actions">
				<li><a href="#nav" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
			</ul>
		</div> -->

		<?php include("./templates/navbar.php");
		include("./templates/post_list.php"); ?>

		<!-- Main -->
		<div id="main">
			<section>
				<div class="row">
					<div class="col">
						<div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-indicators">
								<?php
								$sql = "SELECT COUNT(*) as total FROM banner WHERE enable=1 ;";
								$result = mysql_query($sql);
								if (!$result) exit(mysql_error($link));
								$row = mysql_fetch_row($result);
								$banner_total = $row[0];
								echo "<button type='button' data-bs-target='#carouselIndicators' data-bs-slide-to='0' class='active'></button>";
								for ($i = 1; $i < $banner_total; $i++) {
									echo "<button type='button' data-bs-target='#carouselIndicators' data-bs-slide-to='$i' class=''></button>";
								}
								?>
							</div>
							<div class="carousel-inner">
								<?php
								$sql = "SELECT * FROM banner WHERE enable=1 ORDER BY date desc;";
								$result = mysql_query($sql);
								if (!$result) exit(mysql_error($link));
								$first = true;
								while ($row = mysql_fetch_row($result)) {
									$href = $row[3];
									$hImg = $row[1];
									if ($first == true) echo "<div class='carousel-item active'>";
									else echo "<div class='carousel-item'>";
									if ($href == "") echo "<img src='$hImg' class='d-block w-100'></div>";
									else echo "<a href='$href' target='_blank'><img src='$hImg' class='d-block w-100'></a></div>";
									$first = false;
								}
								?>
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
					</div>
				</div>

				<div class="row">
					<div class="col-lg-8 mb-md-5 mt-5">
						<header class="align-left">
							<h2 class="ms-4"><?php get_eng_index("news", "最新消息") ?></h2>
						</header>
						<div class="news-survey"">
							<ul class=" list-group">
								<div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1">
								<?php
								$borad_num = 6;
								$board_in_row = 3;
								$num_in_row = 0;
								$cut_text_len = 50;
								$sql = "SELECT * FROM article WHERE category = 'notice' OR category = 'activity' OR category = 'tidbits' OR category = 'competition' OR category = 'resource' "
									   ."ORDER BY top desc, date desc LIMIT $borad_num;";
								$result = mysql_query($sql);
								if (!$result) exit(mysql_error($link));
								for ($i = 0; $i < $borad_num && $row = mysql_fetch_row($result); $i++) {
									if ($num_in_row == 0) {
									}
									$num_in_row++;
									$title = $row[1];
									$id = $row[0];
									$content = $row[2];
									$date = explode(" ", $row[4]);
									$cover = $row[7];
									if (mb_strlen($content) > $cut_text_len) {
										$content = mb_substr($content, 0, $cut_text_len, "utf-8") . "...";
									}
									if (empty($cover)) {
										$cover = "../images/bg.jpg";
									}
									echo '<div class="col ">';
									createPostSurveyViewForHome($title, $content, $date[0], "../post/article.php?id=$id", $cover);
									echo '</div>';

									$num_in_row %= $board_in_row;
									if ($num_in_row == 0) {
										// echo '</div><br/>';
									}
								}

								if ($num_in_row != 0) {
									// echo '</div>';
								}
								?>
								</div>
							</ul>
						</div>
					</div>

					<div class="col-lg mb-5 mt-md-5">
						<ul class="nav nav-tabs" id="infoTabs" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" id="resource-tab" data-bs-toggle="tab" data-bs-target="#project" type="button" role="tab" aria-controls="project" aria-selected="true"><?php get_eng_index("plan", "補助計畫") ?></a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" id="competition-tab" data-bs-toggle="tab" data-bs-target="#competition" type="button" role="tab" aria-controls="competition" aria-selected="false"><?php get_eng_index("compition", "競賽資訊") ?></a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="project" role="tabpanel" aria-labelledby="resource-tab">
								<ul class="list-group list-group-flush">
									<?php
									$sql = "SELECT * FROM article WHERE category = 'resource' ORDER BY top desc, date desc LIMIT 7;";
									$result = mysql_query($sql);
									if (!$result) exit(mysql_error($link));

									while ($row = mysql_fetch_row($result)) {
										$content = $row[2];
										if (mb_strlen($content) > 50) {
											$content = mb_substr($content, 0, 50, "utf-8") . "...";
										}
									?>
										<li class="list-group-item clipboard">
											<h4><a href="./post/article.php?id=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a></h4>
											<p class="news-pre"><?php echo $content; ?></p>
										</li>
									<?php
									}
									?>
								</ul>
							</div>
							<div class="tab-pane fade" id="competition" role="tabpanel" aria-labelledby="competition-tab">
								<ul class="list-group list-group-flush">
									<?php
									$sql = "SELECT * FROM article WHERE category = 'competition' ORDER BY top desc, date desc LIMIT 7;";
									$result = mysql_query($sql);
									if (!$result) exit(mysql_error($link));

									while ($row = mysql_fetch_row($result)) {
										$content = $row[2];
										if (mb_strlen($content) > 50) {
											$content = mb_substr($content, 0, 50, "utf-8") . "...";
										}
									?>
										<li class="list-group-item clipboard">
											<h4><a href="./post/article.php?id=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a></h4>
											<p class="news-pre" style="margin-bottom: 0;"><?php echo $content; ?></p>
										</li>
									<?php
									}
									?>
								</ul>
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

function get_eng_index($item, $zh){
    if(isEng()){
        global $json;
        $index = $json['index'];
        echo $index[$item];
        
    }else{
        echo $zh;
    }
}
?>

</html>