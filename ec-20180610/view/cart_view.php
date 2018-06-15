<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CART</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="html5reset-1.6.1(1).css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/cart.css">
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
<h2>カート</h2>
	<form method="post">


<table class="cartItem">
	<tr class="userToolBack">
	<th></th>
	<th>品名</th>
	<th>サイズ</th>
	<th>数量</th>
	<th>価格</th>
	<th></th>
	</tr>

	<tr>
		<td class="cartImg"><img src="<?php print $items->getImg1(); ?>"></td>
		<td><?php print $items->getName(); ?></td>
		<td><select name="size">
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    </select>
    <td>	<select name="orderPiece">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
     <option value="4">4</option>
      <option value="5">5</option>
    </select></td>
    <td><?php print $items->getPrice(); ?>円</td>
    <td>
    <div class="button">
	<a href="#"><i class="fas fa-times-circle"></i>
	商品をカートから<br>削除する</a></div>
	<div class="button"><a href="#"><i class="fas fa-undo-alt"></i>サイズ・数量を<br>変更する</a>
	</div>
</table>

<hr>



<div>
<table class="sum">
	<tr>
	<th>小計</th>　
	<td>0000円</td>
	</tr>
	<tr>
	<th>消費税</th>
	<td>0000円</td>
	</tr>
	<tr>
	<th>合計</th>　
	<td>0000円</td>
	<tr>

<td><div class="buyButton">
	<input type="submit" name="buy" value="購入を確定する">
</div></td>
</tr>

</table>
</div>
</main>



	<footer>
		<p><small>Copyright &copy; sago All Right Reserved.</small></p>
	</footer>

</body>
</html>