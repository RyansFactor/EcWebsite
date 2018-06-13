<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="html5reset-1.6.1(1).css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/user.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
</head>

<body>

<!-- ヘッダーを固定するために、ヘッダーを包んでいるdiv -->
<div class="headerFixed">
	<header>

		<a href="./view/top_view.php"><img src="./img/logo.jpg"></a>
		<div class="menu">
		<ul>
			<li><a href="./view/concept_view.php">CONCEPT</a></li>
			<li><a href="./view/news_view.php">NEWS</a></li>
			<li><a href="./item_contr.php">ITEM</a></li>
			<li><a href="./contact_contr.php">CONTACT</a></li>
		</ul>
		</div>
		<div class="printName">

		</div>
		<div class="icon">
			<a href="./cart_contr.php"><i class="fas fa-shopping-cart"></i></a>
			<a href="./user_contr.php"><i class="fas fa-user-circle"></i></a>
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