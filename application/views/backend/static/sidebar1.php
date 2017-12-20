<div class="layout-main">
    <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
            <div class="custom-scrollbar">
                <nav id="sidenav" class="sidenav-collapse collapse">
                    <form class="sidenav-form" action="" method="POST">
                        <div class="form-group form-group-sm">
                            <div class="input-with-icon">
                                <input class="form-control filtertxt"  type="text" placeholder="Search…">
                                <span class="icon icon-search input-icon"></span>
                            </div>
                        </div>
                    </form>
                    <ul class="sidenav level-1" id="social-sidebar-menu">
                        <li class="sidenav-search active">
<!--                            <form class="sidenav-form" action="" method="POST">-->
<!--                                <div class="form-group form-group-sm">-->
<!--                                    <div class="input-with-icon">-->
<!--                                        <input class="form-control filtertxt"  type="text" placeholder="Search…">-->
<!--                                        <span class="icon icon-search input-icon"></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </form>-->
                        </li>
                        <li class="sidenav-heading">Navigation</li>
                        <li class="sidenav-item active">
                            <a href="<?= base_url() ?>">
                                <span class="sidenav-icon icon icon-home"></span>
                                <span class="sidenav-label">Dashboard</span>
                            </a>
                        </li>
                        <?php
                        if(count($menu)>0)
                        {
                        for($i=0;$i<count($menu);$i++)
                        {
                        ?>
                        <li class="sidenav-item <?php if(!empty($menu[$i]['child'])){ echo 'has-subnav';}?>">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon <?php echo $menu[$i]['class']?>"></span>
                                <span class="sidenav-label"><?php echo $menu[$i]['name']?></span>
                            </a>
                            <?php
                            if(count($menu[$i]['child'])>0)
                            {?>
                            <ul class="sidenav level-2 collapse">
                                <li class="sidenav-heading"><?php echo $menu[$i]['name']?></li>
                                <?php
                                for($j=0;$j<count($menu[$i]['child']);$j++)
                                {
                                ?>
                                <li><a href="<?php echo base_url().$menu[$i]['child'][$j]['url']?>"><span class="icon icon-angle-double-right"></span>&nbsp;<?php echo $menu[$i]['child'][$j]['name']?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                                <?php
                            }
                            ?>
                        </li>
                            <?php
                        }
                        }
                        ?>
                        <?php if(!empty($this->session->userdata['id'])&& $this->session->userdata['type']=='admin'){?>
                        <li class="sidenav-heading">Menu</li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-circle-o"></span>
                                <span class="sidenav-label">Admin Menu</span>
                            </a>
                            <ul class="sidenav level-2 collapse">
                                <li><a href="<?= base_url(). 'Admin/add_menu' ?>"><span class="icon icon-angle-double-right"></span>Add</a></li>
                                <li><a href="<?= base_url(). 'Admin/manage_admin_menu' ?>"><span class="icon icon-angle-double-right"></span>Manage</a></li>
                            </ul>
                        </li>
                            <li class="sidenav-item has-subnav">
                                <a href="#multi-level-menu" aria-haspopup="true">
                                    <span class="sidenav-icon icon icon-cogs"></span>
                                    <span class="sidenav-label">Website Settings</span>
                                </a>
                                <ul class="sidenav level-2 collapse">
                                    <li class="sidenav-item has-subnav">
                                        <a href="#real-time">
                                            <span class="icon icon-desktop"></span>Slider
                                        </a>
                                        <ul class="sidenav level-3 collapse">
                                            <li class="sidenav-item">
                                                <a href="<?= base_url().'Admin/add_slider_image' ?>">
                                                    <span class="icon icon-angle-double-right"></span>Add Image
                                                </a>
                                            </li>
                                            <li class="sidenav-item">
                                                <a href="<?= base_url().'Admin/manage_slider' ?>">
                                                    <span class="icon icon-angle-double-right"></span>Manage
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidenav-item has-subnav">
                                        <a href="#real-time">
                                            <span class="icon icon-desktop"></span>Brands Logo
                                        </a>
                                        <ul class="sidenav level-3 collapse">
                                            <li class="sidenav-item">
                                                <a href="<?= base_url().'Admin/add_brand' ?>">
                                                    <span class="icon icon-angle-double-right"></span>Add Image
                                                </a>
                                            </li>
                                            <li class="sidenav-item">
                                                <a href="<?= base_url().'Admin/manage_brands' ?>">
                                                    <span class="icon icon-angle-double-right"></span>Manage
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidenav-item has-subnav">
                                        <a href="#real-time">
                                            <span class="icon icon-desktop"></span>Pages
                                        </a>
                                        <ul class="sidenav level-3 collapse">
                                            <li class="sidenav-item">
                                                <a href="#traffic-sources">
                                                    <span class="icon icon-angle-double-right"></span>About Us
                                                </a>
                                            </li>
                                            <li class="sidenav-item">
                                                <a href="#events">
                                                    <span class="icon icon-angle-double-right"></span>Contact Us
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidenav-item has-subnav">
                                        <a href="#real-time">
                                            <span class="icon icon-desktop"></span>Header/Footer
                                        </a>
                                        <ul class="sidenav level-3 collapse">
                                            <li class="sidenav-item">
                                                <a href="#traffic-sources">
                                                    <span class="icon icon-angle-double-right"></span>Header
                                                </a>
                                            </li>
                                            <li class="sidenav-item">
                                                <a href="#events">
                                                    <span class="icon icon-angle-double-right"></span>Footer
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
