use business_is_all_right;

INSERT INTO projects (name_projects) VALUE ('Всё');
INSERT INTO projects (name_projects) VALUE ('Входящие');
INSERT INTO projects (name_projects) VALUE ('Работа');
INSERT INTO projects (name_projects) VALUE ('Домашние дела');
INSERT INTO projects (name_projects) VALUE ('Учёба');

INSERT INTO users (date_registration_users, email_users,  name_users, password_users, contact_users) VALUE ('2017-05-15', 'ignat.v@gmail.com', 'Игнат','$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka','Phone:12211');
INSERT INTO users (date_registration_users, email_users,  name_users, password_users, contact_users) VALUE ('2017-05-12', 'kitty_93@li.ru', 'Леночка','$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa','Phone:12213');

INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,3, '2018-05-12', '2018-06-17','Собеседование в IT комании',null,'2018-05-25', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,2, '2018-06-14', '2018-05-30','Выполнить тестовое задание',null,'2018-05-18', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,5, '2018-05-21', '2018-05-29','Сделать задание первого раздела',null,'2018-05-22', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,2, '2018-04-22', '2018-06-17','Встреча с другоми',null,'2018-05-23', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,4, '2018-06-12', null,'Купить корм для кота',null,'2018-05-24', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,3, '2018-04-17', null,'Заказать пиццу',null,'2018-06-21', false);

INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,3, '2018-05-05', '2018-06-17','Поесть',null,'2018-05-20', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,2, '2018-03-17', '2018-05-30','Уйти в отпуск',null,'2018-05-25', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,5, '2018-02-21', '2018-05-29','Пройти интенсив php',null,'2018-05-22', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,2, '2018-04-12', '2018-06-17','Сделать дз по SQL',null,'2018-05-18', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (2,4, '2018-09-06', null,'Выучить JS',null,'2018-05-24', false);
INSERT INTO task (id_users,  id_projects , date_create_task, date_achievement_task, name_task,  file_task, term_task, done_task ) VALUE (1,3, '2018-01-06', null,'Стать full-stack',null,'2018-06-15', false);

SELECT id_projects FROM task WHERE id_users = 1;
SELECT name_task FROM task WHERE id_projects = 2 AND id_users = 1;
UPDATE task SET done_task = true WHERE id_task = 2;
SELECT name_task FROM task WHERE term_task = '2018-05-18' BETWEEN '2018-05-18 00:00:00' AND '2018-05-18 23:59:59'  ;
UPDATE task SET name_task = 'Стать бекендером' WHERE id_task = 12;



