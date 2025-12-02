#Importacion Librerias
import pickle

#Variables
alumnos = {}
nombre = input("Escribe el nombre del alumno, fin para terminar: ")
while nombre != "fin":
    nota = input("Escribe la nota del alumno: ")
    alumnos[nombre] = float(nota)
    nombre = input("Escribe el nombre del alumno: ")

# Guardar el diccionario 
archivo = open("alumnos.pkl", "wb")
pickle.dump(alumnos, archivo)
archivo.close()

print("Ha sido guardado el archivo en alumnos.pkl")

#Datos, cargar

archivo2 = open("alumnos.pkl", "rb")
datos = pickle.load(archivo2)
archivo2.close()
print("La lista de alumnos es:")
print(datos)
suma = 0
cantidad = 0
for nota in datos.values():
    suma = suma + nota
    cantidad = cantidad + 1
if cantidad > 0:
    media = suma / cantidad
    print("La media de las notas son:", media)
else:
    print("No has introducido ningun alumno. ")