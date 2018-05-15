use business_is_all_right;

INSERT INTO projects (name_projects) VALUE ('Всё');
INSERT INTO projects (name_projects) VALUE ('Входящие');
INSERT INTO projects (name_projects) VALUE ('Работа');
INSERT INTO projects (name_projects) VALUE ('Домашние дела');
INSERT INTO projects (name_projects) VALUE ('Учёба');

INSERT INTO users (date_registration_users, email_users,  name_users, password_users, contact_users) VALUE ('15.05.2017', 'testing2018@mail.ru', 'Валерий','$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka','Phone:12211');
INSERT INTO users (date_registration_users, email_users,  name_users, password_users, contact_users) VALUE ('05.12.2017', 'testing2118@ramb.ru', 'Юлия','$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa','Phone:12213');

INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,3, '12.05.2018', '17.06.2018','Собеседование в IT комании',null,'20.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,2, '14.06.2018', '30.05.2018','Выполнить тестовое задание',null,'25.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,5, '21.05.2018', '29.05.2018','Сделать задание первого раздела',null,'22.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,2, '22.04.2018', '17.06.2018','Встреча с другоми',null,'23.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,4, '12.06.2018', null,'Купить корм для кота',null,'24.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,3, '17.04.2018', null,'Заказать пиццу',null,'21.06.2018', false);

INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,3, '05.05.2018', '17.06.2018','Поесть',null,'20.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,2, '19.03.2018', '30.05.2018','Уйти в отпуск',null,'25.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,5, '21.02.2018', '29.05.2018','Пройти интенсив php',null,'22.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,2, '15.04.2018', '17.06.2018','Сделать дз по SQL',null,'23.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,4, '09.06.2018', null,'Выучить JS',null,'24.05.2018', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,3, '22.01.2018', null,'Стать full-stack',null,'21.06.2018', false);

SELECT id_projects FROM users WHERE id_users = 1;
SELECT name_task FROM task WHERE id_projects = 2 AND id_users = 1;
UPDATE task SET done_task = true WHERE id_projects = 2;
SELECT name_task FROM task WHERE date_achievement_task = '2017-06-20';
UPDATE task SET name_task = 'Стать бекендером' WHERE id_task = 12;



