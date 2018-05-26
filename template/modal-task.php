<div class="modal"  <?=$hidden ? "hidden='hidden'":"" ?> id="task_add" >
  <button class="modal__close" type="button" name="button" href="/">Закрыть</button>

  <h2 class="modal__heading">Добавление задачи</h2>

  <form class="form"  action="index.php" method="POST"  enctype="multipart/form-data">
    <div class="form__row">
      <label class="form__label" for="name">Название <sup>*</sup></label>
      
      <input class="form__input <?= isset($massiv_errors['name']) ? "form__input--error" : ""?>" type="text" name="name" id="name" 
      value="<?= isset($last_post['name']) ? htmlspecialchars($last_post['name']):"" ?>" placeholder="Введите название">
        
          <p class="form__message"><?= isset($massiv_errors['name']) ? $massiv_errors['name'] : ""?></p>
       
    </div>

    <div class="form__row">
      <label class="form__label" for="project">Проект <sup>*</sup></label>

      <select class="form__input form__input--select <?= isset($massiv_errors['project']) ? "form__input--error" : ""?>" name="project" id="project">
        <?php foreach($categorys as $category):?>
          <option <?=($category['id_projects'] == $last_post['project'] ? "selected":"" )?>
          value="<?=$category['id_projects']?>"><?= $category['name_projects'] ;?></option>
        <?php endforeach;?>
      </select>
      <p class="form__message"><?= isset($massiv_errors['project']) ? $massiv_errors['project'] : ""?></p>
    </div>

    <div class="form__row">
      <label class="form__label" for="date">Срок выполнения</label>
      
      <input class="form__input form__input--date <?= isset($massiv_errors['date']) ? "form__input--error" : ""?>" type="text" name="date" id="date"
             placeholder="Введите дату и время в формате ДД:ММ:ГГГГ" 
             value="<?= isset($last_post['date']) ? htmlspecialchars($last_post['date']):"" ?>">
      
        <p class="form__message"><?= isset($massiv_errors['date']) ? $massiv_errors['date'] : ""?></p>
      
    </div>

    <div class="form__row">
      <label class="form__label" for="preview">Файл</label>

      <div class="form__input-file">
        <input class="visually-hidden" type="file" name="preview" id="preview" value="">

        <label class="button button--transparent" for="preview">
            <span>Выберите файл</span>
        </label>
      </div>
    </div>

    <div class="form__row form__row--controls">
      <input class="button" type="submit" name="send" value="Добавить">
    </div>
  </form>
</div>
