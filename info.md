Como dockerizar uma aplicação PHP.

Crie os seguintes arquivos:
- Dockerfile
- docker-compose.yml

No dockerfile:
```Dockerfile
# Use a imagem oficial do PHP com Apache
FROM php:8.1-apache 

# Instale extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql 

# Copia seu site para o Apache
COPY ./src/ /var/www/html/

EXPOSE 80
```

No docker-compose.yml:
```yaml
services:   
  web:
    build: .
    ports:
      - "8080:80"
    volumes:
      - ./src:/var/www/html/
```

No terminal, na pasta do projeto, rode:
```bash
docker-compose up -d --build
```

Teste acessando http://localhost:8080 no navegador.