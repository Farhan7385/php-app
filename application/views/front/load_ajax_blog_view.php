<?php
                    if($b_list)
                        {
                    
                        $count = 0;
                            foreach($b_list as $lb)
                            {
                                if($count % 2 == 0)
                                {
                                   ?>
                                   <div class="cw_blog_box load-data-wrap blog_box" data-id="<?php echo $lb->bid; ?>">
                                    <div class="row">
                                        <div class="col-md-6 order-md-6">
                                            <?php
                                                if(($lb->upload != '') && (!empty($lb->upload)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $lb->upload;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                elseif(($lb->img_url != '') && (!empty($lb->img_url)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <img src="<?php echo $lb->img_url;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <a class="blog-small-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                    </a>                                                
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="cw_head_h3"><a href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" class="text-dark"><?php echo $lb->title; ?></a></h3>
                                            <?php print_r(substr($lb->description,0,270).'..');?>
                                            <a class="cw_readMore" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" title="Read More">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                else
                                {
                                ?>          
                                <div class="cw_blog_box load-data-wrap blog_box" data-id="<?php echo $lb->bid; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                                if(($lb->upload != '') && (!empty($lb->upload)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <img src="<?php echo base_url(); ?>assets/uploads/<?php echo $lb->upload;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                elseif(($lb->img_url != '') && (!empty($lb->img_url)))
                                                {
                                                    ?>
                                                    <a class="blog-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <img src="<?php echo $lb->img_url;?>" alt="<?php echo $lb->alt; ?>">
                                                    </a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <a class="blog-small-preview mouseover-1" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>">
                                                        <h3 style="color: white;padding: 20px;">No Image Uploaded</h3>
                                                    </a>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="cw_head_h3"><a href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" class="text-dark"><?php echo $lb->title; ?></a></h3>
                                            <?php print_r(substr($lb->description,0,270).'..');?>
                                            <a class="cw_readMore" href="<?php echo base_url('in/'.$name.'/'.$lb->url);?>" title="Read More">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                    <?php
                                }
                                $count++;                                
                            }
                    }
                    ?>