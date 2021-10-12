<?php
include('header.php');
?>
<div class="col-md-3"></div>

<div class="col-md-6">
      <h2>Edit Menu</h2>
      
<form name="menu_edit" id="menu_edit" method="post" action="admin-update_menu">
<?php
foreach ($menu_list as $ml)
{
?>
  <div class="form-row">
    <div class="form-group col-md-12">
      <input type="hidden" name="menu_id" value="<?php echo $ml->id; ?>">
    <label>Menu Name:</label>
      <input type="text" class="form-control" id="menu" name="menu" value="<?php echo $ml->menu_name; ?>" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Title:</label>
      <input type="text" class="form-control" id="title" name="title" value="<?php echo $ml->title; ?>" placeholder="Title" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Meta Description:</label>
      <textarea class="form-control" name="metad" id="metad" placeholder="Meta Description" rows="4" required=""><?php echo $ml->metad; ?></textarea>
    </div>
  </div>
<?php
}
?>
  
  <button type="submit" class="btn btn-primary" id="menu_edit">Edit</button>
</form>
</div>
<div class="col-md-3"></div>
<?php 
include('footer.php');
?>
