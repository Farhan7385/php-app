<?php
include('header.php');
?>
   
<div class="col-md-12">
      <h2>Sub Menu list</h2>
      <form action="admin-add-sub-menu" method="post" class="text-right">
        <button type="submit" class="btn btn-primary">Add Sub Menu</button>
      </form>
      <div class="table-responsive" style="margin-top:20px ">
        <table class="table table-striped table-sm" id="datatable">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Menu Name</th>
              <th>Sub Menu Name</th>
              <th>Action</th>  
              <th>Action</th>
              <th>Visibility</th>
              <th>Action</th>              
            </tr>
          </thead>
          <tbody>
             <?php
        if($sub_menu_list)
        {
            $cnt = 1;
            foreach ($sub_menu_list as $ml)
            {
                ?>
                <tr>
                    <!-- <td></td> -->
                    <td><?php echo $cnt; ?></td>
                    <td><?php 
                    $id = $ml->menu_id;
                    $menu = $this->admin_model->getMenuIDwise($id);
                      foreach ($menu as $r2) 
                      {
                         echo $r2->menu_name;
                      }
                    ?></td>
                    <td><?php echo $ml->sub_menu_name;?></td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin-edit-sub-menu'); ?>">
                        <input type="hidden" name="sub_menu_id" value="<?php echo $ml->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin-delete-sub-menu'); ?>">
                        <input type="hidden" name="sub_menu_id" value="<?php echo $ml->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red" onclick="return del_submenu();">Delete</button>
                        </form>
                    </td>
                    <td>
                      <?php 
                      if($ml->visibility == 'visible')
                      {
                      ?>
                        <form method="POST" action="<?php echo base_url('admin-submenu_visibility');?>">
                        <input type="hidden" name="sub_menu_id" value="<?php echo $ml->id; ?>">
                        <input type="hidden" name="submenu_visibility" value="invisible">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: green;border-color: green">Visible</button>
                        </form>
                      <?php
                      }
                      else
                      {
                      ?>
                        <form method="POST" action="<?php echo base_url('admin-submenu_visibility');?>">
                        <input type="hidden" name="sub_menu_id" value="<?php echo $ml->id; ?>">
                        <input type="hidden" name="submenu_visibility" value="visible">
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
                        <form method="POST" action="<?php echo base_url('admin-submenu_action');?>">
                        <input type="hidden" name="sub_menu_id" value="<?php echo $ml->id; ?>">
                        <input type="hidden" name="submenu_action" value="disable">
                        <button type="submit" class="btn btn-custon-three btn-primary" style="background: green;border-color: green">Enable</button>
                        </form>
                      <?php
                      }
                      else
                      {
                      ?>
                        <form method="POST" action="<?php echo base_url('admin-submenu_action');?>">
                        <input type="hidden" name="sub_menu_id" value="<?php echo $ml->id; ?>">
                        <input type="hidden" name="submenu_action" value="enable">
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
 function del_submenu()
{
    if(confirm('Are you sure you want to delete the sub menu?'))
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
