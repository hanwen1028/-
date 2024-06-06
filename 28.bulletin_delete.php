<?php
    // 隱藏錯誤報告
    error_reporting(0);
    // 開始或繼續現有的會話
    session_start();
    // 如果 $_SESSION["id"] 未被設置，即未登入，則輸出請先登入的訊息並將瀏覽器重定向到登入頁面
    if (!$_SESSION["id"]) {
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    } else {
        // 建立與資料庫的連結
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 建立 SQL 指令，用於刪除指定佈告
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        // 執行 SQL 指令，刪除佈告
        if (!mysqli_query($conn,$sql)){
            // 如果執行失敗，輸出刪除錯誤訊息
            echo "佈告刪除錯誤";
        } else {
            // 如果執行成功，輸出刪除成功訊息
            echo "佈告刪除成功";
        }
        // 在3秒後重新導向到佈告欄列表頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
