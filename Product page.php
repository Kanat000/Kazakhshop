<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Limelight&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Alegreya:wght@400;800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@400;800&display=swap');
         /* *{
            border: 1px solid black;
          }*/
          body{
            background-color: #f7f7f7;
          }

        .main{
            height: 90vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            justify-content: space-around;
            margin-top: 10vh;
        }
     .leftSide{
        display: grid;
        align-items: center;
     }
        .imagePlace{
            width: 90%;
            margin: auto;
            height: 85vh;

        }
        .productImage{
             width: 100%;
             height: 100%;
             object-fit: cover;
        }
        .rightSide{
            padding: 5vh 15vh 2vh 5vh;
            display: grid;
            grid-row-gap: 1vh;
        }
        .productName{
            font-size: 2vw;
           font-family: 'Mulish', serif;
           font-weight: 800;
        }
        .productPrice{
            font-size: 1.5vw;
            font-family: 'Mulish', serif;
            font-weight: 800;
        }

        .productInfo{
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .productInfo li{
            width: 100%;
            list-style: none;
            margin: 0;
            padding: 0;
            font-size: 1.2vw;
            font-family: 'Mulish', serif;
            font-weight: 600;
        }
        .descriptBlock{
            margin-top: 2vh;
            max-height: 30vh;
            overflow-y: hidden;
            border-top:0.2vh solid grey;
            border-bottom: 0.2vh solid grey;
        }
        .descriptBlock:hover{
            overflow-y: scroll;
        }
        .descriptBlock::-webkit-scrollbar {
            width: 1vh;
        }
        .descriptBlock::-webkit-scrollbar-track {
            width: 0.7vh;
        }
        .descriptBlock::-webkit-scrollbar-thumb {
            background-color: grey;
            border-radius: 1vh;
        }
        .productDescript{
            font-size: 1.2vw;
            font-family: 'Mulish', serif;
            font-weight: 200;
            height: 100%;
        }
        .addCartBlock{
            margin-top: 1vh;
            display: grid;
            align-items: center;
        }
        .addCartBtn{
            width: 100%;
            margin: auto;
            padding: 1.5vh;
            font-size: 1.3vw;
            font-family: 'Mulish', serif;
            font-weight: 600;
            border: 0;
            border-radius: 1vh;
            color: white;
            background-color: #7aa0ff;
        }
        .buyProduct{
            width: 100%;
            height: 100%;
            display: grid;
            align-items: center;
        }
        .buyBtn{
            width: 100%;
            margin: auto;
            padding: 1vh;
            font-size: 1.4vw;
            font-family: 'Mulish', serif;
            font-weight: 600;
            border: 0.4vh solid #263c75;
             margin-top: 1vh;
            color: #263c75;
            background-color: white;
        }
        .buyBtn:hover{
            background-color: #263c75;
            color: white;
            transition: 0.6s;
            border-radius: 1vh;
        }
        .activeAdd{
            width: 100%;
            margin: auto;
            padding: 1.5vh;
            font-size: 1.3vw;
            font-family: 'Mulish', serif;
            font-weight: 600;
            border: 0;
            border-radius: 1vh;
            color: white;
            background-color: #45e572;
        }
        .buyyed{
            width: 95%;
            margin: auto;
            padding: 0.5vh;
            background-color: #13f27b;
            color: white;
            display: grid;
            justify-content: center;
            align-items: center;
            border-radius: 0 0 1vh 1vh;
        } 
            .noBuys{
                display: none;
            }


    </style>
    <?php 
       require 'HeaderEn.php';
     ?>
     <?php 
        $productIdQuery = "SELECT productId FROM productcookie where id='1';";
        $productIdRes = mysqli_query($conn,$productIdQuery);
        $productIdArray = mysqli_fetch_all($productIdRes,MYSQLI_NUM);
        $productId = $productIdArray[0][0];  
        $productQuery = "SELECT * FROM product where id = '".$productId."'";
        $productSql = mysqli_query($conn,$productQuery);
        $productArray = mysqli_fetch_all($productSql,MYSQLI_NUM);
        
      ?>
     <?php
      
       
       $addCart = $_POST['addCart'];
       $deleteCart = $_POST['deleteCart'];
       $buyBtn = $_POST['buyBtn'];
       $redirectClass1 = "";
  
       $buyyed = "noBuys";

        $checkingCart = mysqli_query($conn, "Select * From usercart where userid='".$newArray[0][0]."' and productId = '".$productArray[0][0]."'");
        if(mysqli_num_rows($checkingCart) > 0){
           $addCartClass="activeAdd";
        $addCartValue="Product is added to cart";
        $addBtnName = 'deleteCart';
        }
        else{
          $addCartClass = "addCartBtn";
       $addCartValue = "Add to Cart";
       $addBtnName = 'addCart';     
        }

        $checkingBuy = mysqli_query($conn, "Select * From userbuys where userid='".$newArray[0][0]."' and productId = '".$productArray[0][0]."'");
        
        if(mysqli_num_rows($checkingBuy) > 0){
          $buyyed = "buyyed";

          $checkingBuyArray = mysqli_fetch_all($checkingBuy,MYSQLI_NUM);  
        }
        else{
          $buyyed = "noBuys";
        }        

       if(isset($addCart)){

        $addCartSql = "INSERT INTO usercart values ('".$newArray[0][0]."','".$productArray[0][0]."')";
        mysqli_query($conn,$addCartSql);
        $addCartClass="activeAdd";
        $addCartValue="Product is added to cart";
        $addBtnName = 'deleteCart';
        
       } 
       else if(isset($deleteCart)){


        $addCartSql = "Delete from usercart where productId = '".$productArray[0][0]."' and userid = '".$newArray[0][0]."';";
        mysqli_query($conn,$addCartSql);
        $addCartClass="addCartBtn";
        $addCartValue="Add to Cart";
        $addBtnName = 'addCart';

       }  
      
       if(isset($buyBtn)){
                   $moneyUser = intval($moneySize);
                   $sqlQuery = "SELECT userMoney From users where email = '".$cookieArr[0][2]."'";
                   $translator = mysqli_query($conn,$sqlQuery);
                   $moneyArr = mysqli_fetch_all($translator,MYSQLI_NUM);
                   if($moneyArr[0][0] < $productArray[0][2]){
                       $redirectClass1 = "noMoney";
                   }
                   else{
                    $totalmoney = $moneyArr[0][0] - $productArray[0][2];
                   $updateMoney = "Update users Set userMoney = '".$totalmoney."' where email = '".$cookieArr[0][2]."';";
                   mysqli_query($conn,$updateMoney);
                   $checkUserbuySql = "Select * from  userbuys where userid = '".$newArray[0][0]."' and productId = '".$productArray[0][0]."'";
                    $checkResult = mysqli_query($conn,$checkUserbuySql);
                    if(mysqli_num_rows($checkResult) > 0){
                        $checkBuyArr = mysqli_fetch_all($checkResult,MYSQLI_NUM);
                        $counter = $checkBuyArr[0][2];
                        $counter++;
                        $updateSql = "Update userbuys set count = '".$counter."' where userid = '".$newArray[0][0]."' and productId ='".$productArray[0][0]."';";
                        mysqli_query($conn,$updateSql);


                    }
                    else{
                       $addBuySql = "INSERT INTO userBuys values ('".$newArray[0][0]."','".$productArray[0][0]."','0')";
                        mysqli_query($conn,$addBuySql);
                    }
                   $redirectClass1 = "redirect1";
        
                   }
       }




     ?>
     
      <div class="main <?php echo $redirectClass1;?>" id="redirectId1">
          <div class="leftSide">
              <div class="imagePlace">
                  <img src="<?php echo $productArray[0][8];?>" class="productImage">
              </div>
          </div>
          <div>
            <div class="<?php echo $buyyed?>">Buyyed(<?php echo $checkingBuyArray[0][2]?> pieces)</div>
          <div class="rightSide">
              <div class="nameBlock"><div class="productName"><?php echo $productArray[0][1];?></div></div>
              <div class="priceBlock"><div class="productPrice"><?php echo $productArray[0][2];?> kzt</div></div>
              <div class="infoBlock"><div class="productInfo">
                  <li><?php echo $productArray[0][3];?></li>
                  <li><?php echo $productArray[0][4];?></li>
                  <li><?php echo $productArray[0][5];?></li>
                  <li><?php echo $productArray[0][6];?></li>
              </div></div>
              <div class="descriptBlock"><div class="productDescript">
                  <?php echo $productArray[0][7];?>
              </div></div>
              
               <div class="addCartBlock">
              <form action="" method="post">
                  <input type="submit" name="<?php echo $addBtnName;?>" class="<?php echo $addCartClass;?>" value="<?php echo $addCartValue?>">
              </form>
          </div>
          <div class="buyBlock">
              <div class="buyProduct">
                <form action="" method="post">
                  <input type="submit" name="buyBtn" value="Buy (<?php echo $productArray[0][2]; ?> kzt)" class="buyBtn">
                </form> 
              </div>
          </div>
          </div>
           


      </div>
  </div>
       <?php 
     
       require 'FooterEng.php';
     ?>
     <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
          var redirect1 = document.getElementById("redirectId1");
          if(redirect1.classList.contains("redirect1")){
                window.location.href = "http://localhost/finallab/DeliveryEng.php";
          }
          else if(redirect1.classList.contains("noMoney")){
              alert("You haven't enough money!!!");
          }
  


      </script>
     

</body>
</html>