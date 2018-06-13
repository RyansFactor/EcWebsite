<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>商品管理</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="html5reset-1.6.1(1).css">
<link rel="stylesheet" href="./view/css/header.css">
<link rel="stylesheet" href="./view/css/tool.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body class="toolView">
<input type="hidden" name="itemInsert" value="">
<h1>商品管理画面</h1>
<?php print $result_msg; ?>
<form method="POST">
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
		<td><input type="file" name="newImg1"></td>
		<td><input type="file" name="newImg2"></td>
		<td><input type="text" name="newName" value=""></td>
		<td><input type="number" name="newPrice" value=""></td>
		<td><select name="size">
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    </select></td>
		<td><input type="number" name="newStock" value=""></td>
		<td><select name="newColor">
              <option value="0">非公開</option>
              <option value="1">公開</option>
          </select></td>
          <td><select name="newStatus">
              <option value="0">非公開</option>
              <option value="1">公開</option>
          </select></td>
		<td><input type="submit" value="商品を追加"></td>
	</tr>
      <tr>
      <th class="toolTableBack">コメント</th>
      <td colspan="8"><textarea name="newComment" rows="10" cols="120" value=""></textarea></td>
      </tr>



      <tr>
      	<td><img src="./img/121409642_o1.jpg"></td>
      	<td><img src="./img/121409642_o1.jpg"></td>
      	<td>Tシャツ</td>
      	<td><input type="number" name="updatePrice" value="">円</td>
      	<td>S</td>
      	<td><input type="number" name="updatePrice" value="">個</td>
      	<td>GRAY</td>
      	<td><select name="updateStatus">
              <option value="0">非公開</option>
              <option value="1">公開</option></td>
		<td><input type="submit" value="変更"></td>
      </tr>

      <tr>
      <th class="toolTableBack">コメント</th>
      <td colspan="8">コメントコメントコメントコメント</td>
      </tr>
</table>
</form>
</body>
</html>
</html>