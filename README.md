docker-compose up -d
docker-compose stop
docker-compose build

docker ps
docker exec -it adfadsf /bin/bash

php artisan route:clear
php artisan config:clear
php artisan cache:clear

php artisan mirgate

mysql 升级
mysql_upgrade -u root -p --force


权限校验
Authorization Bearer $(token string)