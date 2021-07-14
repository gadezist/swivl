swivl-api

Требования:
php 8.0+
Mysql 8.0
Symfony CLI

Для запуска api сделать клон репозитория

git clone https://github.com/gadezist/swivl.git

Проинсталировать композер

php composer.phar install

Сделать импорт базы из папки dump

Документация

1. /api/classrooms - Возвращает список классов (Method - GET)
2. /api/classrooms/{id} - Возвращает один класс (Method - GET, {id} - integer)
3. /api/classrooms/create - Создает класс (Method - POST, parameters: {name: string, is_active: 1 | 0})
4. /api/classrooms/update/{id} - Обновляет класс (Method - POST, parameters: {name: string, is_active: 1 | 0})
5. /api/classrooms/delete/{id} - Удаляет класс (Method - DELETE, {id} - integer)
