#Importacion Librerias
import random
#Variables


monstruos = { 'vampiro': 3, 'momia': 2, 'bruja': 4, 'esqueleto': 1, 'fantasma': 5 } 

#Funciones

def seleccionMonstruo(monstruos):
    enemigo = random.choice(list(monstruos))
    return enemigo


def monstruoDificultad(enemigo):
    dificultad = monstruos[enemigo]
    return dificultad
















