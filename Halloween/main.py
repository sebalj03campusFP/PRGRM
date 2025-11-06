#Importacion librerias
import monstruos
import menus
import utils
#Variables
eleccion = None
multiplicador = 1.0

def juego():
    if not jugadorRinde:
        print(f"Usas tu arma (Efectividad: x{multiplicador})")
        jugador_gana = utils.calcular_victoria(multiplicador, dificultadActual)
        if jugador_gana:
            print(f"¡GANASTE! Has derrotado a {enemigoActual}.")
        else:
            print(f"¡PERDISTE! el/la {enemigoActual} te ha vencido.")
        return jugador_gana
    else:
        print(f"Te rindes, pero el/la {enemigoActual} te mata.")
        return None

#Variables dentro del Juego
print(menus.inicio)
jugadorRinde = False

while eleccion != 5:
    monstruo_derrotado = False
    intentos = 3
    enemigoActual = monstruos.seleccionMonstruo(monstruos.monstruos)
    dificultadActual = monstruos.monstruoDificultad(enemigoActual)
    print(f"¡Un/a {enemigoActual} aparece! (Dificultad: {dificultadActual})")
    print(menus.menuEquipamiento)
    eleccion = int(input("Seleccion un arma para atacar: "))
    match eleccion:
        case 1:
            multiplicador = utils.efectividadEstaca(enemigoActual)
            if juego():
                monstruo_derrotado = True
            else:
                intentos -= 1
        case 2:
           multiplicador = utils.efectividadPocion(enemigoActual)
           if juego():
                monstruo_derrotado = True
           else:
                intentos -= 1
        case 3:
           multiplicador = utils.efectividadHechizo(enemigoActual)
           if juego():
                monstruo_derrotado = True
           else:
                intentos -= 1
        case 4:
            multiplicador = utils.efectividadHechizo(enemigoActual)
            if juego():
                monstruo_derrotado = True
            else:
                intentos -= 1
        case 5:
            print(f"Te rindes, pero el monstruo te mata")
            jugadorRinde = True
            juego(jugadorRinde)
        case _:
            print("Que haces, no te desesperes. Cabeza fría.")
