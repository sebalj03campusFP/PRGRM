#importacion
import numpy as np
#Variable
array = np.random.randint(1, 51, size=(4,3))
print(f"Debug:\n {array}") #Debug
#Logica
resultado = np.max(array, axis=0)
print(f"Max:\n{resultado}")