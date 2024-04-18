<?php
   # 使用 mysqli_connect() 函數建立與資料庫的連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   # 使用 mysqli_query() 函數向資料庫發送查詢
   $result=mysqli_query($conn, "select * from user");
   # 使用 mysqli_fetch_array() 函數從查詢結果中逐行抓取資料
   $login=FALSE;
   while ($row=mysqli_fetch_array($result)) {
     # 檢查使用者提交的帳號和密碼是否與資料庫中的相符
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) {
       # 如果相符，設置登入狀態為真
       $login=TRUE;
     }
   } 
   # 如果登入成功，則建立並開始新的會話
   if ($login==TRUE) {
    session_start();
    # 將使用者的帳號存入會話變數中
    $_SESSION["id"]=$_POST["id"];
    # 輸出登入成功的訊息
    echo "登入成功";
    # 使用 meta 標籤延遲 3 秒後跳轉到 "11.bulletin.php" 頁面
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
   }
   # 如果登入失敗，則輸出帳號/密碼錯誤的訊息
  else{
    echo "帳號/密碼 錯誤";
    # 使用 meta 標籤延遲 3 秒後跳轉到 "2.login.html" 頁面
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
  }
?>
