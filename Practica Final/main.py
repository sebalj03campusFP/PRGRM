#Importacion librerias.
import menus
import utils as u
from pathlib import Path
#Variables
dni = []
nombre = []
apellidos = []
telefono = []
base = Path(__file__).resolve().parent
archivo_db = base/"datos_clientes.pkl"

entrada = None

#Logica

while entrada != 8:
    print(menus.menu)
    entrada = int(input("Opcion: "))
    match entrada:
        case 1:
            u.nuevoCliente(dni,nombre,apellidos,telefono)
        
        case 2:
            print("Lista de Usuarios: \n")
            print(f"{dni} \n {nombre} \n {apellidos} \n {telefono}")
        
        case 3:
            print("=== Busqueda por DNI ===")
            buscar = str(input("Escribe el DNI a buscar: "))
            u.buscarDNI(buscar,dni,nombre,apellidos,telefono)
        case 4:
            print("=== Modificar Telefono ===")
            buscar = str(input("Escribe el DNI a buscar: "))
            u.modTel(buscar, dni,telefono)
        case 5:
            print("=== Eliminado de cliente ===")
            buscar = str(input("Escribe el DNI a buscar: "))
            u.borrarCliente(buscar,dni,nombre,apellidos,telefono)
        case 6:
            print("=== Guardando fichero ===")
            u.guardado(archivo_db, dni,nombre,apellidos,telefono)
        case 7:
            print("=== Cargando fichero ===")
            dni, nombre, apellidos, telefono = u.cargar(archivo_db)
        case 8:
            print("Has seleccionado: Salir, Hasta pronto.")
        case _:
            print("Esa no es una opcion!")
