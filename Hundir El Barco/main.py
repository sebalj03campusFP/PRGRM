#Importacion librerias
import numpy as np
from utils import *
import tablero

#Variables
barco1 = np.array((1,1)) 
barco2 = np.array((1,1,1)) 
barco3 = np.array((1,1,1,1)) 
listaBarcos = [barco1, barco2, barco3]

#Bucle para sacar varios barcos (4 exactamente)
for i in range(4):
    barco = selecBarco(listaBarcos)
    x, y = genCoordenadas(barco)
    posBarco(tablero.tablero, barco, x, y)

while quedanBarcos(tablero.tablero):
    mostrarJuego(tablero.tableroJugador)  #Tablero , DEBUG aqui tambien se debe agregar el tablero oculto con: tablero.tablero
    xDisparo, yDisparo = userCoordenadas()  #Coordenadas del disparo
    comprobarDisparo(xDisparo, yDisparo, tablero.tablero, tablero.tableroJugador) #Comprobacion del disparo

# mostrar_tablero(tablero.tablero)      #Colorema

print(tablero.tablero)

print(tablero.tableroJugador)