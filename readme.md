                    Итоговый проект для OWOX PHP School
________________________________________________________________________________
1. В папке с проектом, где находится docker-compose.yml выполнить 
запуск docker-compose up
2. Зайти в контейнер docker exec -it myproject-webserver /bin/sh
3. Установить зависимости: composer install
4. Зайти в контейнер docker exec -it backend1 bash
5. Установить php7.2-redis: apt-get update && apt-get install php7.2-redis
6 4. Зайти в контейнер docker exec -it backend2 bash
7. Установить php7.2-redis: apt-get update && apt-get install php7.2-redis
8. На хосте доступ к phpmyadmin осуществляется по адресу http://localhost:8090
9. Доступ к приложению на хосте по адресу http://localhost:8080, либо прописать в файле etc/hosts соответствие:
    127.0.0.1 myproject.ll
    127.0.0.1 admin.myproject.ll
10. Создать БД: в корне проекта находится папка mysql в которой необходимо выполнить myproject_mysql_create.sql