 
    <link rel="stylesheet" type="text/css" href="Styles/style new Footer ENG.css">
        <style>
        
        header{
            position: fixed;
            top: 0px;
            left: 0px;
            background-color: rgba(255, 255, 255, 0.863);
            width: 100%;
            height: 9vh;
            z-index: 3;
        }
        header a{
            text-decoration: none;
        }
        .head{
            display: grid;
            grid-template-columns: 1fr 7fr 0.5fr 2fr 2fr;
            height: 9vh;
        }
        .central-menu{
            display: flex;
            align-items: center;
            justify-content: space-around;
            height: 9vh;
        }
        .central-menu a{
            color: black;
            font-size: 1.1vw;
            font-weight: 600;
            width: 19vh;
            text-align: center;
        }
        .central-menu a:hover{
            color: black;
            opacity: 0.6;
        }
        .logotype{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .reserve a:hover{
            color: white;
            opacity: 0.6;
        }
         
             .bootstrap-select .dropdown-toggle .show {
                 border: 0 !important;
             }

            .dropdown ul li{
                padding: 0;
                margin: 0;
            }
            .dropdown ul {
                margin: 0;
                padding: 0;
             }     

            a.dropdown-item{
            margin: 0;
            padding: 1vh 0 1vh 2vh;

          }
          .acountContainer{
            width: 100%;
            height: 100%;
            margin: auto;
          }
          .acountBlock{
            height: 100%;
              display: grid;
              grid-template-columns: 2fr 4fr 1fr;
              background-color: #fffffff2;
          }
          .accountImage{
            
            display: grid;
            align-items: center;
            justify-content: center;
          }
           .imageFrame{
             width: 7vh;
             height: 7vh;
          }
          .avatar{
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
          }
          .acountWrapper{
               display: none;
               padding: 0;
               margin: 0;
               background-color: #fffffff2;
               border-top: 0.1vh solid #ebebeb;
               border-radius: 0 0 1vh 1vh;
          }
          .acountName{
            max-width: 20vh;
            font-size: 1.2vw;
            padding-left: 1vh;
            display: grid;
            overflow: hidden;
            align-items: center;
            white-space: nowrap;
            text-overflow: ellipsis;
          }
          .acountWrapper a{
            width: 100%;
        
            margin: 0;
            padding: 0;

          }
          .acountWrapper a li:hover{
            background-color: #d4d2d28b;
            color: #6b6a6a;
          }
          .wrapperList{ 
            width: 100%;
            list-style: none;
            margin: 0;
            padding: 1.5vh 0vh 1.5vh 3vh;
            font-size: 1vw;
            margin-top: 1vh;
            text-align: left;
          }
          .dropBlock{
             height: 100%;
             display: grid;
             align-items: center;
             padding-bottom: 1vh;
            
          }
          .dropIcon{
             width: 100%;
             height: 60%;
          }
          .noUserBlock{
            display: none;
          }
         .wrapperLast{
            width: 100%;
            list-style: none;
            margin: 0;
            margin-bottom: 2vh;
            margin-top: 1vh;
            text-align: left; 
         }
         .logOutBtn{
            width: 100%;
            height: 100%;
            background-color: #fffffff2;
            padding: 1.5vh 0vh 1.5vh 3vh;
            font-size: 1vw;
            font-weight: 700;
            border: 0;
             text-align: left;
             margin-bottom: 2vh;
         }
         .logOutBtn:hover{
             background-color: #d4d2d28b;
            color: #6b6a6a;
         }
          .logOutBtn:active{
            outline: none;
         }
         .moneyBlock{
            width: 80%;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 3fr;

         }
         .moneyIconBlock{
            display: grid;
            justify-content: center;
            align-items: center;
         }
         .moneyIcon{
            width: 80%;
            height: 90%;
         }
         .moneyText{
            display: grid;
            align-items: center;
            font-size: 1.1vw;
         }



/*=====================================footerstyle==========================================================*/          
         
          .footer-col ul {
              
              margin: 0;
              padding: 0;
           }
           
          .footer-col ul li{
              list-style: none;
              margin: 0;
              padding: 0;
           }
           .footer-col{
            font-size: 1.3vw;
           }

           .footer-col ul li a{
            font-size: 1.2vw;
           }

           .footer-col h4{
            font-size: 1.5vw;
           }
           .copyright{
                display: flex;
                justify-content: center;
                color: white;
                font-weight: 300;
                font-size: 1vw;
            }
           .footer-col .social-links {
                display: grid;
                grid-template-columns: 1fr 1fr;
                justify-content: center;
                align-items: center;

            }
         
           .footer-col .social-links a{
                display: grid;
                height: 7vh;
                width: 7vh;
                align-items: center;
                justify-content: center;
                background-color: rgba(255,255,255,0.2);
                margin:0 10px 10px 0;
                border-radius: 50%;
                color: #ffffff;
                transition: all 0.5s ease;
            }
         


        </style>
    </head>
    <body>

        <?php 
        error_reporting(0);
          $logout = $_POST['logout'];
          $acountClass = "noUserBlock";
          $moneyClass = "noUserBlock";
          $acountBtnClass = "";
          $reload = "";
           require 'connection.php';
           $connection = new connection;
           $conn = $connection -> getConnect();
           $query = "SELECT * From cookie";
           $output = mysqli_query($conn,$query);
           $cookieArr = mysqli_fetch_all($output,MYSQLI_NUM);

           $newCode = "SELECT * From users where email = '".$cookieArr[0][2]."'";
           $newResult = mysqli_query($conn,$newCode);
           $newArray = mysqli_fetch_all($newResult,MYSQLI_NUM);



           if($cookieArr[0][1] == 1){
               $acountClass = "acountContainer";
                 $moneyClass = "moneyBlock";
               $acountBtnClass = "noUserBlock";
           }
           else{
               $acountClass = "noUserBlock";
               $moneyClass = "noUserBlock";
               $acountBtnClass = "";

           }

           if (isset($logout)) {
               $newQuery = "Update cookie Set logged=false,email='' where id = 0;";
               mysqli_query($conn,$newQuery);
               $reload = "reload";
           }
           
         ?>
         

        <header class="<?php echo $reload; ?>" id="headerId">
            <div class="container-fluid">
                <div class="row head p-0">
                    <div class=" logotype">
                        <div class="logo">
                            <img src="Lab/others/logotype.png" alt="">
                        </div>
                    </div>
                    <div class="central-menu p-0">
                        <a href="indexTemp.php">Main</a>
                        <a href="AboutEng.php">About us</a>
                        <a href="ContactsEng.php">Contacts</a>
                        <a href="Payment Eng.php">Payment</a>
                        <a href="DeliveryEng.php">Delivery</a>
                      
                        <a class="btn btn-dark text-white reserve <?php echo $acountBtnClass;?>" href="loginpage.php" role="button">Account</a>
                    </div>
                    <div></div>
                    <div class="central-menu m-0 p-0">
                        <div class="<?php  echo $acountClass; ?>  ">
                            <div class="acountBlock">
                            <div class="accountImage">
                                <div class="imageFrame">
                                    <img src="<?php echo $newArray[0][7]; ?>" alt="" class="avatar">
                                </div>
                                
                            </div>
                            <div class="acountName">
                                <?php $usersName = explode("@", $newArray[0][3]); echo $usersName[0]?>
                            </div>
                            <div class="dropBlock">
                                <img src="https://cdn0.iconfinder.com/data/icons/arrow-glyph-2/32/down_triangle-512.png" alt="drop" class="dropIcon">
                            </div>
                            </div>
                            <div class="acountWrapper">
                                <a href="userAcount.php"><li class="wrapperList m-0">My Acount</li></a>
                                <a href="editAcount.php"><li class="wrapperList">Edit Acount</li></a>
                                <a href=""><li class="wrapperList">Change pass</li></a>
                                <li class="wrapperLast"><form action="" method="post"><input type="submit" name="logout" value="Log out" class="logOutBtn"></form></li>
                            </div>
                        </div>
                    </div>
                    <div class="central-menu">
                        <div class="<?php  echo $moneyClass; ?>">
                            <div class="moneyIconBlock"><img src="https://image.flaticon.com/icons/png/512/631/631180.png" class="moneyIcon"></div>
                            <div class="moneyText"><?php echo $newArray[0][6]; ?> kzt</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <script type="text/javascript">
            var header = document.getElementById("headerId");
            if(header.classList.contains("reload")){
                window.location.href = "http://localhost/finallab/Payment%20Eng.php";
            }
            else{
            var dropBtn = document.getElementsByClassName("dropIcon")[0];
            var dropBlock = document.getElementsByClassName("acountWrapper")[0];
            var dropped = false;
            
            dropBtn.addEventListener("click", function () {
                if(!dropped){
                    dropBlock.style.display="block";
                    dropped = true;
                }
                else{
                    dropBlock.style.display="none";
                    dropped = false;
                }
            });
        }
        


        </script>