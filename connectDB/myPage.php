﻿<!DOCTYPE html>
<?php  if (session_status() == PHP_SESSION_NONE) {
    session_start();}
    $id=$_SESSION['UserID'];
    $db=mysqli_connect('localhost', 'aejeong', 'aejeong123', 'aejeong');
    $result=mysqli_query($db, "SELECT * FROM Users WHERE UserID='$id'");
    $row=mysqli_fetch_assoc($result);
?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title> 애정 : 마이페이지 </title>
    <link rel="stylesheet" href="myPageStyle.css?ver=1">
</head>
<body>
    <section id="back_bar">
    <button id="back_icon"><img src="picture/back_button.png" width="50%"></button>
    <label id="explain_label"><b>마이 페이지</b></label>
    <button id="revise_button" onclick="location.href='edit_myPage.php'">수정</button>
    </section>

    <section id="user_info_section">
        <article>
            <img id="profile_image" src="picture\basic_profile.png">
            <div id="user_info_div">
                <p>
                    <div id="nickname_text"> <?php echo $row['Nickname']; ?> </div>
                    기르는 동물 : 강아지 <?php echo $row['Dog']; ?>, 고양이 <?php echo $row['Cat']; ?> <?php if($row['etc1']!=0) { echo ','.$row['etc1_name']; } ?> <?php if ($row['etc1']!=0) { echo $row['etc1']; } ?> <?php if ($row['etc2']!=0) { echo ','.$row['etc2_name']; } ?> <?php if ($row['etc2']!=0) { echo $row['etc2']; } ?>
                </p>
                <p><br><?php echo $row['Email']; ?></p>
            </div>
        </article>
        <article>
            <p id="recent_items_text"> 최근 본 상품 </p>
            <button class="recent_item_button">
                <img src="picture\product2.png" class="recent_item_image">
                <figcaption>바란스 하이포알러지 강아지 샴푸 503ml</figcaption>
            </button>
            <button class="recent_item_button">
                <img src="picture\product1.jpg" class="recent_item_image">
                <figcaption>Can-C Eye Drop 캔씨 백내장 강아지 안약 5ml 2개입</figcaption>
            </button>
            <button class="recent_item_button">
                <img src="picture\product2.png" class="recent_item_image">
                <figcaption>바란스 하이포알러지 강아지 샴푸 503ml</figcaption>
            </button>
        </article>

    </section>

    <section id="myReview_section">
        <button><h1> 내가 쓴 리뷰 </h1></button>
        <article>
            <p>바란스 하이포알러지 강아지 샴푸 503ml</p>
            <p>2018.09.24 작성</p>
            <p>
                <img src="picture\review_face1.jpg" width="20" height="20">
                <br /><img src="picture\review_face2.jpg" width="20" height="20">
                <br /><img src="picture\review_option.png" width="20" height="20">
            </p>
            <a class="more_link" href="test_category.html"> 더보기 </a>
        </article>
        
    </section>

    <section id="likeProduct_section">
        <button id="like_product_tag"><h1> 좋아요 한 상품 </h1></button>
        <article>
            <div>
                <button class="like_product_button">
                    <img class="like_product_img" src="picture\product1.jpg">
                    <figcaption>Can-C Eye Drop 캔씨 백내장 강아지 안약 5ml 2개입</figcaption>
                </button>
                <button class="like_product_button">
                    <img class="like_product_img" src="picture\product2.png">
                    <figcaption>바란스 하이포알러지 강아지 샴푸 503ml</figcaption>
                </button>
            </div>
            <a class="more_link" href="test_category.html"> 더보기 </a>
        </article>
        
    </section>


    #아래 바
    <section id="bottom_bar">
    <button class="bottom_bar_button" id="category_icon" onclick="location.href='LOGOUT_productList.html'"><img src="picture/category_icon.png"  width="100%"></button>
    <button class="bottom_bar_button" id="home_icon" onclick="location.href='LoginHome.php'"><img src="picture/home_icon.png" width="160%"></button>
    <button class="bottom_bar_button" id="myPage_icon" onclick="location.href='myPage.php'"><img src="picture/myPage_icon.png" width="110%"></button>
    </section>
</body>
</html>