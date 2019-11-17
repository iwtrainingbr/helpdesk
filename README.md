# helpdesk

## Instalação
`php composer.phar install`

## Configuração do Banco
Alterar o arquivo `/config/database.php`

## Gerar tabelas do Banco de Dados
`php vendor/doctrine/orm/bin/doctrine.php orm:schema-tool:update --force`

## Executar / Subir o servidor
`php -S localhost:8000 -t public`
