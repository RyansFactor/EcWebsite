<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Tee</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="./html5reset-1.6.1.css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/top.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
	integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
	crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans"
	rel="stylesheet">
<link rel="stylesheet" type="text/css"
	href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript"
	src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
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
					<li><a href="./view/concept_view.php">CONCEPT</a></li>
					<li><a href="./view/news_view.php">NEWS</a></li>
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
						<li class="userIcon"><a href="./user_contr.php"><i class="fas fa-user-circle"></i></a>

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


	<main class="topMain">
	<div class="slide">
		<div class="slideSub">
			<div>
				<img src="./img/top.jpg">
			</div>
			<div>2</div>
			<div>3</div>
			</div>
		</div>
		<h2>NEW ITEM</h2>
		<div class="newItem">
			<table>

				<tr>
					<td><img src="./img/121409642_o1.jpg"></td>
					<td><img src="./img/121409642_o1.jpg"></td>
					<td><img src="./img/121409642_o1.jpg"></td>
					<td><img src="./img/121409642_o1.jpg"></td>
				</tr>

			</table>
		</div>
		<div>
			<h2>INSTA</h2>
		</div>

	</main>

	<footer>
		<p>
			<small>Copyright &copy; sago All Right Reserved.</small>
		</p>
	</footer>

</body>
</html>