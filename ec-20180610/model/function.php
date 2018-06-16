<?php

// 定数
require_once 'conf/const.php';


function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}


/**
 * ホワイトスペースを取り除き空文字か判定
 * @param string $str
 * @return boolean
 */
function isEmpty($str) {
    // mb_convert_kana カナを("全角かな"、"半角かな"等に)変換する
    // s	「全角」スペースを「半角」に変換します（U+3000 -> U+0020）。
    // S	「半角」スペースを「全角」に変換します（U+0020 -> U+3000）。
    $r = mb_convert_kana( trim( mb_convert_kana( $str , 's') ) ,'S');
    if('' === $r) {
        return true;
    } else {
        return false;
    }
}

/**
 * ＰＯＳＴのパラメータをホワイトスペースを取り除き取得する
 * @param string $str
 * @return mixed|string
 */
function isParam($str) {
    if(isset($_POST[$str]) === TRUE) {
        $r = preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $_POST[$str]);
        return $r;
    } else {
        return '';
    }
}

/**
 * ＰＯＳＴのパラメータから半角の数値入力を取得する
 * @param string $str
 * @param number $code
 * @throws InvalidArgumentException
 * @return number
 */
function numberParam( $str , $code = 0 ) {

    if( isset($str) ) {
        $r =  preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $str);
        if( ctype_digit($r) ) {
            return intval($r);
        }
    }
    throw new InvalidArgumentException('半角英数字で整数の値を入力してください',$code);
}

/**
 * ＰＯＳＴのパラメータから文字列入力を取得する
 * @param string $str
 * @param number $code
 * @throws InvalidArgumentException
 * @return mixed
 */
function stringParam( $str , $code = 0 , $min = 1, $max = 255) {
    if( isset($str) ) {
        $r =  preg_replace('/\A[　\s]*|[ \s]*\z/u', '', $str);
        if (mb_strlen($r) >= $min && mb_strlen($r) <= $max) {
            return $r;
        }
        if (mb_strlen($r) < $min) {
            throw new LengthException($min.'文字以上入力してください' , $code);
        }

        if (mb_strlen($r) > $max) {
            throw new LengthException($max. '文字以下入力してください' , $code);
        }

    }
    throw new LengthException('文字列を入力してください',$code);
}

function uploadFile( $str , $dir , $code = 0) {
    $message = 'ファイルを選択してください';
    if (is_uploaded_file($_FILES[$str]['tmp_name'])) {
        // アップロードされたファイルが存在する
        $image_type = exif_imagetype($_FILES[$str]['tmp_name']);
        // 画像のファイル形式を検査
        if($image_type === IMAGETYPE_JPEG || $image_type === IMAGETYPE_PNG) {
            // ユニークなファイル名を生成
            $filename = $dir . uniqid("IMG_");
            // 同名ファイルが存在するかどうか検査
            if (is_file($filename) !== TRUE) {
                if (move_uploaded_file($_FILES[$str]['tmp_name'], $filename)) {
                    return $filename;
                } else {
                    $message = 'ファイルアップロードに失敗しました';
                }
            } else {
                $message = 'ファイルアップロードに失敗しました。再度お試しください';
            }
        } else {
            $message = '画像ファイルは「JPEG」、「PNG」のみ利用可能です';
        }
    }
    throw new LengthException($message,$code);
}

/**
 * DBハンドルを取得
 * @return PDO $dbh DBハンドル
 */
function getDbConnect(){
    // MySQL用のDSN文字列
    $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset='.DB_CHARACTER_SET;
    try {
        // データベースに接続
        $dbh = new PDO($dsn, DB_USER, DB_PASSWR, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        // データベースに接続できない
        return null;
    }
    return $dbh;
}

