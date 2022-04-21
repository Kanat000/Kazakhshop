<!DOCTYPE html>
<html>
<head>
	<title>Backend page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Lobster+Two:ital@1&display=swap" rel="stylesheet">
  <style type="text/css" media="screen">
  	 /**{
  	 	border:1px solid black;
  	 }*/
     html, body{
      margin: 0;
      padding: 0;

     }
  	.window{
  		/*display: grid;*/
  		/*grid-template-areas: "header header header header header header header "
  		                     "aside main main main main main main ";*/

      height: 100vh;                     

  	}
    .slice{
      width: 100%;
      padding: 0;
      margin: 0;
      display:grid;
      grid-template-columns: 3fr 10fr;

    }
    li{
      list-style: none;
    }
    a{
      text-decoration: none;
      color: black;
    }
    a:hover{
      text-decoration: none;
      color: #ababab;
    }
  	.header{
  		grid-area: header;
  		display:grid;
      grid-template-columns: 7fr 3fr;
      height: 9vh;
      border-bottom: 1px solid #C8C8C8;
      padding:0.8vh 0 0.8vh 0;
      

  	}
  	.aside{
  		min-height: 100vh;
     
  	 background-color: #EDEDED;
     padding: 0px;
     margin:0px;	
  	}
  	.main{
  		min-height: 100vh;
  
       
  	}
    .logo{
      width: 25%;
      font-size: 1.8vw;
      font-family: 'Lobster', cursive ;
      margin-left: 10vh;
      text-align: center;
    }
    .adminname{
       width: 50%;
       font-size: 1.4vw;
       font-family: 'Lobster', cursive;
       margin-left: 2vh;
       padding: 0.9vh 0 0.9vh 0;
    }
    .avatar{
      width: 3.3vw;
      height: 3.3vw;
      
      border-radius: 50%;
    }
    .account{
      display:grid;
      grid-template-columns: 1fr 11fr;
    }
    .menulist{
      margin: 0;
      padding: 1vh 0 1vh 1vh;
      font-size: 1.2vw;
      margin-top: 4vh;
      width: 90%;
      margin-left: 10%;


    }
    .icons{
      width: 4vh;
      height: 4vh;
    }
    
    .listBlock{
      margin:0;
      padding: 0;
      width: 100%;
      margin-top: 10vh;
    }
    .listText{
      margin:0;
      padding: 0;
      padding-left: 2vh;
    }

    .menulist:hover{
      color: #ababab;

      cursor: pointer;
    }
    .active{
      color: white;
      background-color: #2E8EFF;
      border-radius: 1vh 0 0 1vh;
    }
    .active:hover{
      color: white;
      background-color: #2E8EFF;

    }

 /*------------------------------------------------------------------------------------------------------------------------------------------>>>>>   
     
*/


      /*                       ____     ____           _____      ____     ______    __   __
                              ||  ||   ||                  ||   ||    ||  ||    ||   ||   || 
                              ||__     ||___   ___     ____||   ||    ||  ||    ||   ||___||
                                  ||   ||             ||        ||    ||  ||    ||        ||  
                              ||__||   ||___          ||____    ||____||  ||____||        ||




*/
/*---------------------------------------------Css for AddProduct-------------------------------------------------------------------------->>>>>>
*/
 
 .addForm{
  width: 70%;
  margin:auto;
  background-color: #F4F4F4;
  padding: 6vh 3vh 9vh 3vh;
  margin-top: 10vh;
 }
 .addSection{
  width: 100%;
  margin-top: 4vh;
  padding: 0 5vh 0 5vh;
 }
 .firstSection{
  display:grid;
  grid-template-columns: 1fr 1fr;
  grid-column-gap: 6vh;
 }
 .addLabel{
  width: 100%;
  font-size: 1.3vw;
  font-weight: 600;
  text-align: center;
 }
 .addInput{
  width: 100%;
  padding: 2vh;
  border:0.1vh solid #C4C4C4;
  border-radius:1vh;
  margin-top: 2vh;
 font-size: 1.3vw;
 }
 .addTextarea{
  width: 100%;
  height: 40vh;
  resize: none;
  border:0.1vh solid #C4C4C4;
  border-radius: 1vh;
  font-size: 1.3vw;
 }
.addCheckTable{
  width: 100%;
  display:grid;
  grid-template-columns: 1fr 1fr 1fr;
  padding: 0 5vh 0 5vh;
  margin-top: 5vh;
}
.addCheckBlock{
  width: 70%;
  margin-left: 30%;
  margin-top: 3vh;
}
.addCheckBox{
  width: 1.3vw;
  height: 1.3vw;
}
.addCheckLabel{
  font-size: 1.2vw;
  margin-left: 1.5vh;
  font-weight: 500;
}
.addButtonBlock{
  width: 100%;
  text-align: center;
}
.addBtn{
  width: 85%;
  padding: 1.5vh;
  border-radius: 1vh;
  background-color: #2F73B1;
  color: white;
  border:0px;
  font-size: 1.3vw;
  margin-top: 10vh;
}
/*------------------------------------------------------------------End of style AddProduct------------------------------------------------------------------------>>>>>>*/
/*


                               ||                  ||  //
                               ||                  || //             
                               ||||||| ||  ||      ||//     /|||||   ||||\    /|||||  ||||||||
                               ||   || ||  ||      ||\\    ||   ||   ||  ||  ||   ||     ||
                               ||   || ||  ||      || \\   ||   ||   ||  ||  ||   ||     ||
                               ||||||| ||||||      ||  \\   \||||||  ||  ||   \||||||    ||
                                           ||
                                       ||  ||
                                       ||||||  
*/

