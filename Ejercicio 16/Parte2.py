#Variables
dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"]
temperaturas = []

print("Escribe la temperatura media de cada dia: ")
#Logica
i = 0
while i < len(dias):
    temp = input("La temperatura del dia " + dias[i] + "es de: ")
    temperaturas.append(temp)
    i = i + 1
archivo = open("temperaturas.txt", "w")

x = 0
while x < len(dias):
    archivo.write(dias[x] + ": " + temperaturas[x] + "\n")
    x = x + 1
archivo.close()

print("Hemos guardado todas las temperaturas en el archivo temepraturas.txt : )")