<div class="modal"  <?=$hidden ? "hidden='hidden'":"" ?> id="user_login">
  <button class="modal__close" type="button" name="button">Закрыть</button>

  <h2 class="modal__heading">Вход на сайт</h2>

  <form class="form" action="guest_page.php" method="post" enctype="multipart/form-data">
    <div class="form__row">
      <label class="form__label" for="email">E-mail <sup>*</sup></label>

      <input class="form__input <?=$massiv_errors['password'] ? "form__input--error" : ""?>" type="text" name="email" id="email" 
      value="<?=isset($last_post['email']) ? htmlspecialchars($last_post['email']) : "" ?>" placeholder="Введите e-mail">
      <?php if (isset($massiv_errors['password'])): ?>
         <p class="form__message"><?=$massiv_errors['password']?></p>
      <?php endif;?>
    </div>

    <div class="form__row">
      <label class="form__label" for="password">Пароль <sup>*</sup></label>

      <input class="form__input <?=$massiv_errors['password'] ? "form__input--error" : ""?>" type="password" name="password" id="password" value="" placeholder="Введите пароль">
      <?php if (isset($massiv_errors['password'])): ?>
         <p class="form__message"><?=$massiv_errors['password']?></p>
      <?php endif;?>
    </div>

    <div class="form__row form__row--controls">
      <input class="button" type="submit" name="" value="Войти">
    </div>
  </form>
</div>
