# Importacion Librerias

import random

from menus import menuEquipamiento
#Variables

objetos = ['estaca', 'poción mágica', 'hechizo', 'sable']

eleccion = ""

#Funciones ARMA

def efectividadEstaca(enemigo):
    efectividad = 0
    if enemigo == "vampiro":
        efectividad = 4
    elif enemigo == "momia":
        efectividad = 1.5
    elif enemigo == "bruja":
        efectividad = 1.2
    elif enemigo == "esqueleto":
        efectividad = 1
    elif enemigo == "fantasma":
        efectividad = 0.1
    return efectividad
def efectividadPocion(enemigo):
    efectividad = 0
    if enemigo == "vampiro":
        efectividad = 1
    elif enemigo == "momia":
        efectividad = 3
    elif enemigo == "bruja":
        efectividad = 0.5
    elif enemigo == "esqueleto":
        efectividad = 1.5
    elif enemigo == "fantasma":
        efectividad = 0.5
    return efectividad
def efectividadHechizo(enemigo):
    efectividad = 0
    if enemigo == "vampiro":
        efectividad = 1
    elif enemigo == "momia":
        efectividad = 1
    elif enemigo == "bruja":
        efectividad = 2.5
    elif enemigo == "esqueleto":
        efectividad = 1
    elif enemigo == "fantasma":
        efectividad = 4
    return efectividad

def efectividadSable(enemigo):
    efectividad = 0
    if enemigo == "vampiro":
        efectividad = 1
    elif enemigo == "momia":
        efectividad = 3
    elif enemigo == "bruja":
        efectividad = 2
    elif enemigo == "esqueleto":
        efectividad = 4
    elif enemigo == "fantasma":
        efectividad = 0.1
    return efectividad

def calcular_victoria(multiplicador_arma, dificultad_monstruo):
    probabilidadBase = 0.5 
    probabilidad_final = probabilidadBase * (multiplicador_arma / dificultad_monstruo) #Uso esta formula para obtener el  entre el tipo de arma y dificultad del monstruo
    probabilidad_final = max(0.05, min(probabilidad_final, 0.95)) #Un limite de porcentaje para no romper el codigo
    probabilidadPorcentaje = probabilidad_final * 100 # Convierto el decimal en porcentaje por estetica

    ataque = random.random() 

    print(f"Tu probabilidad de éxito es: {probabilidadPorcentaje}%")
    print(f"Tu tirada (necesitas menos que la probabilidad): {ataque * 100:.2f}%")

    if ataque < probabilidad_final:
        return True
    else:
        return False
