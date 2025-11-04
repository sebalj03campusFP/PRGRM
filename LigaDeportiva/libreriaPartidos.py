#Importacion Librerias
import utiles
from tabulate import tabulate

# Variables
listaPartidos = []

#Definicion Funciones
def crearPartido(listaPartidos, listaEquipos):

    print("--- 1. Crear Partido ---")
    id_nuevo = utiles.generar_id(listaPartidos) #
    jornada = int(input("Jornada: "))

    # Validar del Equipo L
    equipo_local = None
    id_local = 0
    while equipo_local is None:
        id_local = int(input("ID Equipo Local: "))
        # Buscar el equipo
        for equipo in listaEquipos:
            if equipo["id"] == id_local:
                equipo_local = equipo

        if equipo_local is None:
            print("Error: Equipo no encontrado.")
        elif equipo_local["activo"] == False:
            print("Error: El equipo local no está activo.")
            equipo_local = None # Para que el bucle repita

    # Validar el Equipo V
    equipo_visitante = None
    id_visitante = 0
    while equipo_visitante is None:
        id_visitante = int(input("ID Equipo Visitante: "))

        if id_visitante == id_local:
            print("Error: El equipo visitante no puede ser el mismo que el local.")
        else:

            for equipo in listaEquipos:
                if equipo["id"] == id_visitante:
                    equipo_visitante = equipo
            
            if equipo_visitante is None:
                print("Error: Equipo no encontrado.")
            elif equipo_visitante["activo"] == False:
                print("Error: El equipo visitante no está activo.")
                equipo_visitante = None # Para que el bucle repita

    fecha = input("Fecha: ")
    hora = input("Hora: ")

    nuevoPartido = {
        "id": id_nuevo,
        "jornada": jornada,
        "local_id": id_local,
        "visitante_id": id_visitante,
        "fecha": fecha,
        "hora": hora,
        "jugado": False,
        "resultado": None # (golesLocal, golesVisitante)
    }
    listaPartidos.append(nuevoPartido)
    print("¡Partido creado!")
    print(tabulate([nuevoPartido], headers="keys", tablefmt="grid"))


def listarPartidos(listaPartidos, listaEquipos):

    entrada = str(input("Buscar (jugados/pendientes) (j/p): "))

    partidos_encontrados = []
    titulo = ""

    match entrada:
        case "j":
            titulo = "Partidos Jugados:"
            for partido in listaPartidos:
                if partido["jugado"] == True:
                    partidos_encontrados.append(partido)
        case "p":
            titulo = "Partidos Pendientes:"
            for partido in listaPartidos:
                if partido["jugado"] == False:
                    partidos_encontrados.append(partido)
        case _:
            print("Opcion no valida")
            return


    partidos_display = []
    for p in partidos_encontrados:
        p_display = p.copy() # No modificar el original

        # Buscar nombre local
        nombre_local = ""
        for e in listaEquipos:
            if e["id"] == p["local_id"]:
                nombre_local = e["nombre"]

        # Buscar nombre visitante
        nombre_visitante = ""
        for e in listaEquipos:
            if e["id"] == p["visitante_id"]:
                nombre_visitante = e["nombre"]

        p_display["local_nombre"] = nombre_local
        p_display["visitante_nombre"] = nombre_visitante
        partidos_display.append(p_display)

    print(titulo)
    print(tabulate(partidos_display, headers="keys", tablefmt="grid"))


def reprogramarPartido(listaPartidos):

    print("--- 3. Reprogramar Partido ---")
    entrada = int(input("Buscar por ID de Partido: "))

    partido_encontrado = None

    for p in listaPartidos:
        if p["id"] != entrada:
            print("El ID no existe o es incorrecto")


    for p in listaPartidos:
        if p["id"] == entrada:
            partido_encontrado = p

            if p["jugado"] == True:
                print("Error: No se puede reprogramar un partido ya jugado.")
            else:
                print("Partido seleccionado:")
                print(tabulate([p], headers="keys", tablefmt="grid"))

                nueva_fecha = input(f"Nueva fecha (actual: {p['fecha']}): ")
                nueva_hora = input(f"Nueva hora (actual: {p['hora']}): ")
                p["fecha"] = nueva_fecha
                p["hora"] = nueva_hora

                print("¡Partido reprogramado!")
                print(tabulate([p], headers="keys", tablefmt="grid"))

    if partido_encontrado is None:
        print("Partido no encontrado.")


