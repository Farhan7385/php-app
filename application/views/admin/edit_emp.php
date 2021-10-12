<?php
include('header.php');
?>
<div class="col-md-3"></div>

<div class="col-md-6">
      <h2>Edit Employee</h2>
      
<form name="subject_edit" id="subject_edit" method="post" action="admin-update_emp">
<?php
foreach ($emp as $e) {
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
  <button type="submit" class="btn btn-primary" id="sub_edit">Edit</button>
</form>
</div>
<div class="col-md-3"></div>
<?php 
include('footer.php');
?>
