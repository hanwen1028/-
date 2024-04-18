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
   # 根據登入狀態輸出相應的訊息
   if ($login==TRUE)
     echo "登入成功";
  else
     echo "帳號/密碼 錯誤";
?>
