#Importacion Libreria
import ttt_core

#Variables

cpu = 1
jugador = 2
juegoFin = False
turno = 1
#Logica

while not juegoFin:
    ttt_core.mostrarTablero(ttt_core.tableroLogico)
    if turno == 1: #Empieza el turno
        print("Turno del jugador (0)")
        jugadaValida = False
        while not jugadaValida:
            x,y = ttt_core.userCoordenadas()

            if ttt_core.estaCasillaLibre(ttt_core.tableroLogico, x, y):
                ttt_core.jugadorInput(ttt_core.tableroLogico, x ,y, jugador)
                jugadaValida= True
            else:  #Comprobacion de errores
                print("Esa casilla ya esta ocupada")
        
        if ttt_core.comprobar(ttt_core.tableroLogico, jugador):
            print("Has ganado!")
            juegoFin = True
        turno = 2
    else:
        print("Jugando: CPU")
        x, y = ttt_core.turnoCPU(ttt_core.tableroLogico)
        ttt_core.jugadorInput(ttt_core.tableroLogico, x , y, cpu)

        if ttt_core.comprobar(ttt_core.tableroLogico, cpu):
            print("Has perdido...")
            juegoFin = True
        turno = 1 #Reinicia el bucle de turnos