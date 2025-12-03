#Importacion
import pickle
from pathlib import Path
#Variables


#Funciones

def nuevoCliente(dni, nombre, apellidos, telefono):
    entrada = ""
    if entrada == None:
        print("No puedes dejar el campo vacio")
    else:
        dniNuevo = str(input("Escribe el DNI: "))
        nombreNuevo = str(input("Escribe el nombre: "))
        apellidosNuevo = str(input("Escribe los apellidos"))
        telefonoNuevo = str(input("Escribe el numero de telefono: "))
    dni.append(dniNuevo), nombre.append(nombreNuevo), apellidos.append(apellidosNuevo), telefono.append(telefonoNuevo)


def buscarDNI(dniBuscado, dni, nombre, apellidos, telefono):
    
    if dniBuscado in dni:
        pos = dni.index(dniBuscado)

        nombreEncontrado = nombre[pos]
        apellidoEncontrado = apellidos[pos]
        telefonoEncontrado = telefono[pos]

        print(f"Usuario encontrado: {dniBuscado}")
        print(f"Nombre: {nombreEncontrado} {apellidoEncontrado} \n Tel: {telefonoEncontrado}")
    else:
        print("DNI no encontrado... ")

def modTel(dniBuscado, dni,telefono):
    if dniBuscado in dni:
        pos = dni.index(dniBuscado)

        nuevoTel = str(input("Escribe el nuevo telefono: "))
        telefono[pos] = nuevoTel

        print(f"Telefono Modificado")
    else:
        print("DNI no encontrado... ")


def borrarCliente(dniBuscado, dni, nombre, apellidos, telefono):
    if dniBuscado in dni:
        pos = dni.index(dniBuscado)
    #Aqui se elimina con pop que automaticamente ya mueve los indices
        dni.pop(pos)
        nombre.pop(pos)
        apellidos.pop(pos)
        telefono.pop(pos)
    else:
        print("Este DNI no existe")

def cargar(archivoPath):
    if archivoPath.exists():
        try:
            with open(archivoPath,"rb") as f:
                datosRecuperados = pickle.load(f)
            
            print(f" Se han cargado {len(datosRecuperados[0])} clientes del archivo.")
            # Devolver la lista en orden
            return datosRecuperados[0], datosRecuperados[1], datosRecuperados[2], datosRecuperados[3]

        except Exception as e:
            print(f"Error al cargar el archivo: {e}")
            return [], [], [], [] #Los dejamos vacios por si falla
    else:
        print("El archivo no existe. No se agregará nada")
        return [], [], [], []
    
def guardado(archivoPath, dni, nombre, apellidos, telefono):
    paqueteFinal = [dni, nombre, apellidos, telefono]
    try:
        with open(archivoPath,"wb") as f:
            pickle.dump(paqueteFinal, f)
        
        print(f"¡Guardado exitoso! (Sobrescrito). Total clientes: {len(dni)}")
        return True
    except Exception as e:
        print(f"Error al guardar: {e}")
        return False