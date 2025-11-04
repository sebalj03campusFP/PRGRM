#Importacion de librerias
import utiles
from tabulate import tabulate
import libreriaEquipos
from libreriaEquipos import listaEquipos
#Variables
listaJugadores = []
#Definicion de funciones
def crearJugador(listaJugadores):
    id_nuevo = utiles.generar_id(listaJugadores)
    nombreNuevo = input("Define el nombre: ")
    posicionNueva = input("Define la posicion: ")
    equipoIdNuevo = int(input("ID del equipo al que pertenece: "))
    activoEntrada = input("Esta activo? (s/n): ")
    activoNuevo = (activoEntrada == "s")
    nuevoJugador = {                #Mismo metodo para crear ficha de jugador
            "id": id_nuevo,
            "nombre": nombreNuevo,
            "posicion": posicionNueva,
            "equipo_id": equipoIdNuevo,
            "activo": activoNuevo
    }

    return listaJugadores.append(nuevoJugador)

def listarJugadores(listaJugadores):        #Buscar jugadores activos o inactivos
    entrada = str(input("Buscar (activo/inactivo) (a/i): "))
    match entrada:
        case "a":
            jugadoresEncontrados = []
            for jugador in listaJugadores:
                if jugador["activo"] == True:
                    jugadoresEncontrados.append(jugador)
            print("Jugadores activos:")
            print(tabulate(jugadoresEncontrados, headers="keys", tablefmt="grid"))
        case "i":
            jugadoresInactivos = []
            for jugadorN in listaJugadores:
                if jugadorN["activo"] == False:
                    jugadoresInactivos.append(jugadorN)
            print("Jugadores inactivos:")
            print(tabulate(jugadoresInactivos, headers="keys", tablefmt="grid"))



def buscarJugador(listaJugadores, listaEquipos):
    print("\n--- 3. Buscar Jugador ---\n1. ID de Jugador (mostrar ficha unica)\n2. ID de Equipo (mostrar todos los jugadores de ese equipo)")
    opcion = int(input("Seleccione una opcion (1-2): "))
    match opcion:
        case 1:
            entrada = int(input("Buscar por ID de Jugador: "))
            for jugador in listaJugadores: 
                if jugador["id"] != entrada: 
                    print("El ID no existe o es incorrecto")
            for jugador in listaJugadores:
                if jugador["id"] == entrada:
                    print("Jugador encontrado:")
                    print(tabulate([jugador], headers="keys", tablefmt="grid"))
        case 2:
            id_equipo_buscado = int(input("Buscar por ID de Equipo: "))
            jugadores_encontrados = [] # Lista para guardar los que coincidan
            for jugador in listaJugadores:
                if jugador["equipo_id"] == id_equipo_buscado:
                    jugadores_encontrados.append(jugador)
            if len(jugadores_encontrados) > 0:
                print(f"Jugadores encontrados en el equipo ID {id_equipo_buscado}:")
                print(tabulate(jugadores_encontrados, headers="keys", tablefmt="grid"))
            else:
                print(f"No se encontraron jugadores para el equipo ID {id_equipo_buscado}.")
        case _:
            print("Opcion no valida.")



def actualizarJugador(listaJugadores):
    entrada = int(input("Buscar por ID: "))
    for jugador in listaJugadores:
        if jugador["id"] == entrada: 
            print(f"Has seleccionado {jugador}")
            cambioN = str(input("Escribe el nuevo nombre: "))
            jugador["nombre"] = cambioN
            cambioP = str(input("Escribe la nueva posicion: "))
            jugador["posicion"] = cambioP
            cambioE = int(input("Escribe el nuevo ID de equipo: "))
            jugador["equipo_id"] = cambioE
            print("¡Jugador actualizado!")

def eliminarJugador(listaJugadores):
    entrada = int(input("Borrar por ID: "))
    for jugador in listaJugadores:
        if jugador["id"] == entrada: 
            print("Has borrado:")
            print(tabulate([jugador], headers="keys", tablefmt="grid"))
            jugador["activo"] = False