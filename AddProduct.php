<?php 
require 'Backend.php';
?>
     
     <script type="text/javascript" >
          var menulist = document.getElementById('m2');
          var link = document.getElementById('a2');
          menulist.classList.add("active");
          link.classList.add("active");      
    </script>


    <div class="main">
     <form action="" method="post" class="addForm">
        <div class="addSection firstSection">
        <div>
          <label for="productName" class="addLabel">Name of product</label>
          <input type="text" name="productName" id="productName" class="addInput" placeholder="Курт, май...">
        </div>

        <div>
          <label for="productPrice" class="addLabel">Price of product(Kzt)</label>
          <input type="text" name="productPrice" id="productPrice" class="addInput" placeholder="3000">
        </div>
      </div>

      <div class="addSection ">
          <label for="productPrice" class="addLabel">Description</label>
          <textarea name="productDescript" id="productDescript" class="addTextarea" placeholder="Give a more information about product for user confort.

Рецепт, Срок, Лицензии...
Откуда товар, Размеры, Материал...
О документах, Страна, Знаминитость товара..."></textarea>
        </div>
        
        <div class="addSection">
          <label for="imageUrl" class="addLabel">URL of image for product</label>
          <input type="text" name="imageUrl" id="imageUrl" class="addInput" placeholder="https://examle.com/img/example.jpg">
        </div>
        
        <div class="addCheckTable">
          <div class="addCheckColumn">
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">New</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">Modern</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">For Male</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">For Female</label></div>
          </div>
          
          <div class="addCheckColumn">
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">For Child</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">Suit</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">Food</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">Specified</label></div>   
          </div>

          <div class="addCheckColumn">
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">Home</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">Original</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">Popular</label></div>
            <div class="addCheckBlock"><input type="checkbox" name="check_1" id="check_1" class="addCheckBox"><label for="check_1" class="addCheckLabel">For Family</label></div> 
          </div>

        </div>
        
        <div class="addButtonBlock">
          <input type="submit" name="addBtn" class="addBtn" value="ADD">
        </div>

      </form>
    </div>
  </div>
  </div>

</body>
</html>