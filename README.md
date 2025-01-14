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

## Testes e acesso
Após a migração será criado um usuário principal padrão:

Usuário _admin@admin.com_

Senha _admin_

## Documentação de EndPoints e Testes

Usar a documentação [Swagger](https://app.swaggerhub.com/apis-docs/viniciusbrasil82/OTO/1.0.0)
```
https://app.swaggerhub.com/apis-docs/viniciusbrasil82/OTO/1.0.0
```
Garantir que esteja selecionado o servidor local [http://localhost/api/v1](http://localhost/api/v1) e que o container Docker esteja sendo executado. 