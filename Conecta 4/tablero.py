#importacion de librerias
import numpy as np
import config
#Funciones
def crearTablero():
    return np.zeros((config.filas, config.columnas), dtype=int)

def imprimirTablero(tablero):  #Reutilizado del codigo de Tres en Raya
    for fila in tablero:  #Pinta la matriz en un tablero mas llamativo
        linea = ""
        for celda in fila:
            if celda == 0:
                linea += "[ ]" #Vacio
            elif celda == 1:
                linea += " O " # Jugador
            elif celda == 2:
                linea += " X " #  jugador 2
        print(linea)    
    print("---------------------")

def encontrarFilaLibre(tablero, col):
    columnaCompleta = tablero[:, col]
    indicesVacios = np.where(columnaCompleta == config.vacio)[0]  #Uso de np where para usar un condicional como comparador  config vacio es = 0
    if indicesVacios.size > 0:
        return indicesVacios[-1] #Devuelve el ultimo indice
    return -1 # Indica que la columna esta llena

def tableroLleno(tablero):
    filaSuperior = tablero[0, :]
    if np.any(filaSuperior == config.vacio):  #Uso  de any para chequear el espacio
        return False
    return True