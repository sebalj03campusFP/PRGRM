#Importacion Librerias
import numpy as np


def crearTablero():
    tablero = np.zeros((8, 8), dtype=int) 
    for fila in range(8):
        for col in range(8):
            if (fila + col) % 2 != 0:
                if fila < 3:
                    tablero[fila, col] = 3
                elif fila > 4:
                    tablero[fila, col] = 1
                    
    return tablero

def mostrarTablero(tablero):
    print("   0  1  2  3  4  5  6  7") # Guia de columnas
    print("  ------------------------")
    
    numeroFila = 0
    for fila in tablero:
        linea = str(numeroFila) + "| " # Guia de filas
        for celda in fila:
            if celda == 0:
                linea += ".  " # Casilla vacia
            elif celda == 1:
                linea += "o  " # Peon J1
            elif celda == 2:
                linea += "O  " # Rey J1
            elif celda == 3:
                linea += "x  " # Peon J2
            elif celda == 4:
                linea += "X  " # Rey J2
        print(linea)
        numeroFila = numeroFila + 1
    print("")

def obtenerContenido(tablero, fila, col):
    if 0 <= fila <= 7 and 0 <= col <= 7:     # Si se sale del rango 0-7, devolvemos -1 (error)
        return tablero[fila, col]
    else:
        return -1


def esMovimientoSimpleValido(tablero, fOrigen, cOrigen, fDestino, cDestino, turno):
    esValido = False
    #Verificacion dentro del tablero
    if (0 <= fDestino <= 7) and (0 <= cDestino <= 7):
        
        ficha = tablero[fOrigen, cOrigen]
        destino = tablero[fDestino, cDestino]
        
        # Verificacion casilla vacia
        if destino == 0:
            
            #Distancia en diagonal
            diferenciaFila = fDestino - fOrigen
            diferenciaCol = abs(cDestino - cOrigen) # abs quita el signo negativo
            
            # La columna siempre debe variar en 1
            if diferenciaCol == 1:
                
                #Jugador 1
                if turno == 1:
                   # Peon  Solo puede bajar +1
                    if ficha == 1 and diferenciaFila == -1:
                        esValido = True
                    # Rey  Puede subir o bajar +1 -1
                    elif ficha == 2 and abs(diferenciaFila) == 1:
                        esValido = True
                
                    #Jugador 2
                elif turno == 2:
                    # Peon  Solo puede bajar +1
                    if ficha == 3 and diferenciaFila == 1:
                        esValido = True
                    # Rey  Puede subir o bajar +1 -1
                    elif ficha == 4 and abs(diferenciaFila) == 1:
                        esValido = True

    return esValido

def moverFicha(tablero, fOrigen, cOrigen, fDestino, cDestino):
    # Copiamos la ficha al destino
    ficha = tablero[fOrigen, cOrigen]
    tablero[fDestino, cDestino] = ficha
    
    #Se borra la ficha
    tablero[fOrigen, cOrigen] = 0
    

    if ficha == 1 and fDestino == 0:
        tablero[fDestino, cDestino] = 2
        print("El Jugador 1 ahora es un rey")
        

    if ficha == 3 and fDestino == 7:
        tablero[fDestino, cDestino] = 4
        print("El Jugador 2 ahora es un rey")

    return tablero
