<?php session_start();
$cid = $_GET['cid']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Forum</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div id="wrapper">
    <h2>SGA Connect Forum</h2>

    <hr />
    <div id="content">
        <form action="/CMPS1/forum/create_topic_parse.php" method="post">
            <p>Topic Title</p>
        <input type="text" name="topic_title" size="98" maxlength="150"/>
            <p>Topic Content</p>
        <textarea name="topic_content" rows="5" cols="75"></textarea>
        <br/><br/>
        <input type="hidden" name="cid" value="<?php echo $cid;?>"/>
        <input type="submit" name="topic_submit" value="Create Your Topic"/>
        </form>

    </div>
</div>
</body>
</html>


