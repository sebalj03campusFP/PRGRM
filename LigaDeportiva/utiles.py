# Importamos la librería para las tablas
from tabulate import tabulate

def generar_id(lista):
    if len(lista) == 0:
        return 1
    else:
        ultimo_item = lista[-1] 
        ultimo_id = ultimo_item["id"]
        return ultimo_id + 1


