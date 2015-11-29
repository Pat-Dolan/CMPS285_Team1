<script src="home/home.controller.js"></script>
<script src="login/login.controller.js"></script>
<?php
session_start();
include_once("connect.php");
    if(isset($_POST['reply_submit'])){
        $creator = "<html>
                    {{vm.getUsername()}}
                    </html>";
        $cid = $_POST['cid'];
        $tid = $_POST['tid'];
        $reply_content = $_POST['reply_content'];
        $sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."','".$tid."','".$creator."',
        '".$reply_content."',now())";
        $res = mysqli_query($myConnection,$sql) or die;
        $sql2 = "UPDATE categories SET last_post_date=now(),last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
        $res2 = mysqli_query($myConnection,$sql2) or die(mysqli_error());
        $sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
        $res3 = mysqli_query($myConnection,$sql3) or die(mysqli_error());

        if (($res) && ($res2) && ($res3)){
            echo  header("Location:/CMPS1/forum/view_topic.php?cid=".rawurlencode($cid)."&tid=".
                rawurlencode($tid));
        } else{
            echo "<p>There was a problem posting your reply. Try again later.</p>";
        }
    } else{
        exit();
    }
?>

