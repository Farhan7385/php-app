<?php
include('header.php');
?>
<div class="col-md-3"></div>

<div class="col-md-6"> 
      <h2>Add QA</h2>
      
<form name="qa_form" id="qa_form" method="post" action="admin-insert_qa">
        <div class="form-row">
          <div class="form-group col-md-12">
    <label>Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
          </div>
        </div>
        <span id="usernameErr" class="text-danger"></span>
        <div class="form-row">
          <div class="form-group col-md-12">
    <label>Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
          </div>
        </div>
        <span id="passwordErr" class="text-danger"></span>
        <button type="submit" class="btn btn-primary" id="qa_add">Add</button>
      </form>
</div>
<div class="col-md-3"></div>
<?php 
include('footer.php');
?>
