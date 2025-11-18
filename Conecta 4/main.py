#Importacion de librerias
import config
from tablero import crearTablero, imprimirTablero, encontrarFilaLibre, tableroLleno
from logica import comprobarGanador
from utils import pedirJugadaValida
#Funciones
def jugarConecta4():
    tablero = crearTablero()
    juegoTerminado = False
    turno = config.jugador1
    while not juegoTerminado:
        imprimirTablero(tablero)
        col = pedirJugadaValida(tablero, turno)  # Empieza el juego
        fila = encontrarFilaLibre(tablero, col)
        if fila != -1: #Colocacion ficha
            tablero[fila, col] = turno
        if comprobarGanador(tablero, turno): #Comprobacion
            imprimirTablero(tablero)
            print(f"Ha ganado el Jugador {turno}")
            juegoTerminado = True
        elif tableroLleno(tablero): # Empate
            imprimirTablero(tablero)
            print("Empate")
            juegoTerminado = True
        if not juegoTerminado:  #Cambio turno
            if turno == config.jugador1:
                turno = config.jugador2
            else:
                turno = config.jugador1

#Inicio de juego
jugarConecta4()