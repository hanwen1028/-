<?php

// 隱藏錯誤報告
error_reporting(0);
// 開始或繼續現有的會話
session_start();
// 如果 $_SESSION["id"] 未被設置，即未登入，則輸出請先登入的訊息並將瀏覽器重定向到登入頁面
if (!$_SESSION["id"]) {
    echo "請登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
} else {    

   // 使用 mysqli_connect() 函數建立與資料庫的連結
   $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   // 新增資料SQL命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
   $sql = "insert into user(id,pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";
   // 執行SQL命令，檢查是否成功
   if (!mysqli_query($conn, $sql)) {
     // 如果執行失敗，輸出錯誤訊息
     echo "新增命令錯誤";
   } else {
     // 如果執行成功，輸出成功訊息並將瀏覽器重定向到管理使用者頁面
     echo "新增使用者成功，三秒鐘後回到網頁";
     echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
   }
}
?>
