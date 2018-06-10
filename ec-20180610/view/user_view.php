<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>新規会員登録</title>
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
		○○ ○○○ 様
		</div>
		<div class="icon">
			<a href="./cart_contr.php"><i class="fas fa-shopping-cart"></i></a>
			<a href="./user_contr.php"><i class="fas fa-user-circle"></i></a>
		</div>


	</header>
	</div>


	<main>

		<div class="userTable">
		<h2>新規会員登録</h2>
		<p>※マークは入力必須項目です。</p>
		<?php print $result_msg;
foreach ($err_msg as $message) {
    print $message;?><br><?php
}
    print $userId;
    print $password;
    print $name;
    print $tel;
    print $postalCode;
    print $prefecture;
    print $adress1;
    print $adress2; ?>

			<form method="post">
			<input type="hidden" name="sql_kind" value="regist">
			<table>
				<tr>
					<th>メールアドレス<small>※</small></th>
					<td><input type="email" name="userId" value="<?php print $user->getUserId(); ?>"><br>
					<small><span>登録のアドレスがユーザーIDとなります。</span></small></td>
				</tr>
				<tr>
					<th>パスワード<small>※</small>
					</th>
					<td><input type="password" name="password" value="<?php print $user->getPassword(); ?>"><br>
					<small><span>パスワードは半角英数字8文字以上16文字以内で入力してください。</span></small></td>
				</tr>
				<tr>
					<th>お名前<small>※</small></th>
					<td><input type="text" name="name" value="<?php print $user->getName(); ?>"></td>
				</tr>

				<tr>
					<th>お電話番号<small>※</small></th>
					<td><input type="tel" name="tel" value="<?php print $user->getTel(); ?>"></td>
				</tr>
				<tr>
					<th>郵便番号<small>※</small></th>
					<td><input type="text" name="postalCode" value="<?php print $user->getPostalCode(); ?>"></td>
				</tr>
				<tr>
					<th>都道府県<small>※</small></th>
				<td><select name="prefecture">
<option value="" selected>都道府県</option>
<option value="1">北海道</option>
<option value="2">青森県</option>
<option value="3">岩手県</option>
<option value="4">宮城県</option>
<option value="5">秋田県</option>
<option value="6">山形県</option>
<option value="7">福島県</option>
<option value="8">茨城県</option>
<option value="9">栃木県</option>
<option value="10">群馬県</option>
<option value="11">埼玉県</option>
<option value="12">千葉県</option>
<option value="13">東京都</option>
<option value="14">神奈川県</option>
<option value="15">新潟県</option>
<option value="16">富山県</option>
<option value="17">石川県</option>
<option value="18">福井県</option>
<option value="19">山梨県</option>
<option value="20">長野県</option>
<option value="21">岐阜県</option>
<option value="22">静岡県</option>
<option value="23">愛知県</option>
<option value="24">三重県</option>
<option value="25">滋賀県</option>
<option value="26">京都府</option>
<option value="27">大阪府</option>
<option value="28">兵庫県</option>
<option value="29">奈良県</option>
<option value="30">和歌山県</option>
<option value="31">鳥取県</option>
<option value="32">島根県</option>
<option value="33">岡山県</option>
<option value="34">広島県</option>
<option value="35">山口県</option>
<option value="36">徳島県</option>
<option value="37">香川県</option>
<option value="38">愛媛県</option>
<option value="39">高知県</option>
<option value="40">福岡県</option>
<option value="41">佐賀県</option>
<option value="42">長崎県</option>
<option value="43">熊本県</option>
<option value="44">大分県</option>
<option value="45">宮崎県</option>
<option value="46">鹿児島県</option>
<option value="47">沖縄県</option>
</select>
</td>

				<tr>
					<th>ご住所<small>※</small></th>
					<td><input type="text" name="adress1" value="<?php print $user->getAdress1(); ?>"></td>
				</tr>
				<tr>
					<th>マンション・建物名</th>
					<td><input type="text" name="adress2" value="<?php print $user->getAdress2(); ?>"></td>
				</tr>
				</table>
				<input type="submit" name="submit" value="登録する">
 			</form>
		</div>

	</main>

	<footer>
		<p><small>Copyright &copy; sago All Right Reserved.</small></p>
	</footer>

</body>
</html>