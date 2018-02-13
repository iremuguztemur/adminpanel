<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="<?=panel_url()?>" class="logo">
<!--            <img src="--><?//=asset_url('images/logo.png')?><!--" alt="Clean UI Admin Template" />-->
<!--            <img class="logo-inverse" src="--><?//=asset_url('images/logo.png')?><!--" alt="Clean UI Admin Template" />-->
           <span
           style="
                text-align: center;
                font-size: 21px;
                color : #FFF;
                width: 100%; height: auto; position: relative; float: left;
                margin-top: 10px;
                margin-left: 20px;
            "> ADMIN PANEL </span>
        </a>
    </div>
    <div class="left-menu-inner scroll-pane">
        <ul class="left-menu-list left-menu-list-root list-unstyled">
            <li class="left-menu-list-active">
                <a class="left-menu-link" href="<?=panel_url()?>">
                    <i class="left-menu-link-icon icmn-home2"><!-- --></i>
                    <span class="menu-top-hidden">Ana Sayfa</span>
                </a>
            </li>
            <li class="left-menu-list-separator"><!-- --></li>

            <?php foreach($config['menu'] as $key => $menu): ?>



                <li class="left-menu-list-<?php if (isset($menu['submenu'])): echo "submenu"; endif;?>">
                <a class="left-menu-link" <?php if (!isset($menu['submenu'])){ echo 'href="'. $key .'"'; }?>href="javascript: void(0);">
                    <i class="left-menu-link-icon <?=$menu['icon']?>"><!-- --></i>
                    <?=$menu['title']?>
                </a>

                <?php if (isset($menu['submenu'])): ?>
                <ul class="left-menu-list list-unstyled">
                    <?php foreach($menu['submenu'] as $subKey => $subMenu): ?>
                    <li>
                        <a class="left-menu-link" href="<?=panel_url($subKey)?>">
                            <?=$subMenu['title']?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </li>
            <li class="left-menu-list-separator"><!-- --></li>
            <?php endforeach; ?>           
            
        </ul>
    </div>
</nav>
<nav class="top-menu">

</nav>