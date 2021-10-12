<?php
include('header.php');
?>
 <div class="col-md-12">  

      <h2>Employee list</h2>
      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Assign to QA</button>
      <form action="admin-add-emp" method="post" class="text-right">
        <button type="submit" class="btn btn-primary">Add Emp</button>
      </form>
      <div class="table-responsive" style="margin-top:20px ">
        <table class="table table-striped table-sm" id="datatable">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Emp</th>
              <th>QA</th>
              <th>Action</th>
             
            </tr>
          </thead>
          <tbody>
             <?php
        if($emp_list)
        {
            $cnt = 1;
            foreach ($emp_list as $e)
            {
                ?>
                <tr>
                    <!-- <td></td> -->
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $e->username;?></td>
                    <td>
                      <?php
                      if($e->qa_id == 0)
                      {
                        echo "QA not Assigned";
                      }
                      else
                      {
                        $qa = $this->admin_model->getQAIDwise($e->qa_id);
                        foreach($qa as $q)
                        {
                          echo $q->username;
                        }
                      }
                      ?>
                    </td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin-edit-emp'); ?>">
                        <input type="hidden" name="id" value="<?php echo $e->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary">Edit</button>
                        </form>
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
      <form action="admin-assign-emp-qa" method="post">
    <div class="form-group">
      <label for="email">Emp Name:</label>
      <select class="form-control" id="exampleFormControlSelect2" name="assign_emp">
      <?php
if ($emp_list) {
    foreach ($emp_list as $r1) {
        ?>
        <option value="<?php echo $r1->id; ?>"><?php echo $r1->username; ?></option>
        <?php
    }
}
?>
    </select>
    </div>
    <div class="form-group">
      <label for="email">QA Name:</label>
      <select class="form-control" id="exampleFormControlSelect2" name="assign_qa">
          <?php
if ($qa_list) {
    foreach ($qa_list as $r) {
        ?>
        <option value="<?php echo $r->id; ?>"><?php echo $r->username; ?></option>
        <?php
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
</div>
<?php 
include('footer.php');
?>
