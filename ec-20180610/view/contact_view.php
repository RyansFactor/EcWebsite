<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CONTACT</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="html5reset-1.6.1(1).css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/contact.css">
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
		○○ ○○○ 様
		</div>
		<div class="icon">
			<a href="./cart_contr.php"><i class="fas fa-shopping-cart"></i></a>
			<a href="./user_contr.php"><i class="fas fa-user-circle"></i></a>
		</div>


	</header>
	</div>


	<main>
		<h2>お問い合わせ</h2>
		<?php print $result_msg;
foreach ($err_msg as $message) {
    print $message;?><br><?php
}
       print $name;
       print $email;
       print $tel;
       print $comment; ?>

			<form method="post">
			<input type="hidden" name="sql_kind" value="ask">
			<ul>
				<li><label>お名前</label><input type="text" name="name" value="<?php print $contact->getName(); ?>"></li>
				<li><label>メールアドレス</label><input type="email" name="email" value="<?php print $contact->getEmail(); ?>"></li>
				<li><label>お電話番号</label><input type="tel" name="tel" value="<?php print $contact->getTel(); ?>"></li>
				<li><label>お問い合わせ内容</label><textarea name="comment" rows="20" cols="60" value="<?php print $contact->getComment(); ?>"></textarea>
		</li>
				<li style="text-align:center"><input type="submit" name="submit" value="送信" formnovalidate></li>
			</ul>

 			</form>


	</main>

	<footer>
		<p><small>Copyright &copy; sago All Right Reserved.</small></p>
	</footer>

</body>
</html>