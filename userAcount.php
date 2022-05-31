<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Acount</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/55c9606e23.js" crossorigin="anonymous"></script>
   
   <style type="text/css">
        /**{
            border: 1px solid black;
        }*/
       menu{
        width: 100%;
        min-height: 100vh;
        padding: 0;
       }
       .acountPage{
        width: 90%;
        min-height: 100vh;
        margin: auto;
        margin-top: 10vh;
       }
       .topContainer{
        width: 70%;
        margin: auto;
        display: grid;
        grid-template-columns: 1fr 3fr;
        grid-column-gap: 5vh;
       }
       .userAvatar{
        width: 100%;
        height: 100%;
         display: grid;
         justify-content: center;
         align-items: flex-start;
         padding: 5vh 0 5vh 0;
       }
       .imageFrame{
        width: 40vh;
        height: 40vh;
       }
       .userImg{
         width: 100%;
         height: 100%;
         border-radius: 50%;
       }
       .userInfo{
        padding: 5vh 0 5vh 0;
        display: grid;
        grid-template-rows: 1fr 1fr 1fr 1fr 3fr;
       }
       .userNameBlock{
        font-size: 2vw;
        font-weight: 800;
       }
       .userFullname, .userEmail, .userPhone{
        font-size: 1.2vw;
        display: grid;
        align-items: center;
       }
       .Status{
        font-size: 1vw;
       }
       .userContent{
        padding: 5vh 10vh 5vh 10vh;
       }
       .contentMenu form{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-column-gap: 0.5vh;
       }
       .menuBtn{
          padding: 1.5vh;
          font-size: 1.2vw;
          color: black;
          background-color: #f5f5f5;
          border: 0;
        border-bottom: 0.5vh solid white;
       }
       .contentMain{
        background-color: #f5f5f5;
       }
       .activeMenu{
          background-color: #41fa75;
          color: white;
          box-shadow: 0px 0.7vh 0px #41fa75;
       }
       .contentBlock{
        width: 90%;
        margin: auto;
         padding: 5vh 0 5vh 0;
         display: grid;
         grid-template-columns: 1fr 1fr 1fr;
         grid-row-gap: 5vh;

       }
       .content{
        margin: auto;
          width: 45vh;
          height: 55vh;
          border: 0.1vh solid #bfbfbf;
          border-radius: 1vh;
          display: grid;
          grid-template-rows: 8fr 1fr 1fr;
          background-color: white;
          padding: 0.5vh 1vh 0vh 1vh;
       }
       .contentImage{
         display: grid;
         justify-content: center;
         align-items: center;
       }
       .imgProduct{
        width: 40vh;
        height: 40vh;
        object-fit: cover;
       }
       .contentName{
         font-size: 1.3vw;
         font-weight: 800;
         display: grid;
         justify-content: center;
         align-items: center;
       }
       .contentPrice,.contentCount{
        font-size: 1.1vw;
        display: grid;
        justify-content: center;
        align-items: center;
       }
       .contentCount{
        background-color: #ffa033;
        color: white;
        padding: 0.5vh;
        border-radius: 0 0 1vh 1vh;
        margin: 0 -1vh 0 -1vh;
       }
       .noBlock{
        display: none;
       }
       .deliveryBlock{
         width: 80%;
         margin: auto;
         padding: 5vh 0 5vh 0;
         display: grid;
         grid-row-gap: 5vh;
       }
       .dContentContainer{
         background-color: #e8e8e8;
         color: black;
         border: 0.1vh solid #d6d5d4;
         border-radius: 1vh;

         display: grid;
         grid-template-columns: 1fr 4fr;
       }
       .dLeft{
        padding: 3vh;
        display: grid;
        justify-content: center;
        align-items: center;
       }
       .dRight{
        padding: 3vh;
        display: grid;
        grid-row-gap: 1vh;
       }
       .dImageBlock{
        width: 35vh;
        height: 35vh;
       }
       .dImage{
        width: 100%;
        height: 100%;
        border-radius: 1vh;
        object-fit: cover;
       }
       .dProductName{
        font-size: 2vw;
        display: grid;
        justify-content: center;
        background-color: #5e5d5e;
        color: white;
        font-family: cursive;
       }
       .deliveryCost,.deliveryCity,.deliveryAddress{
        font-size: 1.2vw;
        text-align: center;
        color: #6b6b6b;
       }
       .dPhone,.dFullname{
        font-size: 1.3vw;
        text-align: center;
        color: #6b6b6b;
       }
       .dates{
        display: grid;
        grid-template-columns: 1fr 1fr;
       }
       .dates div{
        text-align: center;
        font-size: 1.2vw;
        color: #6b6b6b;
       }




   </style>
   <?php require 'HeaderEn.php';?>
   <?php 
     $cartPage = $_POST['myCart'];
     $buyPage = $_POST['myBuy'];
     $deliveryBtn = $_POST['myDelivery'];
     $cartActive = "activeMenu";
     $buyActive = "";
     $cartBlock = "contentBlock";
     $buysBlock = "noBlock";
     $deliveryBlock = "noBlock";
     $deliveryActive = "";
     if(isset($cartPage)){
         $cartActive = "activeMenu";
         $buyActive = "";
         $deliveryActive = "";
         $cartBlock = "contentBlock";
         $buysBlock = "noBlock";
         $deliveryBlock = "noBlock";
     } 
     else if(isset($buyPage)){
         $buyActive = "activeMenu";
         $cartActive = "";
         $deliveryActive = "";
         $cartBlock = "noBlock";
         $buysBlock = "contentBlock";
         $deliveryBlock = "noBlock";
     }
     else if(isset($deliveryBtn)){
         $buyActive = "";
         $cartActive = "";
         $deliveryActive = "activeMenu";
         $cartBlock = "noBlock";
         $buysBlock = "noBlock";
         $deliveryBlock = "deliveryBlock";
     }


   ?>
    
    <main>
        <div class="acountPage">
        <div class="acountInfo">
            <div class="topContainer">
            <div class="userAvatar"><div class="imgFrame"><img src="<?php echo $newArray[0][7] ?>" class="userImg"></div></div>
            <div class="userInfo">
                <div class="userNameBlock"><?php echo $usersName[0] ?></div>
                <div class="userFullname"><?php echo $newArray[0][1] ?></div>
                <div class="userEmail"><?php echo $newArray[0][3]?></div>
                <div class="userPhone"><?php echo $newArray[0][2]?></div>
                <div class="Status"><?php echo $newArray[0][8]?></div>
            </div>        
        </div>
        <div class="userContent">
            <div class="contentMenu">
                <form action = "" method="post">
                <input type="submit" name="myCart" class="menuBtn <?php echo $cartActive ?>" value="Cart">
                <input type="submit" name="myBuy" class="menuBtn <?php echo $buyActive ?>" value="Buyyed">
                 <input type="submit" name="myDelivery" class="menuBtn <?php echo $deliveryActive ?>" value="Delivery">
            </form>
            </div>
            <div class="contentMain">
                <div class="<?php echo $cartBlock; ?>">
                    <?php 
                        $cartSql = "Select product.name, product.price, product.image From usercart Join product where product.id = usercart.productId and userId = '".$newArray[0][0]."' group by productId;";
                        $cartRes = mysqli_query($conn,$cartSql);
                        $cartArr = mysqli_fetch_all($cartRes,MYSQLI_NUM);

                       for ($i = 0; $i < count($cartArr); $i++) {
                          echo '<div class="content">
                        <div class="contentImage"><img src="'.$cartArr[$i][2].'" class="imgProduct"></div>
                        <div class="contentName">'.$cartArr[$i][0].'</div>
                        <div class="contentPrice">'.$cartArr[$i][1].' kzt</div>
                    </div>'; 
                       }
                    ?>
                    
                </div>
                <div class="<?php echo $buysBlock;?> ">
                    <?php 
                        $buySql = "Select product.name, product.price, product.image, userbuys.count From userbuys Join product where product.id = userbuys.productId and userId = '".$newArray[0][0]."'";
                        $buyRes = mysqli_query($conn,$buySql);
                        $buyArr = mysqli_fetch_all($buyRes,MYSQLI_NUM);

                       for ($i = 0; $i < count($buyArr); $i++) {
                          echo '<div class="content">
                        <div class="contentImage"><img src="'.$buyArr[$i][2].'" class="imgProduct"></div>
                        <div class="contentName">'.$buyArr[$i][0].'</div>
                        <div class="contentPrice">'.$buyArr[$i][1].' kzt</div>
                        <div class="contentCount">Buyyed '.$buyArr[$i][3].' pieces</div>
                    </div>'; 
                       }
                    ?>
                </div>
                <div class="<?php echo $deliveryBlock?>" >
                   <?php
                        $deliverySelect = "Select userdelivery.city,userdelivery.address, userdelivery.sendedDate, userdelivery.reachedDate, userdelivery.costs,product.image, product.name From userdelivery
                        Join product where product.id = userdelivery.productId and userId = '".$newArray[0][0]."' group by productId;";
                        $deliveryRes = mysqli_query($conn,$deliverySelect);
                        $deliveryArr = mysqli_fetch_all($deliveryRes,MYSQLI_NUM);

                         for ($i = 0; $i <count($deliveryArr); $i++) {
                               echo ' <div class="dContentContainer">
                                <div class="dLeft">
                                    <div class="dImageBlock"><img src="'.$deliveryArr[$i][5].'" class="dImage"></div>
                                </div>
                                <div class="dRight">
                                    <div class="dProductName">'.$deliveryArr[$i][6].'</div>
                                    <div class="deliveryCost">Delivery cost: <span style="color:#02cf09">'.$deliveryArr[$i][4].' kzt</span> </div>
                                    <div class="deliveryCity">Nursultan ---> <span style="color:#0480b5">'.$deliveryArr[$i][0].'</span></div>
                                    <div class="deliveryAddress">Client Address: <span style="color:#eb7e02">'.$deliveryArr[$i][1].'</span></div>
                                    <div class="dates">
                                        <div class="sendedDate">Sended Date: <span style="color:#e80505">'.$deliveryArr[$i][2].'</span></div>
                                        <div class="reachedDate">Reached date: <span style="color:#e80505">'.$deliveryArr[$i][3].'</span></div>
                                    </div>
                                    <div class="dPhone">Client Phone: <span style="color:#0219e8">'.$newArray[0][2].'</span></div>
                                    <div class="dFullname">Client Fullname:  <span style="color:#0219e8">'.$newArray[0][1].'</span></div>
                                </div>
                            </div>';    
                         }
                         
                   ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require "FooterEng.php"?>
</body>
</html>