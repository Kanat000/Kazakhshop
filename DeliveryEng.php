<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo 'hello';?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/55c9606e23.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Styles/style Delivery.css">
        <style type="text/css">
        /**{
            border:1px solid black ;
        }*/
            .deliverySection{
                width: 100%;
                padding: 2vh 0 2vh 0;
                margin-top: 10vh;
                background-color: #5ba6fc;
               
            }
            .DeliveryContainer{
                 width: 80%;
                 margin: auto;
                 height: 100%;
                 padding: 5vh 0 5vh 0;

            }
            .deliveryProduct,.deliveryForm{
               width: 60%;
               margin: auto;
                
            }
            .deliveryForm{
                background-color: #07f;
            padding: 1vh 0 1vh 0;
            border:  0.2vh solid white;
            border-radius: 0 0 1vh 1vh;
            }
           
            .deliveryProductContainer{
                width: 100%;
                display: grid;
                grid-template-columns: 1fr 3fr;
              
            }
            .productImage{
                width: 30vh;
                height: 30vh;
                display: grid;
                justify-content: center;
                align-items: center;
            }
            .productImage img{
                width: 100%;
                height: 100%;
                border-radius: 1vh 0 0 0vh;
                object-fit: cover;
            }
            .productName{
                height: 20vh;
                font-size: 1.7vw;
                font-weight: 600;
                display: grid;
                justify-content: center;
                align-items: center;
                background-color: #065cbf;
                color: white;
                border-top: 0.2vh solid white;
                border-radius: 0vh 1vh 0 0;
                border-right: 0.2vh solid white;
            }
            
            .productWeight,.productVolume{
                font-size: 1.2vw;
                display: grid;
                justify-content: center;
                align-items: center;
                height: 5vh;
                background-color: #0469db;
                color: white;
                border-top: 0.2vh solid white;
                border-right: 0.2vh solid white;
            }

            .deliveryForm form{
               width: 90%;
               margin: auto;
               padding: 1vh ;
               margin-top: 4vh;
             
            }
            .deliveryForm form div label{
                display: grid;
                justify-content: center;
                align-items: center;
            }
            .deliveryLabels{
                width: 100%;
                font-size: 1.4vw;
                font-family: cursive;
                display: grid;
                justify-content: flex-end;
                align-items: center;
                margin-top: 3vh;
                color: white;
            }
            .deliveryInputs{
                width: 100%;
                margin-top: 1vh;
                padding: 1.3vh;
                border: 0.1vh solid lightgrey;
                border-radius: 1vh;
                font-size: 1.1vw;
            }
            .deliveryInputs:focus{
                outline: none;
            }
            .deliveryCost{
                 width: 100%;
                margin-top: 4vh;
                padding: 1.3vh;
                border: 0.1vh solid lightgrey;
                border-radius: 1vh;
                font-size: 1.1vw;
                text-align: center;
            }
            .deliveryBtn{
                width: 100%;
                padding: 1.7vh;
                border: 0;
                background-color: #2af018;
                color: white;
                font-size: 1.2vw;
                border-radius: 1vh;
                margin-top: 1vh;
                margin-bottom: 7vh;
            }
            .dateContainer{
               
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-column-gap: 1vh;
            }
            .dateContainer div .deliveryInputs{
                background-color: white;
            }
            .errorAddress{
                height: 5vh;
                width: 100%;
                display: grid;
                justify-content: center;
                align-items: center;
                color: #fc0303;
                font-size: 1vw;
                font-weight: 100;
            }
            .notDisplay{
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
                $cityRes = mysqli_query($conn,"SELECT * FROM cities");
                $cityArr = mysqli_fetch_all($cityRes,MYSQLI_NUM);

                $errorAddress = "";
                $send = $_POST['deliverSend'];
                $address = $_POST['address']; 
                $citySelect = $_POST['city'];
                $cityName = explode(",", $citySelect)[2];
                $sendDate = $_POST['sendDate'];
                $reachedDate = $_POST['reachedDate'];
                $dcostStr = $_POST['dCost'];
                $dClass = "";
                $SectionClass = "notDisplay";
                $cost = intval(explode(" ", explode(":", $dcostStr)[1])[1]);
                $selectDel = "Select * from userdelivery where productId = '".$productId."';";
                $selectRes = mysqli_query($conn,$selectDel); 
                if(mysqli_num_rows($selectRes) == 0){
                    $SectionClass = "deliverySection";
                }
                if(isset($send)){
                    if(strlen($address)<3){
                       $errorAddress = "Please write correct address";
                    }
                    elseif($cost > $newArray[0][6]){
                         $dClass = "notEnough";
                    }
                    else{
                        $totalUserMoney = $newArray[0][6] - $cost;
                        $deliveryDecrease = "Update users set userMoney = '".$totalUserMoney."' where email = '".$cookieArr[0][2]."';";
                        mysqli_query($conn,$deliveryDecrease);
                        $deliveryQuery = "INSERT INTO userdelivery(userId,productId,city,address,sendedDate,reachedDate,costs) 
                                               values ('".$newArray[0][0]."','".$productArray[0][0]."','".$cityName."','".$address."','".$sendDate."','".$reachedDate."','".$cost."')";
                        mysqli_query($conn,$deliveryQuery);
                        $dClass = "Enough";
                    }
                }

         ?>
        <main>
            <h1 style="text-align: center;">Delivery</h1><br>
            <div class="containe-fluid">
                <div class="row">
                    <div class="col-6 text-center">
                        <img src="lab/others/dombra.jpg" alt="">
                    </div>
                    <div class="col-5">
                        <h5>Delivery across Nur-Sultan and Akmola region</h5>
                        <p>The minimum order amount for Moscow is 3000 tenge (Akmola region is 10000 tenge)<br>
                            Paid delivery of 3000 tenge when ordering from 3000 to 10000 tenge.<br>
                            Free delivery for orders over 10,000 tenge.<br>
                            Self-pickup is carried out from the store at the address: Nur-Sultan, st. Kabanbai batyr 62 from 9:00 to 22:00.<br>
                            Delivery of orders is carried out from MONDAY to SUNDAY from 11:00 to 20:00.<br>
                            All accepted orders are sent to the client the next day.<br>
                            Employees of the call-center of the online store work from MONDAY to SUNDAY from 10:00 to 21:00. </p>
                    </div>
                  
                       <div class="<?php echo $SectionClass;?> <?php echo $dClass;?>" id="dSection">
                           <div class="DeliveryContainer">
                               <div class="deliveryProduct">
                                   <div class="deliveryProductContainer">
                                       <div><div class="productImage"><img src="<?php echo $productArray[0][8]?>" alt="product"></div></div>
                                       <div><div class="productName"><?php echo $productArray[0][1]?></div>
                                       <div class="productWeight">Weight: <?php echo $productArray[0][10]?> kg</div>
                                       <div class="productVolume">Volume: <?php echo $productArray[0][11]?> m^3</div></div>
                                   </div>
                               </div>
                               <div class="deliveryForm">
                                   <form action="" method = "post">
                                          <div><label for="City" class="deliveryLabels">Choose city:</label></div>
                                          <div>
                                            <select class="deliveryInputs" name="city" id="city" onchange="deliveryCalculate(<?php echo $productArray[0][10].','.$productArray[0][11]?>,document.getElementById('city').value)">
                                                <?php 
                                                      for ($i = 0; $i < count($cityArr); $i++) {
                                                          echo "<option value='".$cityArr[$i][2].",".$cityArr[$i][3].",".$cityArr[$i][1]."'>";
                                                          echo $cityArr[$i][1];
                                                          echo "</option>";
                                                      }
  
                                                ?>
                                            </select>
                                        </div>
                                          <div><label for="address" class="deliveryLabels">Address:</label></div>
                                          <div><input type="text" name="address" id="address" class="deliveryInputs" placeholder="Address"></div>
                                          <div><div class="errorAddress"><?php echo $errorAddress?></div></div>
                                          <div class="dateContainer">
                                            <div>
                                              <label class="deliveryLabels">Sended date:</label>
                                              <input type="text" name="sendDate" value="<?php echo date("d/m/Y")?>" class="deliveryInputs" id="sendDate" readonly="readonly">
                                            </div>

                                            <div>
                                                <label class="deliveryLabels">Reached date:</label>
                                                <input type="text" name="reachedDate" value="" class="deliveryInputs" id="reachedDate" readonly="readonly">
                                            </div>
                                              
                                          </div>
                                          <input type="text" name="dCost" class="deliveryCost" id="dCost" value="Total:" readonly="readonly">
                                          <div><input type="submit" name="deliverSend" id="deliverySend" value="Order to delivery" class="deliveryBtn"></div>
                                   </form>
                               </div>
                           </div>
                       </div>
                </div>
            </div>
        </main>
        <div id="google_translate_element"></div>



<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <br><br><br>
        <?php 
          require 'FooterEng.php';

         ?>
         <script type="text/javascript">
             
              var notEnough = document.getElementById("dSection");
              if(notEnough.classList.contains("notEnough")){
                    alert("Your money not enough to order Delivery!!!");
              }
              else if(notEnough.classList.contains("Enough")){
                    window.location.href = "http://localhost/finallab/userAcount.php";
              }
             function deliveryCalculate(weight,volume,distanceDay) {
               var cost = 0;
               var distance = parseInt(distanceDay.split(",")[0]);
               console.log(distance);
               var days = parseInt(distanceDay.split(",")[1]);
               var reachedDate = new Date(Date.now());
               console.log(days);
               reachedDate.setDate(reachedDate.getDate() + days);
               cost = weight*10+volume*1500+distance*1;
               document.getElementById("dCost").value = "Total: "+Math.floor(cost)+" kzt";
               document.getElementById("deliverySend").value = "Order to delivery("+Math.floor(cost)+" kzt)";
               document.getElementById("reachedDate").value = reachedDate.getDate()+"/0"+(reachedDate.getMonth()+1)+"/"+reachedDate.getFullYear();
             }

         </script>
    </body>
</html>
