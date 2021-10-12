<?php
include('header.php');
?>
 <div class="col-md-12">  

      <h2>QA list</h2>
      <form action="admin-add-qa" method="post" class="text-right">
        <button type="submit" class="btn btn-primary">Add QA</button>
      </form>
      <div class="table-responsive" style="margin-top:20px ">
        <table class="table table-striped table-sm" id="datatable">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>QA</th>
              <th>Action</th>
             
            </tr>
          </thead>
          <tbody>
             <?php
        if($qa_list)
        {
            $cnt = 1;
            foreach ($qa_list as $e)
            {
                ?>
                <tr>
                    <!-- <td></td> -->
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $e->username;?></td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin-edit-qa'); ?>">
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
</div>
<?php 
include('footer.php');
?>
