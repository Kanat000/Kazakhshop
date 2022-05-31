<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Payment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/55c9606e23.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Styles/style Payment.css">
        <style type="text/css">
          /* *{
            border: 1px solid black;
           }*/
            .paymentBlock{
                width: 100%;
                height: 100vh;
                padding: 0;
                margin: 0;
                background-color: #f0f0f0;
                display: grid;
                justify-content: center;
                align-items: center;
                margin-top: 10vh;
            }
            .paymentForm{
                width: 100%;
                height: 80%;
            }
            .paymentForm form{
                width: 100%;
                height: 100%;
                display: grid;
                grid-template-rows: 0.5fr 1fr 2fr 0.5fr 1fr 1.5fr 0.5fr;
                padding: 9vh 0 9vh 0;
                
            }
            .paymentForm form label{
                margin-top:2vh;
                font-size: 1.2vw;
            }
            .payDevider{
                display: grid;
                grid-template-columns: 1fr 1fr;
                justify-content: space-around;
                align-items: center;
                grid-column-gap: 1vh;
            }
            .payInput{
                width: 100%;
                padding: 1vh;
                font-size: 1.1vw;
                border: 0.5vh solid #c4c4c4;
                border-radius: 1vh;
                margin-top: 1vh;
            }
            .payInput:focus{
                outline: none;
            }
            .paySubmit{
                width: 100%;
                padding: 1.5vh;
                font-size: 1.3vw;
                border: 0;
                border-radius: 1vh;
                background-color: #1ac9c9;
                color: white;
                margin-top: 4vh;
            }
            .errorBlock{
                text-align: center;
                color: red;
            }
        </style>
           <?php
           require 'HeaderEn.php';
           ?>
        <main>
            <?php 
            $paymentClass = "noUserBlock";

            if ($cookieArr[0][1] == 1) {
                $paymentClass = "paymentBlock";
            }


            $error = "";
            $payBtn = $_POST['payBtn'];
            
            if (isset($payBtn)) {
                 $cardNum = $_POST['cardNum'];
            $monthYear = $_POST['monthYear'];
            $secretNum = $_POST['secretNum'];
            $moneySize = $_POST['moneySize'];
            $cardNumCheck = str_replace(' ', '', $cardNum);
            $monthYearCheck = str_replace('/','',$monthYear);
            $month = substr($monthYearCheck, 0, 2);
            $year = substr($monthYearCheck, 2, 2);
            $redirectClass = "";

             if(strlen($cardNumCheck) != 16 || is_numeric($cardNumCheck) == false){
                $error = "Wrong card number!!!";
             }
             else if(strlen($monthYearCheck)!=4 || intval($month)>12  || intval($year)>24){
                $error = "Wrong month/year of card!!!";
             }
             else if(strlen($secretNum) != 3 || is_numeric($secretNum) == false){
                $error = "Invalid secret number!!!";
             } 
             else if(is_numeric($moneySize) == false){
                $error = "Wrong money size!!!";
             }
             else{
                   $moneyUser = intval($moneySize);
                   $sqlQuery = "SELECT userMoney From users where email = '".$cookieArr[0][2]."'";
                   $translator = mysqli_query($conn,$sqlQuery);
                   $moneyArr = mysqli_fetch_all($translator,MYSQLI_NUM);
                   $totalmoney = $moneyArr[0][0] + $moneyUser;
                   $updateMoney = "Update users Set userMoney = '".$totalmoney."' where email = '".$cookieArr[0][2]."';";
                   mysqli_query($conn,$updateMoney);
                   $redirectClass = "redirect";
             }


            }
           
              

             ?>
           
            <h1 style="text-align: center;">Payment</h1><br><br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-7" style="display: flex; justify-content: center;">
                        <img src="Lab/others/payment.png" alt="">
                    </div>
                    <div class="col-5">
                        <h5>Ways of payment</h5><br>
                        <p>Pay for your purchase in any convenient way:<br><br>
                            • Cash. Payment is made after you have familiarized yourself with the goods and made a purchase decision. The money is transferred to the delivery service employee, who provides the cash and sales receipts.<br><br>
                            • Payment by card. It is possible to pay Sberbank online to the delivery service employee after submitting the order and the receipt. </p>
                    </div>
                </div>
            </div>

            <div class="<?php echo $paymentClass;?>  <?php echo $redirectClass;?>" id = "redirectId">
                <div class="paymentForm">
                      <form action="" method="post">
                          <label for="cardNum">Card Numder:</label>
                          <input type="text" name="cardNum" placeholder="XXXX XXXX XXXX XXXX" class="payInput" id="cardNum">
                          <div class="payDevider">
                              <label for="monthYear">Card Month/Year:</label>
                              <label for="secretNum">Secret numbers:</label>
                              <input type="text" name="monthYear" placeholder="MM/YY" class="payInput" id="monthYear">
                              <input type="text" name="secretNum" placeholder="XXX"  class="payInput" id="secretNum">
                          </div>
                          <label for="moneySize">How much money you want transfer to website(kzt):</label>
                          <input type="text" name="moneySize" class="payInput" id="moneySize" placeholder="1000(kzt)">
                           <div><input type="submit" name="payBtn" class="paySubmit" value="Pay"></div>
                           <div class="errorBlock"><?php echo $error;?></div>
                      </form>
                </div>
            </div>
            
        </main>
        <br><br><br>
        
           <?php
           require 'FooterEng.php';
           ?>
           <script type="text/javascript">
               var redirectBlock = document.getElementById('redirectId');
               if (redirectBlock.classList.contains("redirect")) {
                    window.location.href = "http://localhost/finallab/DeliveryEng.php";
               }

           </script>
    </body>
</html>