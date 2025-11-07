#importacion
import numpy as np

#Variables

lista = [25,70,46,120,1,2,3]
elemento = np.array(lista)

#Logica
filtro = elemento[elemento > 5]

print(filtro)