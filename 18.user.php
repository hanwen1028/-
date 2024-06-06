<html>
    <head><title>使用者管理</title></head>
    <body>
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
            // 如果已登入，則顯示使用者管理頁面
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            // 建立與資料庫的連結
            $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
            // 從資料庫查詢使用者資料
            $result = mysqli_query($conn, "select * from user");
            // 使用 while 迴圈逐行輸出使用者資料
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            // 輸出HTML表格結束標籤
            echo "</table>";
        }
    ?> 
    </bod
