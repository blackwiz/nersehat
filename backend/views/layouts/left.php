<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $directoryAsset; ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        
        <?php 
        use mdm\admin\components\MenuHelper;
        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                /*'items' => [
                    ['label' => 'e-Procurement', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'RBAC',
                        'icon' => 'fa fa-share',
                        'url' => '',
                        'items' => [
                            ['label' => 'Route', 'icon' => 'fa fa-link', 'url' => ['/admin/route'],],
                            ['label' => 'Permission', 'icon' => 'fa fa-check-square-o', 'url' => ['/admin/permission'],],
                            ['label' => 'Menu', 'icon' => 'fa fa-bars', 'url' => ['/admin/menu'],],
                            ['label' => 'Rule', 'icon' => 'fa fa-th-large', 'url' => ['/admin/rule'],],
                            ['label' => 'Role', 'icon' => 'fa fa-users', 'url' => ['/admin/role'],],
                            ['label' => 'Assignment', 'icon' => 'fa fa-tasks', 'url' => ['/admin/assignment'],],
                            ['label' => 'User', 'icon' => 'fa fa-user', 'url' => ['/admin/user'],],
                        ],
                    ],
                ],*/
				'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
            ]
        );
		
		?>

    </section>

</aside>
