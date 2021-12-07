# Instalação

Entre no diretório através do terminal e siga os seguintes passos:

- Instale as dependências da aplicação executando `composer install`;
- Instale as dependências do front end executando `npm install`;
- Crie as tabelas no banco de dados executando `php artisan migrate --seed`;
- Crie uma nova chave para a aplicação com `php artisan key:generate`;
- Crie um arquivo .env na raiz do projeto seguindo o seguinte modelo:
> APP_NAME=Laravel<br>
> APP_ENV=local<br>
> APP_KEY=<br>
> APP_DEBUG=true <br>
> APP_URL=http://localhost:8000/<br>
> 
> LOG_CHANNEL=stack<br>
> LOG_DEPRECATIONS_CHANNEL=null<br>
> LOG_LEVEL=debug<br>
> 
> DB_CONNECTION=mysql<br>
> DB_HOST=localhost<br>
> DB_PORT=3306<br>
> DB_DATABASE=<br>
> DB_USERNAME=<br>
> DB_PASSWORD=<br>
> 
> BROADCAST_DRIVER=log<br>
> CACHE_DRIVER=file<br>
> FILESYSTEM_DRIVER=local<br>
> QUEUE_CONNECTION=sync<br>
> SESSION_DRIVER=file<br>
> SESSION_LIFETIME=120<br>
> 
> MEMCACHED_HOST=memcached<br>
> 
> REDIS_HOST=redis<br>
> REDIS_PASSWORD=null<br>
> REDIS_PORT=6379<br>
> 
> MAIL_MAILER=smtp<br>
> MAIL_HOST=mailhog<br>
> MAIL_PORT=1025<br>
> MAIL_USERNAME=null<br>
> MAIL_PASSWORD=null<br>
> MAIL_ENCRYPTION=null<br>
> MAIL_FROM_ADDRESS=null<br>
> MAIL_FROM_NAME="${APP_NAME}"<br>
> 
> AWS_ACCESS_KEY_ID=<br>
> AWS_SECRET_ACCESS_KEY=<br>
> AWS_DEFAULT_REGION=us-east-1<br>
> AWS_BUCKET=<br>
> AWS_USE_PATH_STYLE_ENDPOINT=false<br>
> 
> PUSHER_APP_ID=<br>
> PUSHER_APP_KEY=<br>
> PUSHER_APP_SECRET=<br><br>
> PUSHER_APP_CLUSTER=mt1<br>
> 
> MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"<br>
> MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"<br>
- Por fim, execute a aplicação exectuando `php artisan serve`
