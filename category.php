<!doctype html>
<html lang="ru">
<?php
$catname=$_GET['name'];
$id=$_GET['id'];
?>
<head>
    <meta charset="utf-8">
    <title><?php echo $catname;?></title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>  
    <div class="d1">
        <div class="data"><?php echo date('d.m.Y');?></div>
        <h2><?php echo $catname;?></h2>
        <div class="d2"><?php echo $catname;?></div>
    </div>
    <br>
    <div class="d3">
        <!--<figure><div class="c3">3</div><figcaption>Card 3</figcaption></figure>
        <figure><div class="c1">1</div><figcaption>Card 1</figcaption></figure>
        <figure><div class="c2">2</div><figcaption>Card 2</figcaption></figure>-->
        <?php 
        $link = mysqli_connect("localhost", "root", "","mydb");
        if ($link == false){
    			print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		}	
		else{
		$sql="SELECT
*
FROM productsCategorys
JOIN categorys on productsCategorys.idCategory=categorys.idCategory
JOIN products on productsCategorys.idProduct=products.idproduct
JOIN productsPics on products.idproduct=productsPics.idProduct
JOIN pics on productsPics.IdPic=pics.idpic
WHERE  productsCategorys.idCategory=$id and idproductsCategorys>0 
ORDER by idproductsCategorys  LIMIT 12;";
$result = mysqli_query($link, $sql);
		while ($row = mysqli_fetch_array($result)) {
		echo "<a href='product.php?id=$row[idProduct]&'><figure><img src=$row[path] alt=$row[altName] class='p$row[idProduct]' ><figcaption>$row[name]</a></figcaption>";
		}
		}
        ?>
    </div>
</body>
</html>
