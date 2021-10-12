<?php
include('header.php');
?>
      <h2>Blogs list</h2>
      <div class="table-responsive" style="margin-top:20px ">
        <table class="table table-striped table-sm" id="datatable">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Title</th>
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
                    <td><?php echo $b->title; ?></td> 
                    <td>
                        <form method="POST" action="<?php echo base_url('qa-view-blog'); ?>" target="_blank">
                        <input type="hidden" name="e_id" value="<?php echo $b->eid; ?>">
                        <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                        <button type="submit" class="btn btn-custon-three btn-primary">View</button>
                        </form>
                    </td>
                    <td>
                      <?php
                        if($b->qa_approval == '' || $b->qa_approval == 'no')
                        {
                          ?>
                          <form method="POST" action="<?php echo base_url('qa-approval_yes-blog'); ?>">
                          <input type="hidden" name="e_id" value="<?php echo $b->eid; ?>">
                          <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                          <button type="submit" class="btn btn-custon-three btn-primary" style="background: red;border-color: red" onclick="return approval_yes();">No</button>
                          </form>
                          <?php
                        }
                        else
                        {
                          ?>
                          <form method="POST" action="<?php echo base_url('qa-approval_no-blog'); ?>">
                          <input type="hidden" name="e_id" value="<?php echo $b->eid; ?>">
                          <input type="hidden" name="b_id" value="<?php echo $b->id; ?>">
                          <button type="submit" class="btn btn-custon-three btn-primary" style="background: green;border-color: green" onclick="return approval_no();">Yes</button>
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
 function approval_yes()
{
    if(confirm('Are you sure you want to Approve the blog?'))
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

function approval_no()
{
    if(confirm('Are you sure you want to Not Approve the blog?'))
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

