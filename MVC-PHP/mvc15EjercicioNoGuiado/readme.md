
# Ejercicio 15 MVC
**MVC + PDO + MySQL**
**Autor:**  Sebastián Cumbillo *(Takion)*
**Curso:** 1 º DAM - CampusFP Humanes.
**Profesor**: Miguel Angel Romero Pasamontes

## Finalidad de la app.
El ejercicio 15 de MVC tiene la finalidad de aprender el Modelo Vista Controlador *(Model, View Controller)*. Dentro del proyecto recuperamos de una base de datos *(centro)* una tabla de **alumnos** donde ya hay datos existentes, estos fueron agregados desde otra app.

### Funcionalidad del código.

La aplicación permite borrar los datos de los alumnos extraídos desde una base de datos en local, donde los alumnos se muestran en una tabla. Esta app permite escalabilidad ya que se compone de Clases que permiten el cambio a una base de datos externa.

## Estructura MVC:
> Puedes acceder a cada archivo haciendo **click** en ellos
* apps { 
	* models
		* [Alumnos.php](https://github.com/sebalj03campusFP/PRGRM/blob/e188f89df51ec4120f3ad6ba149757a30b740d5e/MVC-PHP/mvc15EjercicioNoGuiado/apps/controllers/Alumnos.php)
		* [RepositorioAlumnos.php](https://github.com/sebalj03campusFP/PRGRM/blob/e188f89df51ec4120f3ad6ba149757a30b740d5e/MVC-PHP/mvc15EjercicioNoGuiado/apps/models/RepositorioAlumnos.php)
		* [ConexionDB.php](https://github.com/sebalj03campusFP/PRGRM/blob/e188f89df51ec4120f3ad6ba149757a30b740d5e/MVC-PHP/mvc15EjercicioNoGuiado/apps/models/ConexionDB.php)
	* views
		* [layout.php](https://github.com/sebalj03campusFP/PRGRM/blob/e188f89df51ec4120f3ad6ba149757a30b740d5e/MVC-PHP/mvc15EjercicioNoGuiado/apps/views/layout.php)
		* alumnos
			* [listar.php](https://github.com/sebalj03campusFP/PRGRM/tree/e188f89df51ec4120f3ad6ba149757a30b740d5e/MVC-PHP/mvc15EjercicioNoGuiado/apps/views/alumnos/listar.php)
	* controllers
		* [ControladorAlumnos.php](https://github.com/sebalj03campusFP/PRGRM/blob/e188f89df51ec4120f3ad6ba149757a30b740d5e/MVC-PHP/mvc15EjercicioNoGuiado/apps/controllers/ControladorAlumnos.php)
}
* public {
	* index.php[enter link description here](https://github.com/sebalj03campusFP/PRGRM/blob/e188f89df51ec4120f3ad6ba149757a30b740d5e/MVC-PHP/mvc15EjercicioNoGuiado/public/index.php)
}
* storage {
	* errores.log
}

## Explicación y desarrollo:
### Alumnos.php
Es una clase que contiene las variables donde se almacenará la información de los alumnos, aunque el programa "borre" alumnos no quita el hecho que necesita la referencia de donde viene el objeto "Alumno".
### RepositorioAlumnos.php
Aqui el repositorio obtiene los datos y manda acciones del controlador. Está la funcion getAlumno() donde extrae los datos de la Base de Datos y formatea estos datos para nuestra app.
También deleteID() donde manda la acción por URL para eliminar por ID el alumno seleccionado
### ConexionDB.php

Se crea una clase Conexión para determinar los parámetros de la base de datos, la IP, el nombre de la base de datos, el usuario y su contraseña correspondiente.

### Layout.php
El layout es la parte visual de nuestra app, pero solo base, establece el "terreno" donde se insertará la vista seleccionada. En este caso la App solo tiene una vista la cual es "listar.php"

### Listar.php
Hablando justamente de listar.php, aquí es donde esta la vista especial de nuestro programa donde a través de un bucle for mostramos línea a línea los datos estructurados dentro de una tabla HTML.

### ControladorAlumnos.php
Aquí es donde toda la lógica se une, el controlador ejecuta distintos métodos usando el repositorio, la clase, etc. Desde el se usan los métodos los cuales termina incluyendo  nuestro repositorio el cual extrae datos para que el controlador pueda procesarlos y devolverlos.

### index.php
Aquí es la parte final donde se enlaza lo que el usuario quiere, si el usuario decide hacer un acción el index recibirá la petición la cual llamará al controlador y sus métodos por consecuencia este llamará al repositorio y el repositorio recupera de la Base de Datos (nuestra clase conexión)
