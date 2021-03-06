<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="./html5reset-1.6.1.css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/user.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
	integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
	crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans"
	rel="stylesheet">


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
			<?php if($userName !== '') {
			         print $userName.'様';
			      }
			?>
		</div>

                <div class="cartIcon">
				<a href="./cart_contr.php"><i class="fas fa-shopping-cart"></i></a>
				</div>
				<div class="dropMenu">
					<ul class="drop">
						<li class="userIcon"><i class="fas fa-user-circle"></i></a>
							<ul class="dropSub">


								<?php if($userName !== '') {?>
								<li><a href="./user_change_contr.php">会員情報変更</a></li>
								<li><a href="./top.php?param=logout">ログアウト</a></li>
										<?php } else { ?>
								<li><a href="./user_contr.php">新規会員登録</a></li>
								<li><a href="./user_login_contr.php">ログイン</a></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</div>



		</header>
	</div>


	<main>

		<div class="userTable">
		<h2>ログイン</h2>
		<?php print $errorMessage; ?>
			<form method="post">
			<table>
				<tr>
					<th>メールアドレス</th>
					<td><input type="email" name="userId" value=""></td>
				</tr>
				<tr>
					<th>パスワード</th>
					<td><input type="password" name="password" value=""></td>
				</tr>

				</table>
				<input type="submit" name="submit" value="ログインする">
 			</form>
		</div>

	</main>

	<footer>
		<p><small>Copyright &copy; sago All Right Reserved.</small></p>
	</footer>

</body>
</html>