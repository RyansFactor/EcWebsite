<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CONCEPT</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="./view/css/html5reset-1.6.1.css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/item.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
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
		○○ ○○○ 様
		</div>
		<div class="icon">
			<a href="./cart_contr.php"><i class="fas fa-shopping-cart"></i></a>
			<a href="./user_contr.php"><i class="fas fa-user-circle"></i></a>
		</div>


	</header>
	</div>


	<main>
	<div class="itemFlex">
		<nav class="color">
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
			<h2>ITEM</h2>

			<div class="articleItem">
						<?php

        foreach ($data as $items) : ?>

			<a href="../ec-20180610/itemDetail_contr.php?item_id=<?php echo $items->getItem_id(); ?>">
			<div class="items">
				<img src="<?php echo $items->getImg1(); ?>">
				<div><p><?php echo $items->getPrice(); ?>yen</p></div>
			</div>
 			</a>


<!-- 			<div class="items"> -->
<!-- 				<img src="./img/121409642_o1.jpg"> -->
<!-- 				<div><p>3,000yen</p></div> -->
<!-- 			</div> -->
<!-- 			<div class="items"> -->
<!-- 				<img src="./img/121409642_o1.jpg"> -->
<!-- 				<div><p>3,000yen</p></div> -->
<!-- 			</div> -->
<script>
document.itemForm.btn.addEventListener('click', function() {

    document.myform.submit();

});
</script>
<?php endforeach; ?>
			</div>

		</article>

	</div>
	</main>

	<footer>
		<p><small>Copyright &copy; sago All Right Reserved.</small></p>
	</footer>

</body>
</html>