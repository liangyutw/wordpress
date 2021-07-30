# wordpress plugin操作
這裡針對wordpress的外掛做一個記錄
先建立好環境，使用以下的`yml`
## docker-compose.yml
```
version: '3.3'

services:
   db:
     image: mysql:5.7
     volumes:
       - ./mysql:/var/lib/mysql
     restart: always
     ports:
       - "3306:3306"
     environment:
       MYSQL_ROOT_PASSWORD: password
       MYSQL_DATABASE: wordpress
       MYSQL_USER: wordpress
       MYSQL_PASSWORD: wordpress

   wordpress:
     depends_on:
       - db
     image: wordpress:latest
     volumes:
       - ./wordpress:/var/www/html
     ports:
       - "8000:80"
     restart: always
     environment:
       WORDPRESS_DB_HOST: db:3306
       WORDPRESS_DB_USER: wordpress
       WORDPRESS_DB_PASSWORD: wordpress
```
`docker`的環境順利完成後，直接點開 `http://localhost:8000` 就可以進入走流程安裝 `wordpress`
## 建立plugin檔案
1. 因為透過以上的`yml`已經映射程式碼在資料幾當中，直接使用你最熟的編輯器打開`wordpress\wp-content\plugins\`
2. 直接建立新資料夾(名稱隨你取)，再建立檔案，也是名稱隨你取，但副檔名要使用 `.php`
3. 然後複制`list_hooked_function.php`的程式碼到你剛建好的`php`裡面就可以了，基本上就能在 `wordpress` 的外掛列表中看見一個新的項目
