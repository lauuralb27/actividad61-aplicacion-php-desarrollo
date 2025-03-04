# Les comento qué significan cada una de las instrucciones.
# FROM: Indica cuál es la imagen que vamos a utilizar como punto de partida para generar la nueva imagen
FROM ubuntu:24.04
# FROM ubuntu:latest

# ENV: Permite definir una variable de entorno y asignarle un valor por defecto. Se puede utilizar el signo = o un espacio en blanco
# Se pueden sobreescribir con la opción "--env" al crearse el contenedor: docker run --env...
# También se puede sobreescribir conla clave "environment" del docker compose

# Con la opción "noninteractive" evita tener que introducir valores de configuración de forma manual durante la instalación de algunos paquetes
ENV DEBIAN_FRONTEND=noninteractive 
ENV TZ=Europe/Madrid

# En este caso le asignamos unos valores por defecto a la aplicación CRUD PHP: "mariadb", "electroshop", "usuario", "usuario@1"
ENV MARIADB_HOST=mariadb
ENV MARIADB_DATABASE=actividad61_Laura_Alonso
ENV MARIADB_USER=usuarioLAB
ENV MARIADB_PASSWORD=LauraAlonso@2004

# RUN: Permite definir los comandos que se van a ejecutar SOBRE LA IMAGEN BASE. En este caso: ubuntu:24.04
# Actualización e instalación de apache y  todos las paquetes necesarios para ejecutar PHP y conectar a MARIADB.
RUN apt-get update \
    && apt-get install -y apache2 \
    && apt-get install -y php \
    && apt-get install -y libapache2-mod-php \
    && apt-get install -y php-mysql \
    && rm -rf /var/lib/apt/lists/*

# COPY: Permite copiar archivos o directorios desde el contexto local de la máquina donde estamos creando la imagen hasta la imagen que será el sistema de archivos que utilizará el contenedor.
# Copia el contenido del directorio /src (contenido del sitio web) en el "documentroot" del sitio de apache (/var/www/html)

COPY /src /var/www/html

# Copia la configuración del sitio en el directorio de configuración de los sitios de apache (/etc/apache2/sites-available)

COPY /conf/000-default.conf /etc/apache2/sites-available/

# EXPOSE: INFORMA de los puertos que utilizará el contenedor cuando esté en ejecución
# La instrucción EXPOSE no publica el puerto al exterior, solo informa a Docker.
EXPOSE 80

#ENTRYPOINT: Permite definir el primer comando que ejecutarán los contenedores que se creen a partir de la imagen
# En este caso iniciamos el servicio de apache y se le pasa las opciones: "-D" y "FOREGRAUND"
ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]