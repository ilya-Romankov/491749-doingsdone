<body class = "<?=$overlay_class ? "overlay": "" ;?>"><!--class="overlay"-->
<h1 class="visually-hidden">Дела в порядке</h1>
<div class="page-wrapper">
    <div class="container container--with-sidebar">
        <header class="main-header">
            <a href="#">
                <img src="img/logo.png" width="153" height="42" alt="Логотип Дела в порядке">
            </a>

            <div class="main-header__side">
                <a class="main-header__side-item button button--plus open-modal" href="javascript:;"
                target="task_add">Добавить задачу</a>

              <div class="main-header__side-item user-menu">
                    <div class="user-menu__image">
                        <img src="img/user-pic.jpg" width="40" height="40" alt="Пользователь">
                    </div>

                    <div class="user-menu__data">
                        <p><?=$name?></p>

                        <a href="exit.php">Выйти</a>
                    </div>
            </div>
            </div>
        </header>

        <div class="content">
            <section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                    <!--Вывод меню -->
                    <li class="main-navigation__list-item<?= ($category_active == PROJECT_ALL) ? ' main-navigation__list-item--active' : '' ?>">
                            <a class="main-navigation__list-item-link" href="/">Всё</a>
                            <span class="main-navigation__list-item-count"><?=$count_task_by_user_id[PROJECT_ALL];?></span>
                        </li>
                    <?php foreach($categorys as $category):?>
                        <li class="main-navigation__list-item <?= ($category_active == $category['id_projects']) ? ' main-navigation__list-item--active' : '' ?>">
                            <a class="main-navigation__list-item-link" href="/?id_projects=<?=$category['id_projects']?>"><?= $category['name_projects'] ;?></a>
                            <span class="main-navigation__list-item-count"><?=($count_task_by_user_id[$category['id_projects']]) ?? 0  ;?></span>
                        </li>
                    <?php endforeach;?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button open-modal"
                   href="javascript:;" target="project_add">Добавить проект</a>
            </section>

            <main class="content__main"><?= $content;?></main>
        </div>
    </div>
</div>


<?= $modal_task; ?> 
