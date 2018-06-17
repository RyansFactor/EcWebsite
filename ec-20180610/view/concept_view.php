<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>コンセプト</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="./html5reset-1.6.1.css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/concept.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
	integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
	crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans"
	rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />

 <!--ドロップダウンメニューのJquery -->
 <script
 	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="./view/js/ec.js"></script>


</head>

<body>

	<!-- ヘッダーを固定するために、ヘッダーを包んでいるdiv -->
	<div class="headerFixed">
		<header>

			<a href="./top.php"><img src="./img/logo.jpg"></a>
			<div class="menu">
				<ul>
					<li><a href="./concept.php">CONCEPT</a></li>
					<li><a href="./news.php">NEWS</a></li>
					<li><a href="./item_contr.php">ITEM</a></li>
					<li><a href="./contact_contr.php">CONTACT</a></li>
				</ul>
			</div>
			<div class="printName">
			<?php print $userName.'様';?>
		</div>

                <div class="cartIcon">
				<a href="./cart_contr.php"><i class="fas fa-shopping-cart"></i></a>
				</div>
				<div class="dropMenu">
					<ul class="drop">
						<li class="userIcon"><i class="fas fa-user-circle"></i></a>

							<ul class="dropSub">
								<li><a href="./user_contr.php">新規会員登録</a></li>
								<li><a href="./user_change_contr.php">会員情報変更</a></li>
								<li><a href="./user_login_contr.php">ログイン</a></li>
								<li><form method="POST">
										<input type="submit" name="submit" value="ログアウト">
									</form></li>
							</ul></li>
					</ul>
				</div>



		</header>
	</div>


<main class="concept">
	<h2>かっこよくて、<br>かわいいTシャツが、欲しい。</h2>

	<div class="conceptComment">
			<p>Tシャツ欲しいですーーーーーーーーーーーーーーーーーーーー</p>
			<p>
情に棹させば流される。智に働けば角が立つ。どこへ越しても住みにくいと悟った時、詩が生れて、画が出来る。とかくに人の世は住みにくい。意地を通せば窮屈だ。
とかくに人の世は住みにくい。
どこへ越しても住みにくいと悟った時、詩が生れて、画が出来る。意地を通せば窮屈だ。山路を登りながら、こう考えた。智に働けば角が立つ。どこへ越しても住みにくいと悟った時、詩が生れて、画が出来る。智に働けば角が立つ。
とかくに人の世は住みにくい。山路を登りながら、こう考えた。とかくに人の世は住みにくい。住みにくさが高じると、安い所へ引き越したくなる。住みにくさが高じると、安い所へ引き越したくなる。情に棹させば流される。
意地を通せば窮屈だ。住みにくさが高じると、安い所へ引き越したくなる。意地を通せば窮屈だ。
とかくに人の世は住みにくい。とかくに人の世は住みにくい。住みにくさが高じると、安い所へ引き越したくなる。山路を登りながら、こう考えた。
情に棹させば流される。智に働けば角が立つ。どこへ越しても住みにくいと悟った時、詩が生れて、画が出来る。とかくに人の世は住みにくい。意地を通せば窮屈だ。
とかくに人の世は住みにくい。
どこへ越しても住みにくいと悟った時、詩が生れて、画が出来る。意地を通せば窮屈だ。山路を登りながら、こう考えた。智に働けば角が立つ。どこへ越しても住みにくいと悟った時、詩が生れて、画が出来る。智に働けば角が立つ。
情に棹させば流される。智に働けば角が立つ。どこへ越しても住みにくいと悟った</p>
		</div>


</main>
	<footer>
		<p><small>Copyright &copy; sago All Right Reserved.</small></p>
	</footer>


</body>