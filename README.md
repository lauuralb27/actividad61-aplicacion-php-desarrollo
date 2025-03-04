# Aplicación CRUD php a implantar en el servidor de desarrollo

>IES Miguel Herrero (Torrelavega) - Curso 2024/2025
>Módulo: IAW - Implantación de Aplicaciones Web  
>Ciclo: CFGS Administración de Sistemas Informáticos en Red  

Este repositorio es una **guía** para la realización de la **actividad 6.1** de IAW. Contiene lo siguiente: 

* Directorio /.github/workflows: Contiene ejemplos de flujos de trabajo o "workflows" (Github Actions de GitHub). Orientados a la implementación de "pipeline" o tuberías CI/CD.
* Directorio /conf: Contiene el archivo de configuración sitio web por defecto en Apache.
* Directorio /sql: Contiene un archivo con un script SQL para la inicialización de la BD de MariaDB
* Directorio /src: Contiene un ejemplo de código correspondiente a la Aplicación web CRUD PHP . Implementa altas, bajas, modificaciones y listado de una pequeña tabla. Servirá de modelo para la realización de esta actividad.
* Directorio /src/html: Contiene el modelo de Aplicación web anterior pero solo la parte ESTÁTICA.
* Directorio /src/bootstrap: Modelo de aplicación web con aplicación estilos basados en el "framework" CSS bootstrap. De momento está vacío
* Archivo .env: Configuración de variables de entorno (Contraseña Root, nombre BD, usuario BD y contraseña BD) utilizadas por el archivo docker-compose.yml.
* Archivo docker-compose.yml: Modelo escenario de contenedores para el despliegue de la aplicación PHP. Contiene 3 servicios: Ubuntu+apache, mariadb y phpmyadmin para administrar MariaDB.
* Archivo Dockerfile: Instrucciones para la construcción de la imagen correspondiente a la aplicación web.

