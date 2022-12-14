Тестовое задание Stack: PHP 7.4+, MySQL 5.7+ Frameworks: Нативный PHP, либо Laravel. Задача: На ftp сервер проекта раз в сутки выгружается XML-файл с данными по стоку. С каждой новой выгрузкой данные меняются - одни данные могут обновиться, другие добавиться, третьи удалиться (их не будет в новом XML-файле). Необходимо разработать архитектуру БД на основе XML-выгрузки и написать парсер XML-файла. Парсер должен: добавлять в базу записи, которых в ней еще нет; обновлять записи, которые пришли в XML и уже есть в базе; удалять записи из базы, которых нет в XML (чистить таблицу перед парсингом нельзя). Парсер должен запускаться через консольную команду. При вызове консольной команды должна быть возможность указать путь до локального файла выгрузки, при этом, если путь до файла не указан, то берется дефолтный файл. При проектировании архитектуры БД необходимо учитывать, что по всем полям, кроме id и generation_id, будет происходить фильтрации данных.

Критерии оценки реализации:

Выполнение всех требований в задании;
Соблюдение стандартов PSR и чистота кода;
Naming классов, методов и переменных;
Набор принципов программирования, используемых для реализации задания;
Структура таблиц, типы данных колонок и naming в БД.