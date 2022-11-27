<div class="sub-heading-wraper">
   <h3 class="sub-heading">Categories</h3>
 </div>
 <div class="category-btns py-3">
   <?php
   require('_categories_array.php');
   foreach ($categories_array as $category) {
     echo '<a href="/category.php?category='.$category.'" class="category-button" type="submit">'.$category.'</a>';
   }
   ?>
 </div>
   