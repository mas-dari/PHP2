<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$name = $_POST['name'];
$dateOfBirth = $_POST['dateOfBirth'];
$postalCode = $_POST['postalCode'];
$address = $_POST['address'];
$telephoneNumber = $_POST['telephoneNumber'];
$mail = $_POST['mail'];
$highSchool = $_POST['highSchool'];
$university = $_POST['university'];
$companyName = $_POST['companyName'];
$companyName2 = $_POST['companyName2'];
$companyName3 = $_POST['companyName3'];

//2. DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=gs_db3;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}
//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("
    INSERT INTO
        gs_an_table(name, dateOfBirth,postalCode,address,telephoneNumber,mail,highSchool,university,companyName,companyName2,companyName3)
    VALUES (
        :name, :dateOfBirth, :postalCode, :address, :telephoneNumber, :mail, :highSchool, :university, :companyName, :companyName2, :companyName3
        )");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':dateOfBirth', $dateOfBirth, PDO::PARAM_STR);
$stmt->bindValue(':postalCode', $postalCode, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':telephoneNumber', $telephoneNumber, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':highSchool', $highSchool, PDO::PARAM_STR);
$stmt->bindValue(':university', $university, PDO::PARAM_STR);
$stmt->bindValue(':companyName', $companyName, PDO::PARAM_STR);
$stmt->bindValue(':companyName2', $companyName2, PDO::PARAM_STR);
$stmt->bindValue(':companyName3', $companyName3, PDO::PARAM_STR);

// //  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    //５．index.phpへリダイレクト
    // 成功した場合
    header('Location: index.php');
}