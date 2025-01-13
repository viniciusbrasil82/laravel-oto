# laravel-oto
oto - e-Commerce

## Considerações Iniciais
Certifique-se de que não há serviços na máquina usando as portas 80,5173,3360
Você precisará do Docker.

## Preparando e subindo ambiente (primeira execução)

### Subir Container Docker
```
docker-compose up --build -d
```
### Instalar dependendicas Laravel
```
docker-compose exec app composer install
docker-compose exec app npm install
docker-compose exec app npm run build
```
### Criar Banco de Dados inicial Laravel
```
docker-compose exec app php artisan migrate
```
### Popular Banco de Dados
```
docker-compose exec app php artisan db:seed
```
## Desativando o ambiente
```
docker-compose down
```
## Subindo o ambiente (demais execuções)
```
docker-compose up -d
```
## Considerações adicionais
Você pode restaurar o banco de dados original executando a seguinte sequência (com o ambiente ativo):
```
docker-compose exec app php artisan migrate:reset
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

## Acessando pela primeira vez
Você poderá acessar através do link [https://localhost/login](https://localhost/login)

Usuário _admin@admin.com_

Senha _admin_
