<?php
function connect_db(){
    //ホスト名、データベース名、文字コードの３つを定義する
    $host = 'mysql-container';
    $db = 'demo';
    $charset = 'utf8';
    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    //ユーザー名、パスワード
    $user = 'root';
    $pass = 'root';

    //オプション
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try{

        //上のデータを引数に入れて、PDOインスタンスを作成
        $pdo = new PDO($dsn, $user, $pass, $options);

    }catch(PDOException $e){
        echo $e->getMessage();
    }

    //PDOインスタンスを返す
    return $pdo;
}

//データベースと接続して、PDOインスタンスを取得
$pdo = connect_db();

//実行したいSQLを準備する
$sql = 'SELECT * FROM tab_a';
$stmt = $pdo->prepare($sql);

//SQLを実行
$stmt->execute();

//データベースの値を取得
$result = $stmt->fetchall();
print_r($result) ;

//実行したいSQLを準備する
?>