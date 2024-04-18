<?php
    # 開始或繼續現有的會話
    session_start();
    # 如果 $_SESSION["counter"] 變數未被設置，則將其設置為1
    if (!isset($_SESSION["counter"]))
        $_SESSION["counter"]=1;
    else
        # 否則，增加計數器變數的值
        $_SESSION["counter"]++;

    # 輸出計數器變數的值
    echo "counter=".$_SESSION["counter"];
    # 輸出重置計數器的超連結
    echo "<br><a href=9.reset_counter.php>重置counter</a>";
?>
