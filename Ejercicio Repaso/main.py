#Importacion Librerias
import menus
import utils

#Variables
entrada = None

#Logica

while entrada != 4:
    print(menus.inicio)
    entrada = int(input("Opcion: "))
    match entrada:
        case 1:
            opcion = None
            while opcion != "c":
                print(menus.menu1)
                opcion = str(input("Opcion: "))  #Submenu
                if opcion == "a":
                    utils.registrarPaloma(utils.listaPalomas)
                    print(utils.listaPalomas)
                elif opcion == "b":
                    utils.registrarTiempo(utils.listaTiempo)
                    print(utils.listaTiempo)

        case 2:
            opcion = None
            while opcion != "n":
                print(f"Palomas registradas: \n {utils.listaPalomas}")
                utils.consulta(utils.listaTiempo)
                opcion = str(input("Seguir buscando? s/n: "))
        
        case 3:
            top3 = utils.ranking(utils.listaTiempo)
            print("===== Top 3 ======")
            for i, registro in enumerate(top3, 1):
                anilla = registro['Anilla']
                velocidad = registro['Velocidad calculada (Km/h)']
                print(f"Puesto {i}: Anilla {anilla} con {velocidad} Km/h")


        case 4:
            print("Hasta luego")
        

        case _ :
            print("Opcion incorrecta")