#Importacion de librerias

#Variables

listaPalomas = []
listaTiempo = []
#Funciones




def registrarPaloma(listaPalomas):

        anilla = str(input("Numero de Anilla: "))
        nombreP = str(input("Nombre de la Paloma: "))
        propietario = str(input("Propietario: "))

        nuevaPaloma = { 
        "Anilla": anilla,
        "Nombre Paloma": nombreP,
        "Propietario": propietario }

        listaPalomas.append(nuevaPaloma)


def registrarTiempo(listaTiempo):
        anilla = str(input("Anilla: "))
        tiempo = int(input("Tiempo (4km distancia): "))

        nuevoTiempo = {
        "Anilla": anilla,
        "Tiempo en minutos": tiempo,
        "Velocidad calculada (Km/h)": float(4 / (tiempo / 60))  # conversion de minutos a horas
        }

        listaTiempo.append(nuevoTiempo)


def consulta(listaTiempo):
    entrada = str(input("Ingresa la Anilla: "))
    anillaEncontrada = []
    for anilla in listaTiempo:
        if anilla["Anilla"] == entrada:
            anillaEncontrada.append(anilla)
            print(anillaEncontrada)
        else:
            print("Esa anilla no existe")


def ranking(listaTiempo):

    tabla = sorted(listaTiempo,
    key=lambda registro: registro["Velocidad calculada (Km/h)"],  #Se usa sorted para poder ordenar las velocidades
    reverse=True)


    return tabla[:3]  # el :3 usa slice para limitar la tabla anterior( hecha con sorted) hasta 3 (dejando solo los 3 con mayor velocidad)
        