<?php
include('header.php');
?>
      <h2>Blogs list</h2>
      <div class="table-responsive" style="margin-top:20px ">
        <table class="table table-striped table-sm" id="datatable">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Menu Name</th>
              <th>Sub Menu Name</th>
              <th>Title</th>
              <th>Action</th>
              <th>Action</th>
              <th>Action</th>
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
                        $smenu = $this->emp_model->getSubMenuIDwise($id);
                        foreach ($smenu as $r2) 
                        {
                           echo $r2->sub_menu_name;
                        }
                      ?>
                    </td>
                    <td><?php echo $b->title; ?></td>                    
                    <td>
                        <form method="POST" action="<?php echo base_url('emp-edit-blog'); ?>">
                        <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="<?php echo base_url('emp-view-blog'); ?>" target="_blank">
                        <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary">View</button>
                        </form>
                    </td>
                    <td>
                      <?php
                        if($b->publish == '' || $b->publish == 'no')
                        {
                          ?>
                          <form method="POST" action="<?php echo base_url('emp-publish-blog'); ?>">
                          <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                          <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red" onclick="return publish_blog();">Not Publish</button>
                          </form>
                          <?php
                        }
                        else
                        {
                          ?>
                          <form method="POST" action="<?php echo base_url('emp-unpublish-blog'); ?>">
                          <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                          <button type="submit" class="btn btn-custon-three btn-primary" style="background: green;border-color: green" onclick="return unpublish_blog();">Publish</button>
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
 function publish_blog()
{
    if(confirm('Are you sure you want to Publish the blog?'))
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

function unpublish_blog()
{
    if(confirm('Are you sure you want to Not Publish the blog?'))
    {
        return true;
    } 
    else 
    {
        return false;
    }
}
</script>

<?php 
include('footer.php');
?>
