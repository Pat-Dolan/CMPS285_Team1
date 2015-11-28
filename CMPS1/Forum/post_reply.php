<?php session_start();
$cid = $_GET['cid']; 
$tid = $_GET['tid'];
?>
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
      <form action='post_reply_parse.php' method='post'>
          <p>Reply Content</p>
          <textarea name='reply_content' rows='5' cols='75'></textarea>
          <br /><br />
          <input type='hidden' name='cid' value='<?php echo $cid; ?>'/>
          <input type='hidden' name='tid' value='<?php echo $tid; ?>'/>
          <input type='submit' name='reply_submit' value='Post Your Reply'/>
      </form>
    </div>
</div>
</body>
</html>
