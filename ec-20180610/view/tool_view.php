<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>商品管理</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="html5reset-1.6.1(1).css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/tool.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
	integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
	crossorigin="anonymous">
</head>

<body class="toolView">

	<h1>商品管理画面</h1>
<?php print $result_msg; ?>
<form method="POST" enctype="multipart/form-data">
		<input type="hidden" name="sql_kind" value="itemInsert">
		<table class="toolTable">
			<tr class="toolTableBack">
				<th>商品画像1</th>
				<th>商品画像2</th>
				<th>商品名</th>
				<th>価格</th>
				<th>サイズ</th>
				<th>在庫数</th>
				<th>色</th>
				<th>ステータス</th>
				<th>処理ボタン</th>
			</tr>

			<tr>
				<td><input type="file" name="img1"></td>
				<td><input type="file" name="img2"></td>
				<td><input type="text" name="name" value=""></td>
				<td><input type="number" name="price" value=""></td>
				<td><select name="size">
						<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
				</select></td>
				<td><input type="number" name="stock" value=""></td>
				<td><select name="color">
						<option value="Black">Black</option>
						<option value="Gray">Gray</option>
						<option value="Red">Red</option>
						<option value="Pink">Pink</option>
						<option value="Orange">Orange</option>
						<option value="Yellow">Yellow</option>
						<option value="Green">Green</option>
						<option value="Lightblue">Lightblue</option>
						<option value="blue">blue</option>
						<option value="white">white</option>
				</select></td>
				<td><select name="status">
						<option value="0">入会</option>
						<option value="1">退会済み</option>
				</select></td>
				<td><input type="submit" value="商品を追加"></td>
			</tr>
			<tr>
				<th class="toolTableBack">コメント</th>
				<td colspan="8"><textarea name="comment" rows="10" cols="120"
						value=""></textarea></td>
			</tr>
		</table>
<hr>
<table>
<?php

        foreach ($data as $items) : ?>

			<tr>
				<td><img src="<?php echo $items->getImg1(); ?>"></td>
				<td><img src="<?php echo $items->getImg2(); ?>"></td>
				<td><?php echo $items->getName(); ?></td>
				<td><input type="number" name="updatePrice" value="<?php echo $items->getPrice(); ?>">円</td>
				<td><?php echo $items->getSize(); ?></td>
				<td><input type="number" name="updatePrice" value="<?php echo $items->getStock(); ?>">個</td>
				<td><?php echo $items->getColor(); ?></td>
				<td>
				<?php if ($items->getStatus() == 0 ) { ?>
        		<input type="submit" value="非公開 → 公開">
<?php } else { ?>
        		<input type="submit" value="公開 → 非公開">
<?php } ?>
<!-- 						<option value="0">非公開</option> -->
<!-- 						<option value="1">公開</option> -->
</td>
				<td><input type="submit" value="変更"></td>
			</tr>

			<tr>
				<th class="toolTableBack">コメント</th>
				<td colspan="8"><?php echo $items->getComment(); ?></td>
			</tr>

		<?php endforeach;
     ?>
</table>
	</form>
</body>
</html>