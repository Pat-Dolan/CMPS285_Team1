<?php session_start(); ?>
<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Forum Topic</title>
    <link rel="stylesheet" type="text/css" href="/CMPS1/css/bills.css"/>
</head>

<body>
<div id="wrapper">
    <h2>SGA Connect Forum</h2>

    <hr/>
    <div id="content">
        <?php
        include_once("connect.php");
        $cid = $_GET['cid'];
        $tid = $_GET['tid'];
        $sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
        $res = mysqli_query($myConnection,$sql) or die(mysqli_error());
        if (mysqli_num_rows($res) == 1){
            echo "<table width='100%'>";
            echo "<p><a href='view_category.php?cid=2'><h3>Return to Topic</h3></a></p>";
            while($row = mysqli_fetch_assoc($res)){
                $sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
                $res2 = mysqli_query($myConnection,$sql2) or die(mysqli_error());
                while($row2 = mysqli_fetch_assoc($res2)) {
                    echo "<tr>
                              <td valign='top' style='border: 1px solid #000000;'>
                                <div style='min-height: 125px;'>".$row['topic_title']."<br /> - "
                                    .$row2['post_date']."<hr/>".$row2['post_content']."
                                 </div>
                              </td>
                          </tr>
                          <tr>
                             <td colspan='2'><hr/>
                             </td>
                           </tr>";
                }
                echo "<tr><td colspan='2'><input type='submit' value='Add Reply' onClick=\"window.location='post_reply.php?cid="
                    .rawurlencode($cid)."&tid=".rawurlencode($tid)."'\"/><hr />";
                $old_views = $row['topic_views'];
                $new_views = $old_views +1 ;
                $sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
                $res3 = mysqli_query($myConnection,$sql3) or die(mysqli_error());
            } echo "</table>";
        } else{
            echo "<p>This topic does not exist yet.</p>";
        }

        ?>

    </div>
</div>
</body>
</html>