<?php
include('header.php');
?>
<div class="col-md-3"></div>

<div class="col-md-6"> 
      <h2>Edit Sub Menu</h2>
      
<form name="sub_menu_edit_form" id="sub_menu_edit_form" method="post" action="admin-update_sub_menu">
  <?php
    if($sub_menu_list)
    {
      foreach($sub_menu_list as $sml)
      {
        ?>
          <div class="form-row">
          <div class="form-group col-md-12">
              <label for="email">Menu Name:</label>
              <select class="form-control" id="exampleFormControlSelect2" name="menu_id">
              <?php
            if ($menu_list) {
                foreach ($menu_list as $r) {
                    ?>
                    <option value="<?php echo $r->id; ?>" <?php if($r->id == $sml->menu_id){ echo "selected";}?>><?php echo $r->menu_name; ?></option>
                    <?php
                }
            }
             ?>
            </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
    <label>Sub Menu Name:</label>
              <input type="text" class="form-control" id="sub_menu" name="sub_menu" placeholder="Sub Menu" value="<?php echo $sml->sub_menu_name;?>" required="">
            </div>
          </div>
          <input type="hidden" name="sub_menu_id" value="<?php echo $sml->id; ?>">
        <?php
      }  
    }
  ?>  
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Title:</label>
      <input type="text" class="form-control" id="title" name="title" value="<?php echo $sml->title; ?>" placeholder="Title" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Meta Description:</label>
      <textarea class="form-control" name="metad" id="metad" placeholder="Meta Description" rows="4" required=""><?php echo $sml->metad; ?></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="sub_menu_edit">Edit</button>
</form>
</div>
<div class="col-md-3"></div>
<?php 
include('footer.php');
?>
