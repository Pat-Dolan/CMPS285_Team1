<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="/CMPS1/css/style.css"/>
</head>

<body>
<div id="wrapper">
    <h2>SGA Connect Forum</h2>
    <hr/>
    <div id="content">
        <?php
        include_once("connect.php");
            echo "<p>You are logged in as ";

        $sql = "SELECT * FROM categories ORDER BY category_title ASC";
        $res = mysqli_query($myConnection,$sql) or die(mysqli_error());
        $categories = "";
        if (mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['category_title'];
                $description = $row['category_description'];
                $categories .= "<a href='Forum/view_category.php?cid=".$id."' class='cat_links'>".$title." - <font size='-1'>".$description."</font></a>";
            }
            echo $categories;
        }else{
            echo "<p>There are no categories available yet.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>