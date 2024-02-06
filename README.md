# Aplicação em modo de desenvolvimento

O modo mais fácil de ter a aplicação rodando em modo de desenvolvimento é usando o Docker.
O Laravel possui um pacote específico para gerenciar os comandos Docker.

Você pode ver como instalar o Docker com WSL neste [link](https://github.com/codeedu/wsl2-docker-quickstart).

Assim, para instalar a aplicação, é necessário inicialmente clonar esse projeto, e rodar o seguinte comando no terminal na pasta do projeto:

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

Tendo tudo instalado, para rodar a aplicação o comando é:

```
./vendor/bin/sail up
```

Para parar a aplicação o comando é:

```
./vendor/bin/sail down
```
Para mais informações de como o Sail funciona, [visite a página oficial](https://laravel.com/docs/10.x/sail).