def eliminarPartido(listaPartidos):
    print("--- 4. Eliminar Partido ---")
    entrada = int(input("Buscar por ID de Partido: "))
    
    partido_encontrado = None
    # Buscar el partido
    for p in listaPartidos:
        if p["id"] == entrada:
            partido_encontrado = p

    if partido_encontrado:
        if partido_encontrado["jugado"] == True:
            print("Error: No se puede eliminar un partido que ya se jugó.")
        else:
            print("Partido eliminado:")
            print(tabulate([partido_encontrado], headers="keys", tablefmt="grid"))
            #Eliminar dict de la lista
            listaPartidos.remove(partido_encontrado) 
    else:
        print("Partido no encontrado.")


def registrarResultado(listaPartidos):

    print("--- 5. Registrar Resultado ---")
    entrada = int(input("Buscar por ID de Partido: "))

    partido_encontrado = None

    for p in listaPartidos:
        if p["id"] != entrada:
            print("El ID no existe o es incorrecto")

    for p in listaPartidos:
        if p["id"] == entrada:
            partido_encontrado = p
            if p["jugado"] == True:
                print("Error: Este partido ya tiene un resultado registrado.")
            else:
                print("Partido seleccionado:")
                print(tabulate([p], headers="keys", tablefmt="grid"))
                
                goles_local = int(input("Goles del equipo Local: "))
                goles_visitante = int(input("Goles del equipo Visitante: "))
                
                # Guardar el resultado como una tupla (gL, gV)
                p["resultado"] = (goles_local, goles_visitante)
                p["jugado"] = True
                print("¡Resultado registrado!")
                print(tabulate([p], headers="keys", tablefmt="grid"))

    if partido_encontrado is None:
        print("Partido no encontrado.")

# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # 
# CLASIFICACION CLASIFICACION CLASIFICACION CLASIFICACION CLASIFICACION 
# CLASIFICACION CLASIFICACION CLASIFICACION CLASIFICACION CLASIFICACION 
# CLASIFICACION CLASIFICACION CLASIFICACION CLASIFICACION CLASIFICACION 
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # 
def clasificacion(listaPartidos, listaEquipos):
    print("--- 6. Clasificación (Ranking) ---")
    
    #Dict para los partidos
    stats = {}
    for equipo in listaEquipos:
        stats[equipo["id"]] = {
            "id": equipo["id"],
            "nombre": equipo["nombre"],
            "PJ": 0, "G": 0, "E": 0, "P": 0,
            "GF": 0, "GC": 0, "DG": 0, "PTS": 0
        }
    #Partidos JUGADOS
    for partido in listaPartidos:
        if partido["jugado"] == True:
            id_local = partido["local_id"]
            id_visitante = partido["visitante_id"]
            gL, gV = partido["resultado"] 
            
            # Verificar
            if id_local in stats and id_visitante in stats:

                # Actualizar Partidos Jugados 
                stats[id_local]["PJ"] = stats[id_local]["PJ"] + 1
                stats[id_visitante]["PJ"] = stats[id_visitante]["PJ"] + 1

                # Actualizar Goles
                stats[id_local]["GF"] = stats[id_local]["GF"] + gL
                stats[id_local]["GC"] = stats[id_local]["GC"] + gV
                stats[id_visitante]["GF"] = stats[id_visitante]["GF"] + gV
                stats[id_visitante]["GC"] = stats[id_visitante]["GC"] + gL

                # Calcular Puntos 
                if gL > gV: # Gana Local
                    stats[id_local]["G"] = stats[id_local]["G"] + 1
                    stats[id_local]["PTS"] = stats[id_local]["PTS"] + 3
                    stats[id_visitante]["P"] = stats[id_visitante]["P"] + 1
                elif gV > gL: # Gana Visitante
                    stats[id_visitante]["G"] = stats[id_visitante]["G"] + 1
                    stats[id_visitante]["PTS"] = stats[id_visitante]["PTS"] + 3
                    stats[id_local]["P"] = stats[id_local]["P"] + 1
                else: # Empate
                    stats[id_local]["E"] = stats[id_local]["E"] + 1
                    stats[id_local]["PTS"] = stats[id_local]["PTS"] + 1             #Ambos obtienen 1 empate y 1 punto
                    stats[id_visitante]["E"] = stats[id_visitante]["E"] + 1
                    stats[id_visitante]["PTS"] = stats[id_visitante]["PTS"] + 1

    lista_clasificacion = []
    for team_id in stats:
        equipo_stats = stats[team_id]
        # Calcular Diferencia en goles
        equipo_stats["DG"] = equipo_stats["GF"] - equipo_stats["GC"]
        lista_clasificacion.append(equipo_stats)
    # Ordenar por puntos, Tuve que investigar y encontre algo usando sorted y lambda
    lista_ordenada = sorted(lista_clasificacion, key=lambda item: item["PTS"], reverse=True)

    #Salida
    print(tabulate(lista_ordenada, headers="keys", tablefmt="grid"))