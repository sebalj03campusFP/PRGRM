import damas

#Variables
tableroJuego = damas.crearTablero()
juegoTerminado = False
turnoActual = 1 

print("¡Bienvenido a las Damas Españolas!")
print("Jugador 1: 'o' (Mueve hacia arriba)")
print("Jugador 2: 'x' (Mueve hacia abajo)")

#Logica
while not juegoTerminado:
    damas.mostrarTablero(tableroJuego)
    print("Turno del Jugador " + str(turnoActual))
    movimientoRealizado = False
    #Bucle para pedir coordenadas hasta que sean válidas
    while not movimientoRealizado:
        
        #Pedir Origen
        print("¿Qué ficha quieres mover?")
        fOrigen = int(input("Fila Origen: "))
        cOrigen = int(input("Columna Origen: "))
        #Validar que la ficha seleccionada es del jugador actual
        fichaSeleccionada = damas.obtenerContenido(tableroJuego, fOrigen, cOrigen)
        #Chequeo de propiedad de la ficha
        esFichaCorrecta = False
        if turnoActual == 1:
            if fichaSeleccionada == 1 or fichaSeleccionada == 2:
                esFichaCorrecta = True
        elif turnoActual == 2:
            if fichaSeleccionada == 3 or fichaSeleccionada == 4:
                esFichaCorrecta = True      
        if esFichaCorrecta:
            #Pedir Destino
            print("¿A dónde la quieres mover?")
            fDestino = int(input("Fila Destino: "))
            cDestino = int(input("Columna Destino: "))
            
            #Validar Movimiento
            if damas.esMovimientoSimpleValido(tableroJuego, fOrigen, cOrigen, fDestino, cDestino, turnoActual):
                
                #Ejecutar movimiento
                damas.moverFicha(tableroJuego, fOrigen, cOrigen, fDestino, cDestino)
                movimientoRealizado = True
                
            else:
                print("ERROR: Movimiento no válido (recuerda mover en diagonal 1 casilla).")
        
        else:
            print("ERROR: Esa casilla está vacía o no es tu ficha.")

    #Cambiar de turno
    if turnoActual == 1:
        turnoActual = 2
    else:
        turnoActual = 1