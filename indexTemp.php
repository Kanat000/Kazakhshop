<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Main</title>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="Styles/style Index ENG.css">
    <style type="text/css">
        /**{
            border: 1px solid black;
        }*/
         main{
           margin-top: 10vh;
           padding: 10vh 0 10vh 0;
        }
        .productContainer{
            width: 80%;
            margin: auto;
            /*background-color: #;*/
            
        }
        .productContainer form{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            justify-content: space-around;
            grid-row-gap: 7vh;
        }

        .productBlock{
            width: 40vh;
            height: 60vh;
            display: grid;
            grid-template-rows: 8fr 1fr 1fr 2fr;
            background-color: white;
            border: 0;
            border-radius: 2vh;
            padding-top: 1vh;
        }
        .productBlock div{
            display: grid;
            justify-content: center;
            align-items: flex-start;
        }
        .productFrame{
            width: 37vh;
            height: 37vh;
        }
        .productName{
            font-size: 1.3vw;
            font-weight: 700;
        }
        .productPrice{
            font-size: 1.2vw;
            font-weight: 500;
        }
        
        .productBlock:hover{
            background-color: #fafafa;
            box-shadow: 0.5vh 0.5vh 0.5vh #dbdbdb;
            transform: scale(1.07);
            transition: 0.4s;
            cursor: pointer;
        }
        .productBlock:focus{
            outline: none;
        }
        .productContainer div{
            display: grid;
            justify-content: center;
        }
        .shortDescript{
            width: 90%;
            height: 8.6vh;

            overflow: hidden;
            text-overflow: ellipsis;
            margin: auto;
            font-size: 0.9vw;
            color: #575656;
            font-weight: 200;
        }
        .productImg{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

    </style>
      <?php require "HeaderEn.php";?>
      <main>

             
          <div class="productContainer">
            <form action="" method="post">
            <?php 
                $productQuery = "Select * From product";
                $productRes = mysqli_query($conn,$productQuery);
                $productArr = mysqli_fetch_all($productRes,MYSQLI_NUM);
                $pClass = "";
               
                for ($i = 0; $i < count($productArr) ; $i++) {
                   if(isset($_POST['product'.$i])){
                    $updateId = $productArr[$i][0];
                 
                    $updateQuery = "Update productcookie Set productId = '".$updateId."' where id = '1';";
                    mysqli_query($conn,$updateQuery);
                    $pClass = "redirectClass";
                   }
               }
               for ($i = 0; $i < count($productArr); $i++) {
                   echo '<div id="pBlock" class="'.$pClass.'"><button type="submit" name="product'.$i.'" class="productBlock">
                  <div>
                    <div class="productFrame">
                      <img src="'.$productArr[$i][8].'" class="productImg">
                  </div>
                </div>
                <div>
                    <div class="productName">'.$productArr[$i][1].'</div>
                </div>
                <div><div class="productPrice">'.$productArr[$i][2].' kzt</div></div>
                <div><div class="shortDescript">'.$productArr[$i][7].'</div></div>
              </button></div>';

               }

               

             ?>
              </form>
          </div>
      </main>
       <?php require "FooterEng.php";?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script type="text/javascript">
      var redirect = document.getElementById('pBlock');
      if(redirect.classList.contains("redirectClass")){
           window.location.href = "http://localhost/finallab/Product%20page.php";
      }  
</script>

</body>
</html>