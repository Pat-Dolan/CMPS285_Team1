<?php
session_start();
include_once("connect.php");
if(isset($_POST['topic_submit'])) {
    if (($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")) {
        echo "You did not fill in both fields. Please return to the previous page.";
        exit();
    } else {
        $cid = $_POST['cid'];
        $title = $_POST['topic_title'];
        $content = $_POST['topic_content'];
        $creator = "<html>{{vm.getUsername()}}</html>";
        $sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_date,topic_reply_date) VALUES (
              '" . $cid . "','" . $title . "','".$creator."',now(), now())";
        $res = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
        $new_topic_id = mysqli_insert_id($myConnection);
        $sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content,post_date) VALUES (
              '" . $cid . "','" . $new_topic_id . "','".$creator."','" . $content . "',now())";
        $res2 = mysqli_query($myConnection, $sql2) or die(mysqli_error($myConnection));
        $sql3 = "UPDATE categories SET last_post_date=now() WHERE id= '".$cid."' LIMIT 1";
        $res3 = mysqli_query($myConnection, $sql3) or die(mysqli_error($myConnection));
        if (($res) && ($res2) && ($res3)) {
            header ("Location: /CMPS1/forum/view_topic.php?cid=".rawurlencode($cid)."&tid=".rawurlencode($new_topic_id));
        } else{
            echo "There was a problem creating your topic. Please try again.";
        }
    }
}
