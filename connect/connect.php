<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php連線資料庫</title>
    <style>
        *{
            box-sizing: border-box;
        }
        h1,h2,h3,h4{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>php連線資料庫</h1>
<?php
//============以下是mysqli_connect

//$conn=mysqli_connect('localhost','root','','school02'); //$conn=mysqli_connect('localhost','wrong_user','my_db');

//$sql="SELECT `students`.*,`dept`.`code`,`dept`.`name` as `科目` FROM //`students`,`dept` WHERE `dept`.`id`=`students`.`dept`";

//$query=mysqli_query($conn,$sql);
//$rows=mysqli_fetch_all($query,MYSQLI_BOTH);

//=============以下是PDO connect

$dsn="mysql:host=localhost;charset=utf8;dbname=school02"; //建立資料庫基本資料，主要是資料庫系統名稱，主機名稱，使用的資料庫等等資訊

$pdo=new PDO($dsn,'root',''); //使用new 語法來建立一個PDO連線物件，並將這個物件指定給一個變數

$sql="SELECT `students`.*,`dept`.`code`,`dept`.`name` as `科目` FROM `students`,`dept` WHERE `dept`.`id`=`students`.`dept`"; //撈資料

$rows=$pdo->query($sql)->fetchAll(); //以函式取得回傳值並指定給變數

//$pdo->query($sql)->fetchAll(FETCH_ASSOC) => 只回傳帶欄位名稱的資料
//$pdo->query($sql)->fetchAll(FETCH_NUM) => 只回傳帶欄位索引的資料
//$pdo->query($sql)->fetchColumn($n) =>返回該筆資料中指定欄位的資料，$n為欄位的索引值(0,1,2…)

//$pdo->exec($sql) => 不返回資料，而是返回影響的資料筆數，適合使用在新增，更新或刪除資料時

//$pdo->prepare($sql) => 用來建立一個SQL語句的模板，把參數獨立出來
//$pdo->execute($sql) => 執行 preare()語法中準備的模板，並把參數代入

//var_dump($query);


echo "<pre>";
print_r($rows);
echo "</pre>";

//echo $rows[0][3];
//echo "<br>";
//echo $rows[0]["birthday"];

?>
</body>
</html>