<?php
    # 隱藏錯誤報告
    error_reporting(0);
    # 開始或繼續現有的會話
    session_start();
    # 如果 $_SESSION["id"] 未被設置，即未登入，則輸出請先登入的訊息並將瀏覽器重定向到登入頁面
    if (!$_SESSION["id"]) {
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        # 如果已登入，則輸出歡迎訊息和相應操作連結
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        # 建立與資料庫的連結
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        # 從資料庫查詢佈告資料
        $result=mysqli_query($conn, "select * from bulletin");
        # 輸出一個HTML表格，顯示佈告資料
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        # 使用 while 迴圈逐行輸出佈告資料
        while ($row=mysqli_fetch_array($result)){
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        # 輸出HTML表格結束標籤
        echo "</table>";
    
    }

?>
