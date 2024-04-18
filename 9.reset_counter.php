<?php
    # 開始或繼續現有的會話
    session_start();
    # 刪除名為 "counter" 的會話變數
    unset($_SESSION["counter"]);
    # 輸出重置成功的訊息
    echo "counter重置成功....";
    # 使用 meta 標籤重定向瀏覽器到另一個網址，延遲 2 秒後跳轉到 "8.counter.php" 頁面
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";
?>
