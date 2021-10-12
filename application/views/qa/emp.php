<?php
include('header.php');
?>
   

      <h2>Employee list</h2>
      <div class="table-responsive" style="margin-top:20px ">
        <table class="table table-striped table-sm" id="datatable">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Emp</th>
              <th>View</th>             
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
                        <a href="<?php echo base_url('qa-blogs/'.$e->id);?>" class="btn btn-custon-three btn-primary">Blogs</a>
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
<?php 
include('footer.php');
?>
