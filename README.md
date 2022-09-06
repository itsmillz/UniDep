# UNIDEP

Unidep es un software el cual permite poder buscar arriendos para **estudiantes** en Concepción.
Este software permite realizar la búsqueda de arriendos cercanos a las universidades especificadas, filtrado por las características deseadas, y por otra parte permite publicar las propiedades de las personas que deseen arrendar.

## Software stack
El proyecto unidep es una aplicación web que corre sobre:
- PHP 7.3 o superior.
- MYSQL 10.4
- Ubuntu 18.04

## Configuraciones de Ejecución para Entorno de Desarrollo/Produccción

Primero realizamos la clonación del proyecto con la terminal de VSCODE o GIT BASH o alguna terminal de preferencia:
````
git clone https://github.com/itsmillz/UniDep.git
cd UniDep
````
Luego de eso utilizaremos el siguiente comando para levantar el proyecto (esto de fondo -d). Se comenzaran a crear 3 contenedores, uno para la base de datos, otro para el gestor de la base de datos phpmyadmin y www (apache).
````
docker-compose up -d
````
Luego verificamos que este corriendo todo correctamente ejecutando el siguiente comando:
````
docker-compose ps
````
Esto nos mostrara que tres contenedores, el primero corriendo el [puerto 8000](http://localhost:8000) (phpmyadmin), el segundo en el [puerto 80](http://localhost:80) (www) y el tercero en 3306 (base de datos).

## Base de datos

Para la conexión a la base de datos debemos hacer lo siguiente, en la carpeta **dump/** se encuenta la base de datos **unidep.sql** la cual debemos importar en el ruta del [puerto 8000](http://localhost:8000)


## Credenciales

#### Funcionalidad
| Rut  |
| ------------ |
|  19461599-K |
|  18535294-3 |

#### Base de datos
| Usuario  | Contraseña  |
| ------------ | ------------ |
| root  | test  |


## Construido con
- Bootstrap
- PHP
- jQuery 
- Ajax
- CSS
- HTML
- JavaScript

## Autores

- [@Crisandru1997](https://www.github.com/Crisandru1997)
- [@itsmillz](https://www.github.com/itsmillz)

