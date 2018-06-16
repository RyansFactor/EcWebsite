<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CONTACT</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="html5reset-1.6.1(1).css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/itemDetail.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
	integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
	crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans"
	rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css"
	rel="stylesheet" />
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
		<?php print $userName.'様';?>
		</div>
			<div class="icon">
				<a href="./cart_contr.php"><i class="fas fa-shopping-cart"></i></a>
				<a href="./user_contr.php"><i class="fas fa-user-circle"></i></a>
			</div>


		</header>
	</div>


	<main>
	<div class="itemFlex">
		<nav>
			<h2>color</h2>
			<div class="colorSearch">
				<ul>
					<li><a href="#"><i class="fas fa-circle black"></i></a></li>
					<li><a href="#"><i class="fas fa-circle gray"></i></a></li>
					<li><a href="#"><i class="fas fa-circle red"></i></a></li>
					<li><a href="#"><i class="fas fa-circle pink"></i></a></li>
					<li><a href="#"><i class="fas fa-circle orange"></i></a></li>
					<li><a href="#"><i class="fas fa-circle yellow"></i></a></li>
					<li><a href="#"><i class="fas fa-circle green"></i></a></li>
					<li><a href="#"><i class="fas fa-circle lightblue"></i></a></li>
					<li><a href="#"><i class="fas fa-circle blue"></i></a></li>
					<li><a href="#"><i class="far fa-circle"></i></a></li>
				</ul>
			</div>

		</nav>

		<article>

			<div class="itemDetail">
				<div class="itemImg">
					<img src="<?php print $items->getImg1(); ?>" alt="">
				</div>

				<div class="itemDetailArticle">

					<h2><?php print$items->getName(); ?></h2>
					<p><?php print $items->getComment(); ?></p>
					<p></p>
					<p>
						<span class="price"><?php print $items->getPrice(); ?></span>（税抜）
					</p>
					<p>
						<?php print $items->getSize(); ?>
					</p>

					<?php
    if ($items->getStock() > 0) {

        if ($message === "") {
            ?>
					<form method="post" action="itemDetail_contr.php">
						<!-- 					カートへのinsert -->
						<input type="hidden" name="sql_kind" value="insert"> <input
							type="hidden" name="itemId" value="<?php print $items->getItem_id();?>">



						<input type="submit" name="submit" value="&#xf07a; カートに入れる">

					</form>
					<?php } else { ?>
					<p><?php print $message; ?></p>
					<?php } ?>
					<?php } else { ?>
					<p>売り切れ</p>

					<?php } ?>






				</div>

			</div>


		</article>
	</div>
	</main>

	<footer>
		<p>
			<small>Copyright &copy; sago All Right Reserved.</small>
		</p>
	</footer>

</body>
</html>