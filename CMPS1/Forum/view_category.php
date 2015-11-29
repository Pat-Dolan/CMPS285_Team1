
<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="home/home.controller.js"></script>
    <script src="login/login.controller.js"></script>
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
        $logged = "<p><a href='/CMPS1/forum/create_topic.php?cid=".$cid."'>Click Here To Create a Topic</a></p>";
        $sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
        $res = mysqli_query($myConnection,$sql) or die(mysqli_error());
        $topic = "";
        $topics = "";

        function mysqli_result($result,$row=0,$col=0){
            $numrows = mysqli_num_rows($result);
            if ($numrows && $row <= ($numrows-1) && $row >=0){
                mysqli_data_seek($result,$row);
                $resrow = (is_numeric($col)) ? mysqli_fetch_row($result) : mysqli_fetch_assoc($result);
                if (isset($resrow[$col])){
                    return $resrow[$col];
                }
            }
            return false;
        }

        function reply_count($cid,$tid){
            $host = "localhost";
            $username = "code";
            $password = "code5";
            $db = "code5";

            $myConnection = mysqli_connect($host,$username,$password, $db) or die(mysqli_error());
            $sql4 = "SELECT COUNT(*) FROM posts WHERE category_id = '".$cid."' AND topic_id = '".$tid."'";
            $reply_count =mysqli_result(mysqli_query($myConnection,$sql4))-1;
            return $reply_count;
        }


        if(mysqli_num_rows($res) == 1) {
            $sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
            $res2 = mysqli_query($myConnection,$sql2) or die(mysqli_error());
            if(mysqli_num_rows($res2)>0){
                $topics .= "<table width='100%' style='border-collapse: collapse;'>";
                $topics .= "<tr><td colspan='3'><a href='/CMPS1/'>Return to forum index.</a>".$logged."<hr /></td></tr>";
                $topics .= "<tr style='background-color: #dddddd;'><td>Topic Title</td><td width='65' align='center'>Replies</td><td width='65' align=
                            'center'>Views</td></tr>";
                $topic .= "<tr><td colspan='3'><hr /></td></tr>";
                while ($row = mysqli_fetch_assoc($res2)){
                    $tid = $row['id'];

                    $title = $row['topic_title'];
                    $views = $row['topic_views'];
                    $date = $row['topic_date'];
                    //$creator = $row['topic_creator'];
                    $creator = "<div id='{{vm.getUsername()}}'</div>";
                    $topics .= "<tr><td><a href='/CMPS1/forum/view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br />
                    <span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".reply_count($cid,$tid)."</td><td align='center'>
                    ".$views."</td></tr>";
                    $topics .= "<tr><td colspan='3'><hr /></td></tr>";
                }
                    $topics .= "</table>";
                    echo $topics;

            } else{
                echo "<a href='/CMPS1/#/'>Return </a><hr />";
                echo "<p>There are no topics in this category yet.".$logged."</p>";
            }
        } else{
            echo "<a href='/CMPS1/#/'>Return </a><hr />";
            echo "<p>You are trying to view a category that does not exist yet.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>