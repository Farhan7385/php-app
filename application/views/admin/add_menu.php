<?php
include('header.php');
?>
<div class="col-md-3"></div>

<div class="col-md-6"> 
      <h2>Add Menu</h2>
      
<form name="menu_form" id="menu_form" method="post" action="admin-insert_menu">
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Menu Name:</label>
      <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu" required="">
    </div>
  </div>
  <div class="form-row"> 
    <div class="form-group col-md-12">
    <label>Title:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Title" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Meta Description:</label>
      <textarea class="form-control" name="metad" id="metad" placeholder="Meta Description"rows="4" required=""></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="menu_add">Add</button>
</form>
</div>
<div class="col-md-3"></div>
<?php 
include('footer.php');
?>
