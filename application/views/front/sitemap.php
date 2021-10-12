<?php header('Content-type: text/xml');?>
<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url(); ?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>

    <!-- Sitemap -->

    <url>
        <loc><?php echo base_url('about'); ?></loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>

    <url>
        <loc><?php echo base_url('contact'); ?></loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>

    <url>
        <loc><?php echo base_url('disclaimer'); ?></loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>

    <url>
        <loc><?php echo base_url('privacy-policy'); ?></loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>

    <url>
        <loc><?php echo base_url('terms-and-conditions'); ?></loc>
        <priority>0.8</priority>
        <changefreq>weekly</changefreq>
    </url>
    <?php
        $mv_list = $this->front_model->getMenu2();
            if($mv_list)
            {
                foreach($mv_list as $mvl)
                {
                    $mv_id = $mvl->id;
                    $sm_list = $this->front_model->getSubMenu2($mv_id);

                    if($sm_list)
                    {
                    ?>
                    <url>
                         <loc><?php echo base_url('in/'.$mvl->menu_name); ?> </loc>
                         <priority>0.8</priority>
                         <changefreq>weekly</changefreq>
                     </url>
                     <?php
                                foreach($sm_list as $sml)
                                    {
                                ?>
                                 <url>
                                     <loc><?php echo base_url('in/'.$sml->sub_menu_name); ?> </loc>
                                     <priority>0.8</priority>
                                     <changefreq>weekly</changefreq>
                                 </url>                                    
                                <?php
                                        $sub_name = $sml->sub_menu_name;
                                        $sm_blist = $this->front_model->getSubMenuBlog2($sub_name);
                                        if($sm_blist)
                                        {
                                            foreach($sm_blist as $sb)
                                            {
                                                ?>
                                                <url>
                                                     <loc><?php echo base_url('in/'.$sb->sub_menu_name.'/'.$sb->url); ?> </loc>
                                                     <priority>0.8</priority>
                                                     <changefreq>weekly</changefreq>
                                                 </url> 
                                                <?php
                                            }
                                        }

                                    }
                    }
                    else
                    {
                    ?>
                    <url>
                         <loc><?php echo base_url('in/'.$mvl->menu_name); ?> </loc>
                         <priority>0.8</priority>
                         <changefreq>weekly</changefreq>
                     </url>
                     <?php
                                        $menu_name = $mvl->menu_name;
                                        $m_blist = $this->front_model->getBlog2($menu_name);
                                        if($m_blist)
                                        {
                                            foreach($m_blist as $mb)
                                            {
                                                ?>
                                                <url>
                                                     <loc><?php echo base_url('in/'.$mb->menu_name.'/'.$mb->url); ?> </loc>
                                                     <priority>0.8</priority>
                                                     <changefreq>weekly</changefreq>
                                                 </url> 
                                                <?php
                                            }
                                        }
                    }
                }
            }
     ?>
</urlset>