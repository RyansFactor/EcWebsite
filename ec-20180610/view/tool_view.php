<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>商品管理</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="html5reset-1.6.1.css">
<link rel="stylesheet" href="./view/css/tool.css">

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
						<option value="1">公開</option>
						<option value="0">非公開</option>
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
			<form method="post">
				<td><img src="<?php echo $items->getImg1(); ?>"></td>
				<td><img src="<?php echo $items->getImg2(); ?>"></td>
				<td><?php echo $items->getName(); ?></td>
				<td><input type="number" name="updatePrice" value="<?php echo $items->getPrice(); ?>">円</td>
				<td><?php echo $items->getSize(); ?></td>
				<td><input type="number" name="updateStock" value="<?php echo $items->getStock(); ?>">個</td>
				<td><?php echo $items->getColor(); ?></td>
				<td>
				<select name="updateStatus">
				<?php if ($items->getStatus() == 0 ) { ?>
							<option value="0" selected>非公開</option>
        					<option value="1">公開</option>

				<?php } else { ?>
							<option value="0">非公開</option>
        					<option value="1" selected>公開</option>
				<?php } ?>
				</select>
				</td>
				<td class="tdSubmit">
				<input type="submit" value="変更">
				<input type="hidden" name="sql_kind" value="itemUpdate">
				<input type="hidden" name="item_id" value="<?php echo $items->getItem_id(); ?>">
				</td>

			</form>
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