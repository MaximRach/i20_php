<!doctype html>
<html lang="ru">
<?php
$id=$_GET['id'];
$link = mysqli_connect("localhost", "root", "","mydb");
if ($link == false){
    	print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
	}	
	else{
		$sql="SELECT
*
FROM products
where idProduct=$id;";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);



$sql2="SELECT
*
FROM productsPics
JOIN pics on productsPics.IdPic=pics.idpic
where productsPics.idProduct=$id";
$sql3="SELECT
*
FROM productsCategorys
JOIN categorys on productsCategorys.idCategory=categorys.idCategory
where idProduct=$id";

	}
?>
<head>
    <meta charset="utf-8">
    <title><?php echo $row['name'];?></title>
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
        <div class="product">
            <div class="product__preview">
                <div class="product__preview__slider">
                    <!--<div><img  src="1.png" class="slider__pic"></div>
                    <div><img  src="2.png" class="slider__pic"></div>
                    <div><img  src="3.png" class="slider__pic"></div>-->
                    <?php 
                    $result2 = mysqli_query($link, $sql2);
                    while ($row2 = mysqli_fetch_array($result2)) {
                    echo "<div><img  src='$row2[path]' alt='$row2[alt]' class='slider__pic'></div>";
                    }
                    ?>
                    <input class="product__preview__slider__button" type="image" src="4.png" alt="Кнопка «вниз»">
                </div>
                <div class="product__preview_selection_pic">
                    <img src="1.png" id="selection_pic" class="selection_pic">
                </div>
            </div>
            <div class="product__description">
                <h2 class="product__description__name"><?php echo $row['name'];?></h2>
                <div class="product__description__categories">
                    <!--<a href="rub-medicene.com">Рубашки Medicine</a>
                    <a href="all-medicine.com" class="product__description__categories__ots">Все модели Medicine</a>
                    <a href="all-rub.com" class="product__description__categories__ots">Рубашки</a>-->
                    <?php 
                    $result3 = mysqli_query($link, $sql3);
                    while ($row3 = mysqli_fetch_array($result3)) {
                    echo "<a href='category.php?id=$row3[idCategory]&name=$row3[name]&' class='product__description__categories__ots'>$row3[name]</a>";
                    }
                    ?>
                </div>
                <div class="product__description__price">
                    <div><span class="product__description__price__oldprice"><?php echo $row['priceWithouthDiscount'];?></span>
                        <span class="product__description__price__price"><?php echo $row['price'];?></span><span class="product__description__price__price rub">Р</span>
                    </div>
                    <div>
                        <span class="product__description__price__pricewithcode product__description__price__pricewithcode__ots"><?php echo $row['priceWithPromo'];?></span><span class="product__description__price__pricewithcode rub">Р</span>
                        <span>- с промокодом</span>
                    </div>
                </div>
                <div class="product__description__info">
                    <br>
                    <div class="product__description__info__1"><img src=5.png>&nbsp;В наличии в магазине <a href="m-lamoda.com">Lamoda</a></div>
                    <div class="product__description__info__1"><img src="6.png">&nbsp;Бесплатная доставка</div>
                    <br>
                </div>
                <div class="product__description__actions">
                    <div class="product__description__actions__2block">
                        <input type="button" value="-" class="product__description__actions__2block__minus">
                        <input type="number" value="1" class="product__description__actions__2block__num" id="num">
                        <input type="button" value="+" class="product__description__actions__2block__plus">
                    </div>
                <!--onclick="not()"-->
                    <div class="product__description__actions__1block"><input type="button" value="Купить" class="product__description__actions__button1"> 
                        <input type="button" value="В избранное" class="product__description__actions__button2"></div>
                </div>
                <div class="product__description__text">
                    <?php echo $row['description'];?>
                </div>
                <div class="product__description__share">
                    Поделиться:<input type="image" src="vimeo_icon-icons.com_65446.png" alt="vk" class="product__description__share__buttons">
                    <input type="image" src="google_icon-icons.com_65440.png" alt="g+" class="product__description__share__buttons">
                    <input type="image" src="fb_icon-icons.com_65434.png" alt="facebook" class="product__description__share__buttons">
                    <input type="image" src="twitter_icon-icons.com_65436.png" alt="twitter" class="product__description__share__buttons">
                    <div class="product__description__share__count"> 123</div>
                </div>
            </div>
    </div>
</main>
</body> 
<!-- <script>
    $(".product__description__actions__button1").on('click', not);
    $(".product__description__actions__2block__plus").on('click', num_plus);
    $(".product__description__actions__2block__minus").on('click', num_minus);
    $(".product__description__actions__2block__num").on('change', num_change);
    $(".slider__pic1").on('mouseover', function() {ChangeSelectionPic('1.png');});
    $(".slider__pic2").on('mouseover', function() {ChangeSelectionPic('2.png');});
    $(".slider__pic3").on('mouseover', function() {ChangeSelectionPic('3.png');});
    </script> -->
</html>
