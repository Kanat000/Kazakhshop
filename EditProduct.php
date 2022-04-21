<?php 
require 'Backend.php';
?>
	 <script type="text/javascript">
    var menulist = document.getElementById('m1');
          var link = document.getElementById('a1');
          menulist.classList.add("active");
          link.classList.add("active");       
   </script>

<div class="main">
     <form class="editSearchForm">
        <div class="editSearchBox">
          <input type="text" name="search" class="editSearch" placeholder="Name of product">
        </div>
        <div class="editSearchBtnBlock"><input type="submit" name="search" value="Search" class="editSearchBtn"></div>
     </form>
   
   <div class="editResultTable">
     <div class="editTopTable">
       <div class="editBlock">
         <div>Id</div>
         <div>Name</div>
         <div>Descript</div>
         <div>Price</div>
         <div>Url</div>
         <div>Tags</div>
         <div></div>
         <div></div>
       </div>
     </div>
   <?php
    
    for ($i = 0; $i < 10 ; $i++) {
       echo '  <div class="editTable remove'.$i.'"  id="row'.$i.'">
       <div class="editBlock" id="column'.$i.'">
         <div>'.$i.'</div>
         <div>Шапан</div>
         <div>Жібек маталы оте мыкты шапан</div>
         <div>4000</div>
         <div>https:/url.com/image.png</div>
         <div>Для мужчин, новый</div>
         <div><button type="button" class="deleteBtn" onclick="DeleteRow('.$i.')" >Delete</button></div>
         <div><button type="button" class="editBtn" onclick="EditRow('.$i.')">Edit</button></div>
       </div>
     </div>';
    
       echo ' <form action="" method="post" class="addForm" id="editForm'.$i.'" style="width: 100%;background-color: white;border: 1px solid lightgrey;display:none">
        <div class="addSection firstSection">
        <div>
          <label for="productName" class="addLabel">Name of product</label>
          <input type="text" name="productName" id="productName" class="addInput" value="Шапан" style="border-radius: 0;outline: none;">
        </div>

        <div>
          <label for="productPrice" class="addLabel">Price of product(Kzt)</label>
          <input type="text" name="productPrice" id="productPrice" class="addInput" value="4000" style="border-radius: 0;outline: none;">
        </div>
      </div>

      <div class="addSection ">
          <label for="productPrice" class="addLabel">Description</label>
          <textarea name="productDescript" id="productDescript" class="addTextarea" style="border-radius: 0;outline: none;">Жібек маталы оте мыкты шапан</textarea>
        </div>
        
        <div class="addSection">
          <label for="imageUrl" class="addLabel">URL of image for product</label>
          <input type="text" name="imageUrl" id="imageUrl" class="addInput" value="https:/url.com/image.png" style="border-radius: 0;outline: none;">
        </div>
        
       
        
        <div class="addButtonBlock">
          <input type="submit" name="addBtn" class="addBtn" value="Edit" style="border-radius: 0;outline: none; background-color: #FFBA52; width: 90%;">
        </div>

      </form>';
   }
   ?>
  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/animejs@3.0.1/lib/anime.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script type="text/javascript">
      function DeleteRow (index) {
        var rowid ="row"+index;
        var row = document.getElementById(rowid);
        gsap.to(row, {    
            
            duration: 0.8,
           scaleX:0.2,
           scaleY:0.2,
            display: 'none',
            opacity: 0
        
        });
       
       
      }
      function EditRow(index){
           var rowid ="row"+index;
        var row = document.getElementById(rowid);
        row.style.display = 'none';
        var editFormid ="editForm"+index;
        var editForm = document.getElementById(editFormid);
        editForm.style.display = '';
      }
    </script>

    </div>
    
 

    </div>
  </div>
  </div>

</body>
</html>