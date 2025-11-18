#Importacion de librerias
import numpy as np
import config 
#Funciones
def comprobarGanador(tablero, ficha):
    #Comprobar Horizontal
    for c in range(config.columnas - 3):
        for f in range(config.filas):
            if (tablero[f, c] == ficha and
                tablero[f, c+1] == ficha and
                tablero[f, c+2] == ficha and
                tablero[f, c+3] == ficha):
                return True
    #Comprobar Vertical 
    for c in range(config.columnas):
        for f in range(config.filas - 3):
            if (tablero[f, c] == ficha and
                tablero[f+1, c] == ficha and
                tablero[f+2, c] == ficha and
                tablero[f+3, c] == ficha):
                return True
    #Comprobar Diagonales
    for c in range(config.columnas - 3):
        for f in range(config.filas - 3):
            if (tablero[f+3, c] == ficha and
                tablero[f+2, c+1] == ficha and
                tablero[f+1, c+2] == ficha and
                tablero[f, c+3] == ficha):
                return True
    #Comprobar Diagonales 
    for c in range(config.columnas - 3):
        for f in range(config.filas - 3):
            if (tablero[f, c] == ficha and
                tablero[f+1, c+1] == ficha and
                tablero[f+2, c+2] == ficha and
                tablero[f+3, c+3] == ficha):
                return True  
    return False