<?php
include('header.php');
?>
<div class="col-md-12">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   

      <h2>Blog list</h2>
      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Assign to Emp</button>
      <form action="admin-add-blog" method="post" class="text-right">
        <button type="submit" class="btn btn-primary">Add Blog</button>
      </form>
      <div class="table-responsive" style="margin-top:20px ">
        <table class="table table-striped table-sm" id="datatable">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Menu Name</th>
              <th>Sub Menu Name</th>
              <th>Title</th>
              <th>QA Approval</th>
              <th>Emp Name</th>
              <th></th>
              <th>Action</th>
              <th>Action</th>
              <th>View</th>
              <th>Approval</th>
            </tr>
          </thead>
          <tbody>
        <?php
        if($blog_list)
        {
            $cnt = 1;
            foreach ($blog_list as $b)
            {
                ?>
                <tr>
                    <!-- <td></td> -->
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $b->menu_name; ?></td>
                    <td>
                      <?php
                        $id = $b->sub_menu_id;
                        $smenu = $this->admin_model->getSubMenuIDwise($id);
                        foreach ($smenu as $r2) 
                        {
                           echo $r2->sub_menu_name;
                        }
                      ?>
                    </td>
                    <td><?php echo $b->title; ?></td>
                    <td>
                      <?php 
                      if($b->emp_id == "" && empty($b->emp_id))
                      {
                        echo "Admin's Blog";
                      }
                      else
                      {
                        if($b->qa_approval == "")
                        {
                          echo "no";
                        }
                        else
                        {                          
                          echo $b->qa_approval;
                        }
                      }
                      ?>                        
                      </td>
                    <td>
                    <?php 
                    if($b->emp_id == "" && empty($b->emp_id))
                    {
                      echo "None";
                    }
                    else
                    {
                      $id = $b->emp_id;
                      $emp_username = $this->admin_model->getEmpIDwise($id);
                      foreach ($emp_username as $r2) 
                      {
                         echo $r2->username;
                      }
                    }
                    ?>
                    </td>
                    <td>
                    <?php 
                    if($b->emp_id != "" && !empty($b->emp_id))
                    {
                      ?>
                        <form method="POST" action="<?php echo base_url('admin-unassign-emp'); ?>">
                        <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary" onclick="return unassign();">Un Assign</button>
                        </form>
                    <?php
                    }?>
                    </td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin-edit-blog'); ?>">
                        <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin-delete-blog'); ?>">
                        <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red" onclick="return del_blog();">Delete</button>
                        </form>
                    </td>
                    <td>
                      <form method="POST" action="<?php echo base_url('admin-view-blog');?>" target="_blank">
                        <input type="hidden" name="b_id" value="<?php echo $b->id?>">
                        <button type="submit" class="btn btn-custon-three btn-primary">View</button>
                      </form>
                    </td>
                    <td>
                      <?php
                      if($b->publish == 'yes')
                      {
                        if($b->approval == 'live')
                        {
                          ?>
                          <form method="POST" action="<?php echo base_url('admin-blog_approval'); ?>">
                            <input type="hidden" name="b_id" value="<?php echo $b->id?>">
                            <input type="hidden" name="blog_action" value="not live">
                            <button type="submit" class="btn btn-custon-three btn-primary" style="background: green;border-color: green;" onclick="return approval();">Live</button>                        
                          </form>
                          <?php
                        }
                        else
                        {
                          ?>
                          <form method="POST" action="<?php echo base_url('admin-blog_approval'); ?>">
                            <input type="hidden" name="b_id" value="<?php echo $b->id?>">
                            <input type="hidden" name="blog_action" value="live">
                            <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red;" onclick="return approval();">Not Live</button>                        
                          </form>
                          <?php
                        }
                      }
                      else
                      {
                        if($b->approval == 'live')
                        {
                          ?>
                          <form method="POST" action="<?php echo base_url('admin-blog_approval'); ?>">
                            <input type="hidden" name="b_id" value="<?php echo $b->id?>">
                            <input type="hidden" name="blog_action" value="not live">
                            <button type="submit" class="btn btn-custon-three btn-primary" style="background: green;border-color: green;" onclick="return approval();">Live</button>                        
                          </form>
                          <?php
                        }
                        else
                        {
                          ?>
                          <form method="POST" action="<?php echo base_url('admin-blog_approval'); ?>">
                            <input type="hidden" name="b_id" value="<?php echo $b->id?>">
                            <input type="hidden" name="blog_action" value="live">
                            <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red;" onclick="return approval();">Not Live</button>                        
                          </form>
                          <?php
                        }
                      }
                      ?>
                    </td>
                </tr>
        <?php
        $cnt++;
            }
        }
        ?>
          </tbody>
        </table>
      </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
      <form action="admin-assign-emp" method="post">
    <div class="form-group">
      <label for="email">Emp Name:</label>
      <select class="form-control" id="exampleFormControlSelect2" name="assign_emp">
      <?php
if ($emp) {
    $cnt = 1;
    foreach ($emp as $r) {
        ?>
        <option value="<?php echo $r->id; ?>"><?php echo $r->username; ?></option>
        <?php
$cnt++;
    }
}
?>
    </select>
    </div>
    <div class="form-group">
      <label for="email">Blog Title:</label>
      <select class="form-control" id="exampleFormControlSelect2" name="assign_blog">
          <?php
if ($blog_list) {
    $cnt = 1;
    foreach ($blog_list as $r) {
        ?>
        <option value="<?php echo $r->id; ?>"><?php echo $r->title; ?></option>
        <?php
$cnt++;
    }
}
?>
    </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
 function del_blog()
{
    if(confirm('Are you sure you want to delete the blog?'))
    {
        return true;
    } 
    else 
    {
        return false;
    }
}
 function unassign()
{
    if(confirm('Are you sure you want to unassign the emp?'))
    {
        return true;
    }
    else
    {
        return false;
    }
}
 function approval()
{
    if(confirm('Are you sure you want to change approval status?'))
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>
</div>
<?php 
include('footer.php');
?>
