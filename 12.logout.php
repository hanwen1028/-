<?php
    // 開始或繼續現有的會話
    session_start();
    // 刪除會話變數 "id"
    unset($_SESSION["id"]);
    // 輸出登出成功的訊息
    echo "登出成功....";
    // 使用 meta 標籤延遲 3 秒後跳轉到登入頁面 "2.login.html"
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
