Important Notes : 
1 : i use php version [ 8.2.12 ]
2 : project laravel version : 12.44.0
3 : you can use DB Browser Sqlite Program to view database tables 
_________________________________________________________________________________________
steps to run the project : 
1 : go to path xampp/htdocs/
2 : execute git command : git clone https://github.com/Hesham123kamal/recruitment_exercise.git
3 : open project in any code editor 
4 : create .env file and paste below code on it :  
__________________________________________________________________________________________
                        APP_NAME=Recruitment_Exercise
                        APP_ENV=local
                        APP_KEY=base64:1tDpSeW0O1nRFJ8y7SdQlh2XAF0ZP/Uo3Ot/Kav9Xj0=
                        APP_DEBUG=true
                        APP_URL=http://localhost
                        
                        APP_LOCALE=en
                        APP_FALLBACK_LOCALE=en
                        APP_FAKER_LOCALE=en_US
                        
                        APP_MAINTENANCE_DRIVER=file
                        # APP_MAINTENANCE_STORE=database
                        
                        # PHP_CLI_SERVER_WORKERS=4
                        
                        BCRYPT_ROUNDS=12
                        
                        LOG_CHANNEL=stack
                        LOG_STACK=single
                        LOG_DEPRECATIONS_CHANNEL=null
                        LOG_LEVEL=debug
                        
                        DB_CONNECTION=sqlite
                        
                        SESSION_DRIVER=database
                        SESSION_LIFETIME=120
                        SESSION_ENCRYPT=false
                        SESSION_PATH=/
                        SESSION_DOMAIN=null
                        
                        BROADCAST_CONNECTION=log
                        FILESYSTEM_DISK=local
                        QUEUE_CONNECTION=database
                        
                        CACHE_STORE=database
                        # CACHE_PREFIX=
                        
                        MEMCACHED_HOST=127.0.0.1
                        
                        REDIS_CLIENT=phpredis
                        REDIS_HOST=127.0.0.1
                        REDIS_PASSWORD=null
                        REDIS_PORT=6379
                        
                        MAIL_MAILER=log
                        MAIL_SCHEME=null
                        MAIL_HOST=127.0.0.1
                        MAIL_PORT=2525
                        MAIL_USERNAME=null
                        MAIL_PASSWORD=null
                        MAIL_FROM_ADDRESS="hello@example.com"
                        MAIL_FROM_NAME="${APP_NAME}"
                        
                        AWS_ACCESS_KEY_ID=
                        AWS_SECRET_ACCESS_KEY=
                        AWS_DEFAULT_REGION=us-east-1
                        AWS_BUCKET=
                        AWS_USE_PATH_STYLE_ENDPOINT=false
                        
                        VITE_APP_NAME="${APP_NAME}"
_________________________________________________________________________________
5 : run command : composer install 
6 : run command : php artisan config:cache 
7 : run command : php artisan optimize:clear

8 : run command : php artisan migrate (to create tables in sqlite database ( 
I mean in file database.sqlite [ database.sqlite file exist in project database path and contains customer table ( like sample.db file you provided
)] )

9 : run command php artisan phone:analysis ( to analyze customers phone numbers )
10 : run command php artisan serve
11 : visist path ( http://localhost:8000 )

__________________________________________________________________________________



