<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/CMPS1/css/bills.css"/>

</head>

<body  >
<div id="wrapper">
    <h1 align="center" style="margin-top: 15px">SGA Connect Forum</h1>

    <div id="content">
        <?php
        include_once("connect.php");
            echo "<p><h3>You are logged in as <i> {{vm.getUsername()}}</i></h3></p> ";
        echo "<p><h2 align='center'>Discussion Categories</h2></p> ";

        $sql = "SELECT * FROM categories ORDER BY category_title ASC";
        $res = mysqli_query($myConnection,$sql) or die(mysqli_error());
        $categories = "";
        if (mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $title = $row['category_title'];
                $description = $row['category_description'];
                $categories .= "<a align='center' href='/CMPS1/Forum/view_category.php?cid=".$id."' ><p style='color:darkslategray border:dotted'><h4>".$title."  </h4></p>".$description."</a>";
            }
            echo $categories;
        }else{
            echo "<p><h4>There are no categories available yet.</h4></p>";
        }
        ?>
    </div>
</div>
</body>
</html>