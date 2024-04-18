<?php
    # 使用 mysqli_connect() 函數建立與資料庫的連結
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    # 使用 mysqli_query() 函數向資料庫發送查詢
    $result=mysqli_query($conn, "select * from user");
    # 使用 mysqli_fetch_array() 函數從查詢結果中一次抓取一行資料
    $row=mysqli_fetch_array($result);
    # 輸出第一行資料的 id 和 pwd 欄位值
    echo $row["id"] . " " . $row["pwd"]."<br>"; 
    # 重新使用 mysqli_fetch_array() 函數抓取下一行資料
    $row=mysqli_fetch_array($result);
    # 輸出第二行資料的 id 和 pwd 欄位值
    echo $row["id"] . " " . $row["pwd"];
?>
