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
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        // 執行 SQL 指令，更新佈告的標題、內容、時間和類型
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")) {
            // 如果執行失敗，輸出錯誤訊息
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        } else {
            // 如果執行成功，輸出成功訊息並在3秒後跳轉到佈告欄列表頁面
            echo "修改成功，三秒鐘後回到佈告欄列表";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
