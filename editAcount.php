<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit acount</title>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <style type="text/css">
     /**{
        border: 1px solid black;
     }*/ 
     body{
        background-color: #fafafa;
     }
         .mainBlock{
            width: 60%;
            margin: auto;
            margin-top: 15vh;
            background-color: #f5f5f5;
            padding-top: 3vh;
            border-radius: 2vh;
         }
         .mainBlock form{
            display: grid;
            grid-template-rows: 3fr 4fr 1fr;
            padding: 1vh 3vh 1vh 3vh;
         }
         .imageConatainer{
            width: 60%;
            height: 100%;
            margin: auto;
            display: grid;
            grid-template-rows: 5fr 2fr;
            
        
         }
         .ProfileImg{
            width: 40vh;
            height: 40vh;
            margin: auto;
         }
         .insertFile{
            display: grid;
            grid-template-rows: 1fr 1fr;
            grid-row-gap: 1vh;
         }
         .insertFile div{
            width: 100%;
            display: grid;
            justify-content: center;
            align-items: center;
            padding: 1vh 0 1vh 0;
         }
         .deleteImage{
            margin: auto;
            padding: 1vh 21vh 1vh 21vh;
            border: 0;
            border-radius: 1vh;
            font-size: 1.2vw;
            background-color: #ff404d;
            color: white;
         }
         .deleteImage:focus{
            outline: 0.5vh solid #fc9a9a;
            box-shadow: 1px 1px 1px #fc9a9a;

         }
         .editInfo{
            padding: 2vh 5vh 2vh 5vh;
            display: grid;
            grid-template-columns: 1fr 4fr;
            grid-column-gap: 2vh;
            grid-row-gap: 3vh;
         }
         .LabelBlock{
            display: grid;
            justify-content: flex-end;
            align-items: flex-start;
            padding-top: 1vh;
         }
         .inputBlock{
            display: grid;
            justify-content: flex-start;
            align-items: flex-start;

         }
         .LabelBlock label{
            font-size: 1.2vw;
            font-weight: 800;
            color: #363535;
         }
         .inputBlock input{
            width: 75vh;
            padding: 1.5vh;
            border-radius: 1vh;
            border: 0.5vh solid #d9d9d9;
            font-size: 1vw;
            font-weight: 300;
            color: #383838;
         }
         .inputBlock input:focus{
            outline: none;
         }
         .inputBlock textarea{
            width: 75vh;
            height: 40vh;
            resize: none;
            border-radius: 1vh;
            border: 0.5vh solid #d9d9d9;
            font-size: 1vw;
            font-weight: 300;
            color: #383838;
            overflow-y: scroll;
         }
         .btnBlock{
            display: grid;
            justify-content: center;
            align-items: flex-start;
         }
         .btnBlock div{
            width: 100vh;
           margin-top: 4vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-column-gap: 5vh;
         }
         .cancelBtn,.editBtn{
            padding: 1vh;
            border-radius: 1vh;
            border: 0;
            font-size: 1.2vw;
         }
         .cancelBtn{
            border: 0.3vh solid #999;
            color: #999;
            background-color: white;
         }
         .editBtn{
            background-color: #fcc24e;
            color: white;
         }
         .editBtn,.cancelBtn:hover{
            cursor: pointer;
         }

     </style>
    <?php require 'HeaderEn.php';?>

        <main>
         <?php 
             
             $newFname = $_POST['newFname'];
             $newEmail = $_POST['newEmail'];
             $newPhone = $_POST['newPhone'];
             $newStatus = $_POST['newStatus'];
             $edit = $_POST['edit'];
             $cancel = $_POST['cancel'];
             $redirectCl = "";
              if(isset($edit)){
                  $editQuery = "Update users set fullname='".$newFname."', phone = '".$newPhone."', email='".$newEmail."', status ='".$newStatus."' 
                  where id = '".$newArray[0][0]."';";
                  mysqli_query($conn,$editQuery);
                  $redirectCl = "redirectClass";
              }
              else if(isset($cancel)){
                  $redirectCl = "redirectClass";
              }
         ?>
            <div class="mainBlock <?php echo $redirectCl; ?>" id="mainBlock">
                <form action="" method="post">
                   <div class="editImg"><div class="imageConatainer">
                       <img src="<?php echo $newArray[0][7]; ?>" class="ProfileImg">
                       <div class="insertFile">
                           <div>
                            <div class="custom-file">
                              <input type="file" name="newImage" class="custom-file-input" id="customFile" accept="image/png, image/gif, image/jpeg">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                           <div><input type="submit" name="deleteImg" value="Delete" class="deleteImage"></div>
                       </div>
                   </div></div>
                   <div class="editInfo">
                       <div class="LabelBlock"><label for="fname">Fullname:</label></div>
                       <div class="inputBlock"><input type="text" name="newFname" id="fname" value="<?php echo $newArray[0][1]?>"></div>
                       <div class="LabelBlock"><label for="myEmail">Email:</label></div>
                       <div class="inputBlock"><input type="text" name="newEmail" id="myEmail" value="<?php echo $newArray[0][3]?>"></div>
                       <div class="LabelBlock"><label for="myPhone">Phone:</label></div>
                       <div class="inputBlock"><input type="text" name="newPhone" id="myPhone" value="<?php echo $newArray[0][2]?>"></div>
                       <div class="LabelBlock"><label for="myStatus">Status:</label></div>
                       <div class="inputBlock"><textarea id="myStatus" name="newStatus"><?php echo $newArray[0][8]?></textarea></div>
                   </div>
                   <div class="btnBlock">
                       <div><input type="submit" name="cancel" value="Cancel" class="cancelBtn">
                       <input type="submit" name="edit" value="Edit" class="editBtn"></div>
                   </div> 
                </form>  
            </div>
        </main>
        <?php require 'FooterEng.php'?>
        <script type="text/javascript">
           var  redirect = document.getElementById("mainBlock");
           if(redirect.classList.contains("redirectClass")){
              window.location.href = "http://localhost/finallab/userAcount.php";
           }
        </script>
</body>
</html>