<?php
include('header.php');
?>
<script src="https://cdn.tiny.cloud/1/z7ni7ltd2y03u1ns7auocv1r2s6av2f6qyf3ex8x0v99xhja/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="col-md-3"></div>

<div class="col-md-6"> 
      <h2>Edit Blog</h2>
      
<form name="blog_edit" id="blog_edit" method="post" action="admin-update_blog" enctype="multipart/form-data">
<?php
foreach ($b_list as $b)
{
?>
<input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
    <div class="form-row">
    <div class="form-group col-md-12">
    <label>Title:</label>
      <input type="text" class="form-control" id="title" name="title" value="<?php echo $b->title; ?>" placeholder="Title" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Writing Title:</label>
      <input type="text" class="form-control" id="wtitle" name="wtitle" value="<?php echo $b->wtitle; ?>" placeholder="Writing Title">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>URL:</label>
      <input type="text" class="form-control" id="url" name="url" value="<?php echo $b->url; ?>" placeholder="URL" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Meta Description:</label>
      <textarea class="form-control" name="metad" id="metad" placeholder="Meta Description" rows="4" required=""><?php echo $b->metad; ?></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Description:</label>
      <textarea class="form-control" id="description" name="description" placeholder="Description" rows="30"><?php echo htmlspecialchars($b->description); ?></textarea>
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-4">
    <label>Upload Image:</label>
      <input type="file" id="pic" name="pic">
    </div>
    <div class="form-group col-md-2" style="margin-left: 10px;margin-right: 10px;padding: 0px;flex: 0 0 3.333333%;">
      <h6>OR</h6>
    </div>
    <div class="form-group col-md-7" style="max-width: 58.333333%;">
    <label>Image URL:</label>
      <input type="text" class="form-control" id="img_url" name="img_url" placeholder="Image URL" value="<?php echo $b->img_url; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Image Alt:</label>
      <input type="text" class="form-control" id="alt" name="alt" placeholder="Image Alt" value="<?php echo $b->alt; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label>Popular Blog:</label> 
      <select class="form-control" name="popular" id="popular" required="">        
             <option value="no" <?php if($b->popular == 'no'){ echo "selected";}?>>No</option>
             <option value="yes" <?php if($b->popular == 'yes'){ echo "selected";}?>>Yes</option>
      </select> 
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label>Homepage Blog:</label> 
      <select class="form-control" name="homepage" id="homepage" required="">        
             <option value="no" <?php if($b->homepage == 'no'){ echo "selected";}?>>No</option>
             <option value="yes" <?php if($b->homepage == 'yes'){ echo "selected";}?>>Yes</option>
      </select> 
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Menu:</label>
      <select class="form-control" name="menu" id="menu" required="">
        <?php
        foreach ($menu_list as $ml)
            {
                ?>
             <option value="<?php echo $ml->id;?>" <?php if($b->menu_id == $ml->id){ echo "selected";}?>><?php echo $ml->menu_name;?></option>
         
        <?php
            }
                ?>
         </select> 
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Sub Menu:</label>
      <select class="form-control" name="sub_menu_id" id="sub_menu_id">
         <?php
         $id = $b->sub_menu_id;
                    $smenu = $this->admin_model->getSubMenuIDwise($id);
                      foreach ($smenu as $sr2) 
                      {
                         ?>
                         <option value="<?php echo $b->sub_menu_id; ?>" <?php if($b->sub_menu_id == $sr2->id){ echo "selected";}?>><?php echo $sr2->sub_menu_name; ?></option>
                         <?php
                      }
          ?>
         </select> 
    </div>
  </div>
<?php
}
?>
  <input type="hidden" name="file_name" value="<?php echo $b->upload;?>">
  <button type="submit" class="btn btn-primary" id="t_edit">Edit</button>
</form>
</div>
<div class="col-md-3"></div>
<script>
    tinymce.init({
      selector: 'textarea#description',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker codesample code paste wordcount',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table codesample code wrapselection |  undo redo | bold italic | bullist numlist paste pastetext wordcount',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name'

    });
  </script>
<?php 
include('footer.php');
?>
