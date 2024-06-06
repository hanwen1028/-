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
        // 從資料庫中取得要編輯的佈告資料
        $result = mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        $row = mysqli_fetch_array($result);
        // 初始化變數，用於設置佈告類型的選擇狀態
        $checked1 = "";
        $checked2 = "";
        $checked3 = "";
        // 根據佈告類型設置對應的選擇狀態
        if ($row['type'] == 1)
            $checked1 = "checked";
        if ($row['type'] == 2)
            $checked2 = "checked";
        if ($row['type'] == 3)
            $checked3 = "checked";
        // 輸出編輯佈告的表單
        echo "
        <html>
            <head><title>編輯佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
