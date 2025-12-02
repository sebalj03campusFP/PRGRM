# Variables
nombres = []
nombre = None
#Logica
while nombre != "fin":
    nombres.append(nombre)
    nombre = input("Escribe los nombres, para terminar escribe fin: ")

archivo = open("nombres.txt", "w")
for n in nombres:
    archivo.write(n + "\n")
archivo.close()

print("Nombres guardados en nombres.txt")