<body class = "body-background <?=$overlay_class ? "overlay": "" ;?>"><!--class="overlay"-->
<div class="page-wrapper">
    <div class="container">
      <header class="main-header">
        <a href="/">
          <img src="../img/logo.png" width="153" height="42" alt="Логитип Дела в порядке">
        </a>

        <div class="main-header__side">
        <?php if (!isset($user)):?>
          <a class="main-header__side-item button button--transparent open-modal"  href="javascript:;"
            target="user_login">Войти</a>
        <?php endif;?>
        <?php if (isset($user)):?>
          <a class="main-header__side-item button button--plus open-modal" href="javascript:;"
                target="task_add">Добавить задачу</a>

        <div class="main-header__side-item user-menu">
            <div class="user-menu__image">
              <img src="img/user-pic.jpg" width="40" height="40" alt="Пользователь">
            </div>

            <div class="user-menu__data">
               <p><?=$user['name_users']?></p>

                <a href="exit.php">Выйти</a>
            </div>
        </div>
        <?php endif;?>
        </div>
      </header>

      <div class="content">
        <section class="welcome">
          <h2 class="welcome__heading">«Дела в порядке»</h2>

          <div class="welcome__text">
            <p>«Дела в порядке» — это веб приложение для удобного ведения списка дел. Сервис помогает пользователям не забывать о предстоящих важных событиях и задачах.</p>
            <p>После создания аккаунта, пользователь может начать вносить свои дела, деля их по проектам и указывая сроки.</p>
          </div>
          <?php if (!isset($user)):?>
            <a class="welcome__button button" href="output_register.php">Зарегистрироваться</a>
          <?php endif;?>
        </section>
      </div>
    </div>
  </div>
  <?=$modal_authorization?>


 

 