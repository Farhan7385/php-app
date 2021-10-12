<header class="cw_header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url();?>">CW</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto justify-content-end">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>" title="Home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('about');?>" title="About us">About us</a></li>
                    <?php
                    $mv_list = $this->front_model->getMenuVisible();
                    if($mv_list)
                    {
                        foreach($mv_list as $mvl)
                        {
                            $mv_id = $mvl->id;
                            $sm_list = $this->front_model->getSubMenu($mv_id);

                             if($sm_list)
                            {
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript: void(0)" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <?php echo ucfirst(str_replace("-"," ", $mvl->menu_name));?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">            
                                <?php
                                foreach($sm_list as $sml)
                                    {
                                ?>
                                   <a class="dropdown-item" href="<?php echo base_url('in/'.$sml->sub_menu_name);?>"><?php echo ucfirst(str_replace("-"," ", $sml->sub_menu_name));?></a>                                    
                                <?php
                                    }
                                ?>
                                    </div>
                                </li>
                                <?php
                            }
                            else
                            {
                                ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('in/'.$mvl->menu_name);?>" title="<?php echo ucfirst($mvl->menu_name);?>"><?php echo ucfirst($mvl->menu_name);?></a></li>
                                <?php
                            }
                        }
                    }
                    ?>         
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('contact');?>" title="Contact us">Contact us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>