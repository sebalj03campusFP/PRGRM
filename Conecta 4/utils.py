#Importacion de librerias
import config 
#Funciones
def esCadenaNumero(texto):  #Chequeo de numeros para evitar errores
    if texto == "":
        return False
    caracteresValidos = "0123456789"
    for caracter in texto:
        if caracter not in caracteresValidos:
            return False
    return True

def pedirJugadaValida(tablero, turno):

    columnaEsValida = False
    
    while not columnaEsValida:
        rango = f"(0-{config.columnas - 1})"
        jugadaTexto = input(f"Jugador {turno}, elige columna {rango}: ")
        if esCadenaNumero(jugadaTexto):
            col = int(jugadaTexto)
            if 0 <= col < config.columnas:
                # Comprobamos la casilla superior de esa columna
                if tablero[0, col] == config.vacio:
                    columnaEsValida = True
                    return col
                else:
                    print("Error: Esa columna esta llena")
            else:
                print(f"Error: Numero fuera de rango {rango}")
        else:
            print("Error: Debes introducir un numero")