/*------------------------------------------------------------------Style of EditProduct page---------------------------------------------------------------------->>>>>>*/

 
.editSearchForm{
  width: 70%;
  display:grid;
  grid-template-columns: 10fr 2fr;
  
  margin:auto;
  margin-top: 10vh;
}
.editSearch{
  width: 100%;
  border:1px solid #A7A7A7;
  padding: 1.5vh 2vh 1.5vh 2vh;
  outline: none;
  border-radius:3vh 0 0 3vh;
  font-size: 1.2vw;
}

.editSearch:focus{
  border:1px solid #68B7FF;
}
.editSearchBtn{
  width: 100%;
  background-color: #68B7FF;
  border:1px solid #0F27F8;
  border-radius: 0 1vh 1vh 0;
  color: white;
  font-size: 1.2vw;
  padding: 1.5vh;
}
  .editResultTable{
    width: 80%;
    padding: 0;
    margin:auto;
    margin-top: 15vh;
  }
   .editTopTable{
   width: 100%;
   margin-top: 5vh;
   background-color: #3e3bff;
   color: white;
   border-radius: 2vh 2vh 0 0;

  }  
  .editTopTable .editBlock{
    font-size: 1.5vw;
    border:0;
    padding: 2vh 0 2vh 0;
    margin-bottom: -3vh;
  }
 
  .editTable{
   width: 100%;
   margin-top: 5vh;
   
 
  }  

  .editBlock{
    width:100%;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    font-size: 1.3vw;
    column-gap: 2vh;
    align-items: center;
    border: 1px solid #9D9D9D;
    padding: 1vh 0 1vh 0;
    
  }
  .editBlock div{
    width: 11%;
    height: 5vh;
    text-align: center;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
   
   .deleteBtn{
    width: 100%;
    background-color: #FF4040;
    color: white;
    
    border: 0;

   }
   .editBtn{
    width: 100%;
    background-color: #FFBA52;
    color: white;
    
    border: 0;
     
   }

/*------------------------------------------------------------------End of style EditProduct----------------------------------------------------------------->>>>>>*/
/*


                                      ||||||\    
                                      ||    ||    /||||\    |||||||   ||  //    ||||||   ||||||\    ||||||\
                                      ||    ||   ||    ||   ||   ||   || //     ||       ||    ||   ||    ||
                                      |||||||    ||    ||   ||        ||//      ||||||   ||    ||   ||    ||
                                      ||    ||   ||||||||   ||        ||\\      ||       ||    ||   ||    ||
                                      ||    ||   ||    ||   ||   ||   || \\     ||       ||    ||   ||    ||
                                      ||||||/    ||    ||   |||||||   ||  \\    ||||||   ||    ||   ||||||/


*/

/*------------------------------------------------------------------Style of Orders page---------------------------------------------------------------------->>>>>>*/   



  
  </style>
  
</head>
<body>
	<div class="window">
		<div class="header">
			<div class="logoblock"><div class="logo">Kazakhshop</div></div>
            <div class="account">
            	<div class="userImage"><img src="https://images.unsplash.com/photo-1578472577660-6f4a47a6660d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=540&q=80" alt="avatar" class="avatar"></div>
            	<div class="adminname">Kanat Orynbaev</div>
            </div> 
		</div>
     
     <div class="slice">
      <div class="aside">
      <ul class="listBlock">

         <li class="menulist" id="m0">
          <a href="http://localhost/kazakhshop/Backend/Products.php" id="a0"><img src="icons/product.png" alt="icon" class="icons"><span class="listText">Products</span></a>
        </li>
        <li class="menulist" id="m1">
          <a href="http://localhost/kazakhshop/Backend/EditProduct.php" id="a1"><img src="icons/edit.png" alt="icon" class="icons"><span class="listText">Edit product</span></a>
        </li>

        <li class="menulist" id="m2">
          <a href="http://localhost/kazakhshop/Backend/AddProduct.php" id="a2">  
           <img src="icons/add.png" alt="icon" class="icons"><span class="listText">Add product</span></a>
        </li>

        <li class="menulist" id="m3">
          <a href="http://localhost/kazakhshop/Backend/Orders.php" id="a3"><img src="icons/orders.png" alt="icon" class="icons"><span class="listText">Orders</span></a>
        </li>
        
        <li class="menulist" id="m4">
          <a href="http://localhost/kazakhshop/Backend/Delivery.php" id="a4"><img src="icons/delivery.png" alt="icon" class="icons"><span class="listText">Delivery</span></a>
        </li>
        
       

      </ul>
    </div>
	