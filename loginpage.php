<!DOCTYPE html>
<html>
<head>
	<title>Войти/Рeгистрация</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/55c9606e23.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="Styles/logstyle.css">
<style type="text/css" media="screen">
      .container{
        margin-top: 10vh;
        margin-bottom: 10vh;
      }
     .isFalse{
      margin-left:4vh;
      border: 1px solid red;
      border-radius: 5px;
      width: 100%;
      padding: 1.2vh;
     
    }
    .falseBox{
    width: 3vh;
    height: 3vh;
    border:1px  solid red;
    }
    .note{
    	margin-left: 4vh;
    	font-size: 0.8vw;
    	color: red;
    	padding: 0px; 
    }

</style>

	<?php 
    
    require 'HeaderEn.php';
    
	 ?>
	 <?php 
     error_reporting(0);
        $checkFname = 'inputStyle';
        $checkEmail = 'inputStyle';
        $checkPhone = 'inputStyle';
        $checkPass = 'inputStyle';
        $checkRePass = 'inputStyle';
        $checkAgree = 'checkbox';
        
        $noteFname = '';
        $noteEmail = '';
        $notePhone = '';
        $notePass = '';
        $noteRepass = '';
        $noteAgree = '';    

        $wrongUser = '';
        $redirect = '';
	  ?>
	      	<?php
	    
        
        
        $fullname = $_POST['fullname'];
        $registEmail = $_POST['RegistEmail'];
        $phone = $_POST['phone'];
        $registPass = $_POST['RegistPass'];
        $repass = $_POST['Repass'];
        $type = $_POST['type'];
        $registerBtn = $_POST['registBtn'];
        $agree = $_POST['agree'];

        $loginEmail = $_POST['loginEmail'];
        $loginpass = $_POST['Loginpass'];
        $loginBtn = $_POST['singupBtn'];

       

        if(isset($registerBtn)){
        	
        	if(strlen($fullname) < 4){
              $checkFname = 'isFalse';
              $noteFname = 'Пожалуюста, напишите правилный Фио!!!';
        	}
        	

			
			else if (!filter_var($registEmail, FILTER_VALIDATE_EMAIL)) {
				$checkEmail = 'isFalse';
				$noteEmail = 'Пожалуюста, напишите правилный Е-майл!!!';
			}
		

			
			else if (strlen($phone) != 11 || is_numeric($phone) == false) {
				$checkPhone = 'isFalse';
				$notePhone = 'Пожалуюста, напишите правилный тел.номер!!!';
				}
				
            
            else if (strlen($registPass) < 6) {
            	$checkPass = 'isFalse';
            	$notePass  = 'Пожалуюста, напишите сильный пароль!!!';
            }
           

            else if ($registPass != $repass) {
            	$checkRePass = 'isFalse';
            	$noteRepass = 'Ваш пароль не совпадает с подтверж-дением пароля!!!';
            }
          

            else if (isset($agree) == false) {
            	$checkAgree = 'falseBox';
            	$noteAgree = 'Пожалуюста, примините наши условии!!!';
            }
           

            else{
            	
                $sql = "INSERT INTO users(fullname,phone,email,pass,type,userMoney,image,status)
                                values ('".$fullname."','".$phone."','".$registEmail."','".$registPass."','".$type."',0,'https://sman11tangerangselatan.sch.id/images/user-u.jpg','I am new user in this website,I think this website will helpfull for my sales or buys...';)";
                $res = mysqli_query($conn,$sql);
                	
                 $update = "Update cookie Set logged=true,email='".$registEmail."' where id = 0";
                 	mysqli_query($conn,$update);
                  $redirect = "redirect";
            }
					

        	}
           
        
        elseif (isset($loginBtn)) {
        	$conn = $connection -> getConnect();
        	$searchUser = mysqli_query($conn,"SELECT email FROM users where email ='".$loginEmail."'");
        	$checkUser = mysqli_query($conn,"SELECT pass FROM users where email ='".$loginEmail."'");
        	$checkUserPass = mysqli_fetch_all($checkUser,MYSQLI_NUM);

        	if(mysqli_num_rows($searchUser) > 0){
                 if ($checkUserPass[0][0] == $loginpass) {
                 	$sql = "Update cookie Set logged=true,email='".$loginEmail."' where id = 0";
                 	mysqli_query($conn,$sql);
                  $redirect = "redirect";

                 }
                 else {
                 	$wrongUser = 'Неверный логин/пароль, повтарите пажалуюста!!!';
                 }
        	}
        	else {
        		$wrongUser = 'Неверный логин/пароль, повтарите пажалуюста!!!';
        	}
        }

	?>


