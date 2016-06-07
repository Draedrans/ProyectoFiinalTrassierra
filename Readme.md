#IMPORTANTE

##INSTRUCCIONES PARA TRABAJAR CON EL PROYECTO

###GIT
Existirán las ramas master y dev.
* Master: No se deberá tocar salvo que se implemente una característica COMPLETA y ESTABLE que esté funcionando en la rama dev.
* Dev: Rama principal de trabajo sobre la que se enviará el trabajo en proceso POR CARACTERÍSTICAS.
* CREATE UNA RAMA LOCAL A PARTIR DE `dev` SOBRE LA QUE IMPLEMENTAR UNA CARACTERÍSTICA Y RECUERDA HACER COMMITS PEQUEÑOS Y CONCRETOS CON MENSAJES EXPLICATIVOS.

RECUERDA HACER `git fetch origin` CADA VEZ QUE TRABAJES PARA TENER EL CONTENIDO ACTUALIZADO

###Requisitos
* Apache2
* PHP5.5
* MySQL 5
* NPM y Bower
* Phalcon

###NPM y Bower
Primero se necesita instalar NodeJS para tener la herramienta NPM (Node Package-Manager) con el que instalaremos Bower.
Bower es un gestor de dependencias de front-end para proyectos web. Asi
podremos tener una version misma de Bootstrap y JQuery para evitar problemas.

1. NodeJS puede ser obtenido en su [PÁGINA WEB](http://www.nodejs.org). Basta con seguir las instrucciones.
SI SE ESTÁ EN WINDOWS, ES IMPORTANTE AÑADIR LA RUTA DEL EJECUTABLE npm.exe AL PATH.

2. Abrir un terminal/cmd y navegar a la ruta del proyecto.
* `cd /var/www/html/orientacion` - LAMP
* `cd /var/www/orientacion` - APACHE SUELTO
* `cd C:\xampp\htdocs\orientacion` - XAMPP en Windows

3. Ejecutar `npm install -g bower` para instalar bower en el sistema.

4. Con npm instalado, ejecutar `bower update` para instalar todas las dependencias (Bootstrap y JQuery por ahora). Carpeta: `orientacion/public/bower_components` Ya añadida al gitignore.

###Phalcon
Ir a su [PÁGINA WEB](http://www.phalconphp.com) para descargarlo, compilarlo (en caso de usar Linux) y activarlo. Tiene instrucciones.
Después recargar el servidor Apache y hacer un archivo .php sencillo que contenga:
```
<?php echo phpinfo(); ?>
```
Con esto se imprimirá una página en la que habrá una sección llamada `phalcon` si está correctamente cargado.

###Utilidades
Sería util instalar varios plugins en el IDE que se use para el proyecto.
* Plugin para gestionar .gitignore
* Plugin para visualizar lenguaje Markdown
* Plugin para visualizar lenguaje Volt.

###Base de datos
Tenéis que importar el archivo `Basededatosfinal.sql` que está en la carpeta `schemas` Y DESPUÉS CORRER LA MIGRACIÓN
Para ello abrir el cmd o terminal teniendo instaladas las phalcon-devtools, dirigir a la carpeta del projecto y `phalcon migration run`

#COMO CLONAR EL PROYECTO
```
git clone https://github.com/Draedrans/ProyectoFiinalTrassierra.git
cd orientacion
git fetch origin
git checkout -b dev origin/dev
```