<?php
include('header.php');
?>
 <div class="col-md-12">  

      <h2>Menu list</h2>
      <form action="admin-add-menu" method="post" class="text-right">
        <button type="submit" class="btn btn-primary">Add Menu</button>
      </form>
      <div class="table-responsive" style="margin-top:20px ">
        <table class="table table-striped table-sm" id="datatable">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Menu Name</th>
              <th>Action</th>
              <th>Action</th>
              <th>Visibility</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
             <?php
        if($menu_list)
        {
            $cnt = 1;
            foreach ($menu_list as $ml)
            {
                ?>
                <tr>
                    <!-- <td></td> -->
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $ml->menu_name;?></td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin-edit-menu'); ?>">
                        <input type="hidden" name="menu_id" value="<?php echo $ml->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin-delete-menu'); ?>">
                        <input type="hidden" name="menu_id" value="<?php echo $ml->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red" onclick="return del_menu();">Delete</button>
                        </form>
                    </td>
                    <td>
                      <?php 
                      if($ml->visibility == 'visible')
                      {
                      ?>
                        <form method="POST" action="<?php echo base_url('admin-menu_visibility');?>">
                        <input type="hidden" name="menu_id" value="<?php echo $ml->id; ?>">
                        <input type="hidden" name="menu_visibility" value="invisible">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: green;border-color: green">Visible</button>
                        </form>
                      <?php
                      }
                      else
                      {
                      ?>
                        <form method="POST" action="<?php echo base_url('admin-menu_visibility');?>">
                        <input type="hidden" name="menu_id" value="<?php echo $ml->id; ?>">
                        <input type="hidden" name="menu_visibility" value="visible">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red">Invisible</button>
                        </form>
                      <?php
                      }
                      ?>
                      </td>
                    <td>
                      <?php 
                      if($ml->action == 'enable')
                      {
                      ?>
                        <form method="POST" action="<?php echo base_url('admin-menu_action');?>">
                        <input type="hidden" name="menu_id" value="<?php echo $ml->id; ?>">
                        <input type="hidden" name="menu_action" value="disable">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: green;border-color: green">Enable</button>
                        </form>
                      <?php
                      }
                      else
                      {
                      ?>
                        <form method="POST" action="<?php echo base_url('admin-menu_action');?>">
                        <input type="hidden" name="menu_id" value="<?php echo $ml->id; ?>">
                        <input type="hidden" name="menu_action" value="enable">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red">Disable</button>
                        </form>
                      <?php
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
<script type="text/javascript">
 function del_menu()
{
    if(confirm('Are you sure you want to delete the menu?'))
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
