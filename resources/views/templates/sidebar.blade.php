<nav class="navbar-default navbar-side" role="navigation" style="position:fixed;z-index:500;">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
<li class="logostyle" style="">
                <center><a href="" data-toggle="tooltip" data-placement="top" title="Wireless Access for Health"><img src="<?php echo asset('public_html/imgs/wahlogo.png'); ?>" style="height:170px;margin-top:20px;margin-left:0px;"></a></center>
            </li>
            <!-- active-link -->
            <?php $segment = Request::segment(1); ?>
            <?php $active = ($segment == 'home') ? 'active-link' : null; ?>
            <li class='<?php echo $active; ?>' style="border-top:1px solid #3d444e;">
                <a href="<?php echo url('home'); ?>"><i class="fa fa-home left-fa"></i>Home<i class="fa fa-chevron-right side-fa"></i></a>
            </li>
            <?php $active = ($segment == 'upload') ? 'active-link' : null; ?>
            <?php if(session('user_type') != 'municipality_user') : ?>
                <li class='<?php echo $active; ?>'>
                    <a href="<?php echo url('upload'); ?>"><i class="fa fa-upload left-fa"></i>Upload<i class="fa fa-chevron-right side-fa"></i></a>
                </li>
            <?php endif; ?>
            <?php $active = ($segment == 'statistics') ? 'active-link' : null; ?>
            <li class='<?php echo $active; ?>'>
                <a href="<?php echo url('statistics'); ?>"><i class="fa fa-bar-chart-o left-fa"></i>Statistics<i class="fa fa-chevron-right side-fa"></i></a>
            </li>
            <?php $active = ($segment == 'map') ? 'active-link' : null; ?>
            <li class='<?php echo $active; ?>'>
                <a href="<?php echo url('map'); ?>"><i class="fa fa-map-marker left-fa"></i>Map<i class="fa fa-chevron-right side-fa"></i></a>
            </li>
            <?php $active = ($segment == 'download') ? 'active-link' : null; ?>
            <?php if(session('user_type') != 'municipality_user') : ?>
                <li class='<?php echo $active; ?>'>
                    <a href="<?php echo url('download'); ?>"><i class="fa fa-download left-fa"></i>Download<i class="fa fa-chevron-right side-fa"></i></a>
                </li>
            <?php endif; ?>
            <?php $active = ($segment == 'accounts') ? 'active-link' : null; ?>
            <?php if(session('user_type') == 'admin') : ?>
                <li class='<?php echo $active; ?>'>
                    <a href="<?php echo url('accounts'); ?>"><i class="fa fa-users left-fa"></i>Accounts<i class="fa fa-chevron-right side-fa"></i></a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>