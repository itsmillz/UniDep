# UNIDEP

Unidep es un software el cual permite poder buscar arriendos para **estudiantes** en Concepción.
Este software permite realizar la búsqueda de arriendos cercanos a las universidades especificadas, filtrado por las características deseadas, y por otra parte permite publicar las propiedades de las personas que deseen arrendar.

## Software stack
El proyecto unidep es una aplicación web que corre sobre:
- PHP 7.3 o superior.
- MYSQL 10.4
- Ubuntu 18.04

## Docker

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

#### Base de datos

Para la conexión a la base de datos debemos hacer lo siguiente, en la carpeta **dump/** se encuenta la base de datos **unidep.sql** la cual debemos importar en el ruta del [puerto 8000](http://localhost:8000).

## Servidor de producción
#### Instalar apache y actualizar el cortafuego

Comenzaremos actualizando el índice del paquete local. Esto es para garantizar que refleje la última versión cargada del nuevo paquete.
```
sudo apt update
```

A continuación, instalamos el paquete apache2:
```
sudo apt install apache2
```

Instalamos ufw escribiendo:
```
sudo apt-get install ufw
```

Ajuste de cortafuegos: verificamos que el UFW tiene un perfil de aplicación para Apache mediante el comando:
```
sudo ufw app list
```

Mostraremos que el tráfico se encuentra habilitado para los puertos 80 y 443:
```
sudo ufw app info "Apache Full"
```

Ahora permitiremos el tráfico de entrada HTTP y HTTPS:
```
sudo ufw allow in "Apache Full"
```

Ahora verificamos el estado del servidor:
```
sudo service apache2 status
```

#### Instalar MySQL
Instalamos MySQL:
```
sudo apt install mysql-server
```
En este punto, nuestro sistema de bases de datos se encuentra configurado y podemos seguir con la instalación de PHP, el componente final de la pila LAMP.

#### Instalar PHP
Usaremos apt para instalar PHP
```
sudo apt install php libapache2-mod-php php-mysql
```
#### Instalar git
Descargamos e instalamos git con el siguiente comando:
```
sudo apt install git
```
#### Ejecución del proyecto
Primero que nada nos dirigimos a la ruta donde clonearemos nuestro proyecto:
```
cd /var/www/html
```
En caso de que la carpeta html/ contenga algún archivo lo eliminaremos:
```
rm -rf nombre_archivo
```
Una vez aquí realizamos la clonación del proyecto:
```
git clone https://github.com/itsmillz/UniDep.git .
```
Luego de eso ingresamos a la carpeta www/:
```
cd www
```
Y moveremos todo el contenido a la carpeta principal:
```
mv * /var/www/html/
```
Una vez realizado todo esto, verificaremos el estado del apache2:
```
sudo service apache2 status
```
En caso de que no este corriendo, ejecutaremos el siguiente comando:
```
sudo service apache2 start
```
Y en caso de que se encuentre corriendo ejecutaremos el siguiente comando:
```
sudo service apache2 restart
```
Con esto ya podremos visualizar la pagina en la ip de nuestro servidor, en nuestro caso sería la siguiente: http://146.83.198.35:1059/

#### Configuración de la base de datos en el servidor:

Para realizar la conexión a la base de datos de la FACE en nuestro caso, modificar lo siguiente en nuestro archivo de conexión.

Primero instalaremos el editor nano, si lo tienes instalado te saltas este paso:
````
sudo apt-get install nano
````
Luego de eso vamos a editar el siguiente archivo de conexión:
````
nano db_connection/connection.php
````
Y aquí tendremos lo siguiente:
```PHP
<?php
    // Conexión base de datos de la Universidad.
    // * Se requiere estar conectado al OpenVPN.
    // $conn=mysqli_connect('mysqltrans.face.ubiobio.cl','G51taller','G51taller1058','G51taller_bd');
    // date_default_timezone_set('America/Santiago');
    // if(mysqli_connect_errno()){
    //    echo 'Error de conexión:'.mysqli_connect_error();
    //}

    // Utilizar conexión local:
     $conn=mysqli_connect('db','root','test','unidep');
     if(mysqli_connect_errno()){
         echo 'Error de conexión:'.mysqli_connect_error();
     }
     
    // Utilizar otra conexión:
    // $conn=mysqli_connect('host','username','password','dbname');
    // if(mysqli_connect_errno()){
    //     echo 'Error de conexión:'.mysqli_connect_error();
    // }
?>
```
Lo actualizaremos y dejaremos de este modo:
```PHP
<?php
    // Conexión base de datos de la Universidad.
    // * Se requiere estar conectado al OpenVPN.
	$conn=mysqli_connect('mysqltrans.face.ubiobio.cl','G51taller','G51taller1058','G51taller_bd');
     date_default_timezone_set('America/Santiago');
     if(mysqli_connect_errno()){
        echo 'Error de conexión:'.mysqli_connect_error();
    }

    // Utilizar conexión local:
    // $conn=mysqli_connect('db','root','test','unidep');
    // if(mysqli_connect_errno()){
    //     echo 'Error de conexión:'.mysqli_connect_error();
     //}

    // Utilizar otra conexión:
    // $conn=mysqli_connect('host','username','password','dbname');
    // if(mysqli_connect_errno()){
    //     echo 'Error de conexión:'.mysqli_connect_error();
    // }
?>
```
> Con esto dejaremos establecida la conexión de la base de datos de la universidad, en caso de que utilicemos otras credenciales u proveedor completaremos los campos marcados en la línea 18.

Una vez que modificamos lo solicitado utilizaremos el comando **CONTROL + S** y **CONTROL + X ** para guardar y salir.

Luego de eso ya estaría corriendo completamente el proyecto en el servidor.

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
