#Importacion de librerias
import numpy as np
import random

#Variables

tableroLogico = np.zeros((3, 3), dtype=int)

#Definicion de funciones

def userCoordenadas():
    while True:
        x = int(input("Introduce la fila: (0-2)"))
        y = int(input("Introduce la columna: (0-2)"))
        if 0 <= x <= 2 and 0 <= y <= 2: #Comprobacion para que el usuario no se salga del tablero
            return x, y
        else:
            print("Esas coordenadas estan fuera del tablero")


def jugadorInput(tableroArray, x,y, jugador):
    tableroArray[x, y] = jugador
    return tableroArray


def mostrarTablero(tablero):
    for fila in tablero:  #Pinta la matriz en un tablero mas llamativo
        linea = ""
        for celda in fila:
            if celda == 0:
                linea += "[ ]" #Vacio
            elif celda == 1:
                linea += " O " # Jugador
            elif celda == 2:
                linea += " X " # CPU
        print(linea)

def estaCasillaLibre(tableroArray, x, y):
    if tableroArray[x,y] == 0:      #Comprueba si esta vacio o tiene algo dentro
        return True
    else:
        return False

def turnoCPU(tableroArray):
    while True:
        x = random.randrange(0,3)
        y = random.randrange(0,3)
        if estaCasillaLibre(tableroArray, x , y):
            return x, y

def tableroLleno(tableroArray):
    if np.count_nonzero(tableroArray == 0) == 0:    # Comprueba los ceros
        return True
    else:
        return False
    


def comprobar(tableroArray, jugador):
    for i in range(3):
        if np.all(tableroArray[i,:] == jugador):  #Usando "slicing" leo cada fila y columna para comprobar si el jugador gana: Explicacion  i es la  fila , : es la columna
            return True

    for i in range(3):
        if np.all(tableroArray[:, i] == jugador):  #Aqui es a la inversa :  es fila y i la columna.
            return True

    if np.all(tableroArray.diagonal() == jugador): #Funcion de diagonal en con NP ALL (Condicional con bool)
            return True

    if np.all(np.fliplr(tableroArray).diagonal() == jugador):  #Para girar la funcion diagonal que lea de derecha a izquierda 
        return True