<div class="container row p-0 <?php echo $redirect?>" id = "main">
	<div class="col-lg-12 col-md-12 col-sm-12 row p-0 m-0 heedForm">
		<div class="col-lg-6 col-md-6 col-sm-6 text-center sing s1" id="logSing">Войти</div>
		<div class="col-lg-6 col-md-6 col-sm-6 text-center sing s2" id="registSing">Регистрация</div>
	

	</div>
		<div class="col-lg-12 col-md-12 col-sm-12 cntpad"><div class="line"></div></div>
		<div class="col-lg-12 col-md-12 col-sm-	12 cntpad"><hr></div>
	<div class="col-lg-12 col-md-12 col-sm-12 cntpad">
		<form action="" method="post" class="row form" id="registForm">
			<div class="col-lg-4 col-md-4 col-sm-4 p-0 deviderspace fs"><label for="fname" class="w-100">ФИО</label></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0 deviderspace fs"><input type="text" name="fullname" id="fname" value="<?php echo $fullname; ?>" placeholder="Сергей Сергейович Сергейов" class="<?php echo $checkFname ?>"></div>
			<div class="col-lg-4 col-md-4 col-sm-4 p-0"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0"><div class="note"><?php echo $noteFname ?></div></div>

			<div class="col-lg-4 col-md-4 col-sm-4 p-0 deviderspace "><label for="email" class=" w-100">Email</label></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0 deviderspace"><input type="text" name="RegistEmail" id="email" placeholder="example@gmail.com" value="<?php echo $registEmail; ?>" class="<?php echo $checkEmail ?>"></div>
			<div class="col-lg-4 col-md-4 col-sm-4 p-0"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0"><div class="note"><?php echo $noteEmail ?></div></div>

			<div class="col-lg-4 col-md-4 col-sm-4 p-0 deviderspace"><label for="phone" class=" w-100">Тел. номер</label></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0 deviderspace"><input type="text" name="phone" id="phone" placeholder="87000000000" value="<?php echo $phone; ?>" class="<?php echo $checkPhone ?>"></div>
			<div class="col-lg-4 col-md-4 col-sm-4 p-0"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0"><div class="note"><?php echo $notePhone ?></div></div>

			<div class="col-lg-4 col-md-4 col-sm-4 p-0 deviderspace"><label for="pass" class=" w-100">Пороль</label></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0 deviderspace"><input type="password" name="RegistPass" id="pass" placeholder="" value="<?php echo $registPass; ?>" class="<?php echo $checkPass ?>"></div>
			<div class="col-lg-4 col-md-4 col-sm-4 p-0"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0"><div class="note"><?php echo $notePass ?></div></div>

			<div class="col-lg-4 col-md-4 col-sm-4 p-0 deviderspace"><label for="Repass" class=" w-100">Подтверждение пароля</label></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0 deviderspace"><input type="password" name="Repass" id="Repass" placeholder="" value="<?php echo $repass; ?>" class="<?php echo $checkRePass ?>"></div>
			<div class="col-lg-4 col-md-4 col-sm-4 p-0"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0"><div class="note"><?php echo $noteRepass ?></div></div>

			<div class="col-lg-4 col-md-4 col-sm-4 p-0 deviderspace"><label for="type" class=" w-100">Тип пользователя</label></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0 deviderspace"><input type="text" name="type" id="type" placeholder="Продавец" class="inputStyle"></div>

			<div class="col-lg-2 col-md-2 col-sm-2 p-0 agreeDevider text-right checkblock"><input type="checkbox" name="agree" id="agree" class="<?php echo $checkAgree ?>"></div>
			<div class="col-lg-10 col-md-10 col-sm-10 p-0 deviderspace agreeblock"><label for="agree" class="w-100 agree" style="padding: 0px;">* Я соглашаюсь с правилами использования сервиса, 
			а также с передачей и обработкой моих данных в KazakhShop.</label></div>
            
      
			<div class="col-lg-12 col-md-12 col-sm-12 p-0 text-center"><div class="note"><?php echo $noteAgree ?></div></div>

			<div class="col-lg-12 col-md-12 col-sm-12 btnPlace text-center"><input type="submit" name="registBtn" value="Регистрация" class="btn text-white border-0 rounded"></div>
		</form>

	     <form action=""  method="post" class="row form" id="logForm" style="display: none;">
	     	<div class="col-lg-4 col-md-4 col-sm-4 p-0 fs"><label for="email" class=" w-100">Email</label></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0 fs"><input type="text" name="loginEmail" id="email" placeholder="example@gmail.com" class="inputStyle"></div>

			<div class="col-lg-4 col-md-4 col-sm-4 p-0 deviderspacelog"><label for="pass" class=" w-100">Пороль</label></div>
			<div class="col-lg-8 col-md-8 col-sm-8 p-0 deviderspacelog"><input type="password" name="Loginpass" id="pass" placeholder="" class="inputStyle"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 p-0 text-center mt-3"><label for="pass" class=" w-100 text-center text-danger"><?php echo $wrongUser ?></label></div>
			<div class="col-lg-12 col-md-12 col-sm-12 btnPlacelog text-center"><input type="submit" name="singupBtn" value="Войти" class="btn text-white border-0 rounded"></div>
            <div class="forgotpass"><a href="#">Забыли пароль</a></div>
	     </form>
	</div>
	
</div>
 
    <?php
       require "FooterEng.php";
      ?>

 
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
       <script type="text/javascript">
       	 var main = document.getElementById("main");
       	 if(main.classList.contains('redirect')){
       	 	window.location.href = "http://localhost/finallab/Payment%20Eng.php";
       	 }
       	 else{
         var log = document.getElementById("logSing");
         var regist = document.getElementById("registSing");
         var logForm = document.getElementById("logForm");
         var registForm = document.getElementById("registForm");
         log.addEventListener("click",function() {

         
         	registForm.style.display = "none";
         	
         	
         	anime({
 			 targets: '.container',
			 translateY: 10,
			   easing: 'spring(1, 200, 13, 0)'
			});
         

         	logForm.style.display = "";
         	
         	anime({
 			 targets: '.line',
			 translateX: '-100%',
			   easing: 'spring(1, 200, 13, 0)'
			});
         });
          regist.addEventListener("click",function() {
         	registForm.style.display = "";
         	logForm.style.display = "none";
         	anime({
 			 targets: '.line',
			 translateX: '0%',
			  easing: 'spring(1, 200, 13, 0)'
			});
				anime({
 			 targets: '.container',
			 translateY: '0%',
			   easing: 'spring(1, 200, 13, 0)'
			});

         });
        }
       </script>

</body>
</html>
