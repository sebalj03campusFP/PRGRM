#Importacion de librerias y modulos
import libreriaEquipos
import libreriaJugadores
import libreriaPartidos

#Variables
from libreriaJugadores import listaJugadores
from libreriaEquipos import listaEquipos
from libreriaPartidos import listaPartidos 

                #Menus

menu_principal = """
|=== Liga Deportiva Amateur ===|
1. Gestion de equipos
2. Gestion de jugadores
3. Calendario de partidos
4. Resultados y clasificacion
5. Salir
"""

menu_equipos_texto = """
--- Modulo: Gestion de Equipos ---
1. Crear equipo
2. Listar equipos
3. Buscar equipo por ID
4. Actualizar datos de equipo
5. Eliminar equipo (marcar inactivo)
6. Salir (Volver al menu principal)
"""

menu_jugadores_texto = """
--- Modulo: Gestion de Jugadores ---
1. Alta de jugador
2. Listar jugadores
3. Buscar jugador (por ID Jugador o ID Equipo)
4. Actualizar datos de jugador
5. Eliminar jugador (marcar inactivo)
6. Salir (Volver al menu principal)
"""


menu_partidos_texto = """
--- Modulo: Gestion de Partidos (Calendario) ---
1. Crear partido
2. Listar partidos (jugados/pendientes)
3. Reprogramar partido (fecha/hora)
4. Eliminar partido (solo pendientes)
5. Salir (Volver al menu principal)
"""


menu_ranking_texto = """
--- Modulo: Resultados y Clasificacion ---
1. Registrar resultado de partido
2. Ver Clasificacion (Ranking)
3. Salir (Volver al menu principal)
"""

def menu_equipos():
    entrada = 0
    while entrada != 6:
        print(menu_equipos_texto)
        entrada = int(input("Seleccione una opcion (1-6): "))
        match entrada:
            case 1:
                libreriaEquipos.crearEquipo(listaEquipos)
                print(listaEquipos) # Debug 
            case 2:
                libreriaEquipos.listarEquipos(listaEquipos)
            case 3:
                libreriaEquipos.buscarEquipo(listaEquipos)
            case 4:
                libreriaEquipos.actualizarEquipo(listaEquipos)
                print(listaEquipos) # Debug 
            case 5:
                libreriaEquipos.eliminarEquipo(listaEquipos)
                print(listaEquipos) # Debug 
            case 6:
                print("Volviendo al menu principal...")
            case _:
                print("Opcion no valida.")

def menu_jugadores(listaJugadores, listaEquipos):
    entrada = 0
    while entrada != 6:
        print(menu_jugadores_texto)
        entrada = int(input("Seleccione una opcion (1-6): "))
        match entrada:
            case 1:
                libreriaJugadores.crearJugador(listaJugadores)
                print(listaJugadores) # Debug 
            case 2:
                libreriaJugadores.listarJugadores(listaJugadores)
            case 3:
                libreriaJugadores.buscarJugador(listaJugadores, listaEquipos)
            case 4:
                libreriaJugadores.actualizarJugador(listaJugadores)
                print(listaJugadores) # Debug 
            case 5:
                libreriaJugadores.eliminarJugador(listaJugadores)
                print(listaJugadores) # Debug 
            case 6:
                print("Volviendo al menu principal...")
            case _:
                print("Opcion no valida.")


def menu_partidos():
    entrada = 0
    while entrada != 5:
        print(menu_partidos_texto)
        entrada = int(input("Seleccione una opcion (1-5): "))
        match entrada:
            case 1:
                libreriaPartidos.crearPartido(listaPartidos, listaEquipos)
            case 2:
                libreriaPartidos.listarPartidos(listaPartidos, listaEquipos)
            case 3:
                libreriaPartidos.reprogramarPartido(listaPartidos)
            case 4:
                libreriaPartidos.eliminarPartido(listaPartidos)
            case 5:
                print("Volviendo al menu principal...")
            case _:
                print("Opcion no valida.")


def menu_ranking():
    entrada = 0
    while entrada != 3:
        print(menu_ranking_texto)
        entrada = int(input("Seleccione una opcion (1-3): "))
        match entrada:
            case 1:
                libreriaPartidos.registrarResultado(listaPartidos)
            case 2:
                libreriaPartidos.clasificacion(listaPartidos, listaEquipos)
            case 3:
                print("Volviendo al menu principal...")
            case _:
                print("Opcion no valida.")


def pintamenu_principal():
    print(menu_principal) 
    entrada = int(input("Seleccione una opcion (1-5): "))
    match entrada:
        case 1:
            menu_equipos()
        case 2:
            menu_jugadores(listaJugadores, listaEquipos)
        case 3:
            menu_partidos() 
        case 4:
            menu_ranking() 
        case 5:
            print("¡Hasta pronto!")
        case _:
            print("Opcion no valida. Intente de nuevo.")
    return entrada