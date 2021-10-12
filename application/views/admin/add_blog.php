<?php
include('header.php');
?>
<script src="https://cdn.tiny.cloud/1/z7ni7ltd2y03u1ns7auocv1r2s6av2f6qyf3ex8x0v99xhja/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="col-md-3"></div>

<div class="col-md-6"> 
      <h2>Add Blog</h2>
<form name="blog_form" id="blog_form" method="post" action="admin-insert_blog" enctype="multipart/form-data">
  <div class="form-row"> 
    <div class="form-group col-md-12">
    <label>Title:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Title" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Writing Title:</label>
      <input type="text" class="form-control" id="wtitle" name="wtitle" placeholder="Writing Title" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>URL:</label>
      <input type="text" class="form-control" id="url" name="url" placeholder="URL" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Meta Description:</label>
      <textarea class="form-control" name="metad" id="metad" placeholder="Meta Description"rows="4" required=""></textarea>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Description:</label>
      <textarea class="form-control" id="description" name="description" placeholder="Description" rows="30"></textarea>
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
      <input type="text" class="form-control" id="img_url" name="img_url" placeholder="Image URL">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Image Alt:</label>
      <input type="text" class="form-control" id="alt" name="alt" placeholder="Image Alt">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
    <label>Menu:</label>
      <select class="form-control" name="menu" id="menu" required="">
         <option value="">Choose Menu</option>
       <?php
       foreach ($menu_list as $ml)
            {
                ?>
             <option value="<?php echo $ml->id;?>"><?php echo $ml->menu_name;?></option>
         
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
         <option value="">Choose Sub Menu</option>
         </select> 
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="blog_add">Add</button>
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
