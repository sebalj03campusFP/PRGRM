#Importacion Librerias
import numpy as np
import random
import tablero
#import colorama   #Descomentar para activar colorema
#from colorama import Fore, Back, Style    #Descomentar para activar colorema  # Experimento Hecho con IA
#Variables
"""
colorama.init() # Hecho con IA
PIXEL_AGUA = Back.BLUE + '  ' + Style.RESET_ALL  # Hecho con IA
PIXEL_BARCO = Back.YELLOW + '  ' + Style.RESET_ALL # Hecho con IA
#Funciones
"""
def genCoordenadas(barco):
    x = random.randrange(4, 17)     #Coordenadas
    y = random.randrange(1, 17)
    return x, y

def posBarco(tableroArray,barco, x, y):
    longitud = len(barco)       #Longitud del barco segun su array
    tableroArray[x, y : y + longitud] = barco
    return tableroArray

def selecBarco(lista):
    barcoSeleccionado = random.choice(lista)
    return barcoSeleccionado

def userCoordenadas():
    while True:
        x = int(input("Introduce la fila: (0-19)"))
        y = int(input("Introduce la columna: (0-19)"))
        if 0 <= x <= 19 and 0 <= y <= 19: #Comprobacion para que el usuario no se salga del tablero
            return x, y
        else:
            print("Esas coordenadas estan fuera del tablero")

def quedanBarcos(tableroOculto):
    if np.count_nonzero(tableroOculto == 1) > 0:
        return True
    else:
        return False

def comprobarDisparo(x, y, tableroOculto, tableroJugador):
   #Acierto
    if tableroOculto[x, y] == 1:
        print("\n¡¡¡ACIERTO!!!\n")
        tableroJugador[x, y] = 2  # Actualiza el tablero del jugador
        tableroOculto[x, y] = 2   # Actualiza el tablero oculto        
    #Fallo
    elif tableroOculto[x, y] == 0:
        print("\n...AGUA...\n")
        tableroJugador[x, y] = 3  # Actualiza el tablero del jugador
        
    else:
        print("\nYa habías disparado en esa casilla. Inténtalo de nuevo.\n")

def mostrarJuego(tableroJugador):

    print("\n--- Hundir la Flota ---")
    print(tableroJugador)
    
    #Debug , agregar otro parametro en la funcion con variable tableroOculto
    #print("Tablero Oculto")
    #print(tableroOculto)

""""  #Colorema: Quitar comentario para activar colores
def mostrar_tablero(tablero): # Hecho con IA
    for fila in tablero:
        linea_para_imprimir = ""
        for celda in fila:
            if celda == 0:
                linea_para_imprimir += PIXEL_AGUA
            elif celda == 1:
                linea_para_imprimir += PIXEL_BARCO
        print(linea_para_imprimir)
"""