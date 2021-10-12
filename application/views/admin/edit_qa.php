<?php
include('header.php');
?>
<div class="col-md-3"></div>

<div class="col-md-6"> 
      <h2>Edit QA</h2>
      
<form name="qa_edit" id="qa_edit" method="post" action="admin-update_qa">
<?php
foreach ($qa as $e) {
    ?>
    <input type="hidden" name="id" value="<?php echo $e->id; ?>">
  <div class="form-row">
          <div class="form-group col-md-12">
    <label>Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $e->username; ?>" required="">
          </div>
        </div>
        <span id="usernameErr" class="text-danger"></span>
        <div class="form-row">
          <div class="form-group col-md-12">
    <label>Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $e->password; ?>" required="">
          </div>
        </div>
        <span id="passwordErr" class="text-danger"></span>
<?php
}
?>
  <span id="subjectErr" class="text-danger"></span>
  <button type="submit" class="btn btn-primary" id="qa_edit">Edit</button>
</form>
</div>
<div class="col-md-3"></div>
<?php 
include('footer.php');
?>
