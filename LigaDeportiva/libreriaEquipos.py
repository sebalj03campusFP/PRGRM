#Importacion de Librerias
import utiles
from tabulate import tabulate
#Variables
listaEquipos = []
#Definicion de variables
def crearEquipo(listaEquipos):

    id_nuevo = utiles.generar_id(listaEquipos)
    nombreNuevo = input("Define el nombre: ")
    ciudadNueva = input("Define la ciudad: ")
    
    activoEntrada = input("Esta activo? (s/n): ")
    activoNuevo = (activoEntrada == "s")
    
    nuevoEquipo = {
            "id": id_nuevo,
            "nombre": nombreNuevo,
            "ciudad": ciudadNueva,
            "activo": activoNuevo
    }

    return listaEquipos.append(nuevoEquipo)

def listarEquipos(listaEquipos):
 
    entrada = str(input("Buscar (activo/inactivo) (a/i): "))
    match entrada:
        case "a":
            equipoEncontrado = []
            for equipo in listaEquipos:
                if equipo["activo"] == True:
                    equipoEncontrado.append(equipo) #Pongo los equipos encontrados en una lista para poder mostrarlos en una sola Tabla
            print(f"Equipos activos:")        
            print(tabulate(equipoEncontrado, headers="keys", tablefmt="grid"))
        case "i":
            equipoInactivo = []
            for equipoN in listaEquipos:
                if equipoN["activo"] == False:
                    equipoInactivo.append(equipoN)
            print(f"Equipos inactivos:")
            print(tabulate(equipoInactivo, headers="keys", tablefmt="grid"))

def buscarEquipo(listaEquipos):
    entrada = int(input("Buscar por ID: "))
    
    for equipo in listaEquipos: 
        if equipo["id"] != entrada: 
            print("El ID no existe o es incorrecto")
    for equipo in listaEquipos:
        if equipo["id"] == entrada:

            print(tabulate([equipo], headers="keys", tablefmt="grid"))

def actualizarEquipo(listaEquipos):

    entrada = int(input("Buscar por ID: "))
    for equipo in listaEquipos:
        if equipo["id"] == entrada:

            print(tabulate([equipo], headers="keys", tablefmt="grid"))
            
            cambioN = str(input("Escribe el nuevo nombre: "))
            equipo["nombre"] = cambioN
            cambioC = str(input("Escribe la nueva ciudad: "))
            equipo["ciudad"] = cambioC
            
            print("¡Equipo actualizado!")
            
def eliminarEquipo(listaEquipos):

    entrada = int(input("Borrar por ID: "))
    for equipo in listaEquipos:
        if equipo["id"] == entrada:
            print("Has borrado:")
            equipo["activo"] = False
            print(tabulate([equipo], headers="keys", tablefmt="grid"))