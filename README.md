# Docker - Inyección SQL con PHP

## Descripción

Esta aplicación es una web ficticia creada en PHP sin seguridad 
que tiene como fin el hacking mediante inyección SQL.

Al abrir la web aparecerá la página **login.php** donde deberás tener acceso a la página principal sin saber las credenciales.

### Desafío

El reto tiene como objetivo:

- Realizar inyección SQL en el login.
- Entrar a la maquina virtual.
- Modificar la página con un mensaje de alerta que diga **Página hackeada**.
- Cambiar los passwords de la web y de la maquina virtual. Éstas están en base64.

### Empezar

Realize un **git clone** del repositorio.

La información para la maquina virtual que necesitamos está en el archivo Dockerfile en el directorio de la aplicación.

1. **Correr la aplicación sin docker**
    *Importante*: La maquina virtual no estará disponible para cumplir el reto de entrar por SSH.
   
    **Ejecute el comando**: 
   
   > php -S localhost:80 -t ./
   
    Puede usar el puerto que desee y cambiar el **localhost** por la ip de su maquina local.

2. **Correr la aplicación con Docker**
    *Requisitos*:
   
   - Tener instalado [Docker](https://www.docker.com/)
   
   - Tener conocimientos basicos de Docker
   
   - **Construir la imagen**
     Sitúe la terminal en el directorio de la aplicación y ejecute el siguiente comando:  
     
     > docker build -t sql_injection .
     
     Esto descargará la imagen **php:8.2-cli** para poder correr la aplicación y creará nuestra imagen llamada **sql_injection**.

3. **Verificar si la imagen se ha creado**
    Ejecute el siguiente comando y verifique que exista la imagen llamada **sql_injection**.
   
   > docker images
   
    Al ejecutar el comando deberían aparecer las dos imagenes mencionadas anteriormente  **php:8.2-cli** y **sql_injection**.

4. **Corramos la aplicación en un contenedor**
    Ejecute: 
   
   > docker run -it --rm -p80:80 --name php_hacking sql_injection
   
    El contenedor será creado con el nombre de *php_hacking*
    y la url del servidor será http://0.0.0.0:80
    No olvide iniciar el servicio ssh.  

   > docker exec -it php_hacking service ssh start
   
    Si desea saber la ip de la propia maquina virtual donde se ejecuta la aplicación web
    Ejecute:
   
   > docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' php_hacking
   
    La salida será algo parecído a [172.17.0.2](). Si desea levantar el servidor desde esta ip, abrala en su navegador añadiendo el puerto. Si usa el puerto **80** no es necesario colocarlo.
   
    Si queremos usar la red del host anfitrión, ejecutemos: 
   
   > docker run -it --rm --network host --name php_hacking sql_injection 

6. **Descifre las contraseñas**
    Busque las contraseñas en la sección **Mis credenciales** y descifre-las.
   
   - Ya que tiene la contraseña de la maquina virtual, acceda a entrar por ssh. 
   - Deje en la página un mensaje que diga **Página hackeada**.    

7. **Descargue, exporte o copie la base de datos SQLite**
   
   - Al final de la página cree una etiqueta <**a**> con el atributo **download** donde el *href* sea la dirección relativa de la base de datos. Por medio del enlace, descargue la base de datos. 
   - Despues de descargar la base de datos, elimine el enlace.
   - Por ultimo, examine los datos que hayan en las tablas y su estructura.

8. **Detener y eliminar el contenedor**
   
   > docker stop php_hacking
   > docker rm php_hacking

9. **Eliminar imagen**
   
   > docker rmi sql_injection

10. **Eliminar imagen php:8.2-cli**
   
   > docker rmi php:8.2-cli
