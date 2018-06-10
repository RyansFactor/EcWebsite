<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ユーザー一覧</title>
<!--リセットは上に書く-->
<link rel="styeleshet" href="html5reset-1.6.1(1).css">
<link rel="stylesheet" href="./view/css/header_.css">
<link rel="stylesheet" href="./view/css/user_tool.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body class="toolView">
<h1>ユーザー一覧</h1>


<table class="ToolTable">
      <tr class="userToolBack">
        <th>ユーザーID(メールアドレス）</th>
         <th>名前</th>
        <th>パスワード</th>
        <th>電話番号</th>
        <th>郵便番号</th>
        <th>都道府県</th>
        <th>住所</th>
        <th>建物マンション名</th>
        <th>ステータス</th>
        <th>登録日時</th>
        <th>更新日時</th>

      </tr>


<?php foreach ( $data as $user) :?>
      <tr class="userToolBack2">
      	<td><?php print h($user->getUserId()); ?></td>
      	<td><?php print h($user->getName()); ?></td>
      	<td><?php print h($user->getPassword()); ?></td>
      	<td><?php print h($user->getTel()); ?></td>
      	<td><?php print h($user->getPostalCode()); ?></td>
      	<td><?php print h($user->getPrefecture()); ?></td>
      	<td><?php print h($user->getAdress1()); ?></td>
      	<td><?php print h($user->getAdress2()); ?></td>
		<td><?php print h($user->getStatus()); ?></td>
		<td><?php print h($user->getCreateDatetime()); ?></td>
		<td><?php print h($user->getUpdateDatetime()); ?></td>
      </tr>
      <?php endforeach; ?>
</table>
</body>
</html>