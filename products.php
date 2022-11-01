<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Главная страница сайта</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/notifIt.js"></script>
    <link rel="stylesheet" type="text/css" href="css/notifIt.css">
</head>
<body>  
    <main>
        <h1>Категории товаров:</h1>
	<?php 
		$link = mysqli_connect("localhost", "root", "","mydb");

		if ($link == false){
    			print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
		}	
		else{
			$sql="SELECT 
categorys.idCategory,
categorys.name, 
categorys.description,
(SELECT  COUNT(productsCategorys.idProduct) FROM productsCategorys WHERE productsCategorys.idCategory=categorys.idCategory ) AS kolvo 
FROM categorys WHERE (SELECT  COUNT(productsCategorys.idProduct) FROM productsCategorys WHERE productsCategorys.idCategory=categorys.idCategory )>0
ORDER BY kolvo DESC;";
$result = mysqli_query($link, $sql);
		while ($row = mysqli_fetch_array($result)) {
   		echo "<a href='category.php?id=$row[idCategory]&name=$row[name]&'>$row[name] </a> <br>";
//print($row['name'] . "<br>");
		}
		}
	?>
</main>
</body> 

</html>
