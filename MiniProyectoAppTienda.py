#Importacion de librerias



#Definicion Variables
inicio = "Menu principal \n1. Menu Articulos \n2. Menu Usuarios \n 3. Carrito de la compra (Debes ser un usuario registrado)"
menu = "Menú Articulos \n1. Crear artículo \n2. Listar artículos \n3. Buscar artículo por id \n4. Actualizar artículo \n5. Eliminar artículo \n6. Alternar activo/inactivo \n7. Salir"
menu2 = "Menú Usuario \n1. Crear Usuario \n2. Listar Usuario \n3. Buscar Usuario por ID \n4. Actualizar usuario \n5. Eliminar Usuario \n6. Alternar estado Usuario \n7. Salir "
menu3 = "Menú Ventas / Carrito \n1. Seleccionar usuario activo \n2. Añadir artículo al carrito \n3. Quitar artículo del carrito \n4. Ver carrito (detalle y total) \n5. Confirmar compra \n6. Historial de ventas por usuario \n7. Vaciar carrito \n8. Salir"
ventas = []
listaUser=[]
listaProd = []
seleccion =""
entrada = ""
estadoApp = {
    "usuario_activo": None, 
    "carrito_actual": []
    }
# Menu (Funcion)

def articulosMenu(seleccion):
    entrada = ""
    while entrada != 7:
        print(menu)
        entrada = int(input("Opción: "))
        match entrada:
            case 1:
                crearArticulos(listaProd)
                print(listaProd) #Debug
            case 2:
                listarArticulos(listaProd)
            case 3:
                buscarXid(listaProd)
            case 4:
                actualizar(listaProd)
                print(listaProd) #Debug
            case 5:
                eliminarArticulo(listaProd)
                print(listaProd) #Debug
            case 6:
                alternar(listaProd)
                print(listaProd) #Debug
            case 7:
                print(f"Has seleccionado: Salir \n Hasta pronto!")
            case _:
                print(f"Opcion Incorrecta")

def usuarioMenu(seleccion):
    entrada = ""
    while entrada != 7:
        print(menu2)
        entrada = int(input("Opción: "))
        match entrada:
            case 1:
                crearUser(listaUser)
                print(listaUser) #Debug
            case 2:
                listarUser(listaUser)
            case 3:
                buscarUser(listaUser)
            case 4:
                actualizarUser(listaUser)
                print(listaUser) #Debug
            case 5:
                eliminarUser(listaUser)
                print(listaUser) #Debug
            case 6:
                alternarUser(listaUser)
                print(listaUser) #Debug
            case 7:
                print(f"Has seleccionado: Salir \n Hasta pronto!")
            case _:
                print(f"Opcion Incorrecta")

def ventasMenu(listaProd, listaUser, ventas, estadoApp):
    entrada = 0 
    while entrada != 8:
        print(menu3)     
        if estadoApp["usuario_activo"] != None:      # Mostramos el estado actual
            # Buscamos al usuario para mostrar su nombre
            usuario_encontrado = None
            for u in listaUser:
                if u["id"] == estadoApp["usuario_activo"]:
                    usuario_encontrado = u

            if usuario_encontrado:
                print(f"Usuario Activo: {usuario_encontrado["nombre"]} (ID: {usuario_encontrado["id"]})")
            else:
                 estadoApp["usuario_activo"] = None 
                 print("Usuario Activo: Ninguno (El usuario anterior fue borrado)")
        else:
            print("Usuario Activo: Ninguno")
        
        print(f"Items en Carrito: {len(estadoApp["carrito_actual"])}")

        entrada = int(input("Opción (1-8): "))

        # Comprobamos si hay usuario activo (Requisito: no permitir carrito sin usuario)
        if estadoApp["usuario_activo"] == None and (entrada >= 2 and entrada <= 5):
            print("\n¡Error! Debe seleccionar un usuario activo (Opción 1) primero.")
        else:
            match entrada:
                case 1:
                    seleccionar_usuario_activo(listaUser, estadoApp)
                case 2:
                    addArticuloCarrito(listaProd, estadoApp)
                case 3:
                    quitar_articulo_carrito(listaProd, estadoApp)
                case 4:
                    ver_carrito(listaProd, estadoApp)
                case 5:
                    confirmar_compra(listaProd, ventas, estadoApp)
                case 6:
                    historial_ventas_usuario(ventas, listaProd, listaUser)
                case 7:
                    print("\n--- 7. Vaciar Carrito ---")
                    estadoApp["carrito_actual"] = [] # Resetea la lista
                    print("Carrito vaciado.")
                case 8:
                    print(f"Volviendo al menú principal...")
                case _:
                    print(f"Opcion Incorrecta")
#Definicion Funciones (Articulos)
# # # # # # # # # # # # # # # 
#   ARTICULOS   ARTICULOS   #
#   ARTICULOS   ARTICULOS   #
#   ARTICULOS   ARTICULOS   #
# # # # # # # # # # # # # # # 
def crearArticulos(listaProd):
    id_nuevo = len(listaProd) + 1
    nombreNuevo = input("Define el nombre: ")
    precioNuevo = float(input("Precio: "))

    while precioNuevo <=0:
        print("El precio no puede ser 0 o menos")
        precioNuevo = float(input("Precio: "))
    
    stockNuevo = int(input("Stock: "))
    while stockNuevo <=0:
        print("El stock no puede ser menos de 0")
        stockNuevo = int(input("Stock: "))
    
    activoEntrada = input("Esta activo? (s/n): ")
    activoNuevo = (activoEntrada == "s")
    nuevoProducto = {  #Crea un diccionaro "base" para agregarlo dentro de la lista vacia
            "id": id_nuevo,
            "nombre": nombreNuevo,
            "precio": precioNuevo,
            "stock": stockNuevo,
            "activo": activoNuevo
    }
    return listaProd.append(nuevoProducto)

def listarArticulos(listaProd):
    entrada = str(input("Buscar (activo/inactivo) (a/i): "))
    match entrada:
        case "a":
            for producto in listaProd:
                if producto["activo"] == True:
                    print(f"Productos activos \n {producto}")
        case "i":
            for productoN in listaProd:
                if productoN["activo"] == False:
                    print(f"Productos inactivos \n {productoN}")


def buscarXid(listaProd):
    entrada = int(input("Buscar por ID: "))
    for producto in listaProd: #Recorre la lista
        if producto["id"] != entrada: #Solo diferencia con id
            print("El ID no existe o es incorrecto")
    for producto in listaProd:
        if producto["id"] == entrada:
            print(producto)

def actualizar(listaProd):
    print(listaProd)
    entrada = int(input("Buscar por ID: "))
    for producto in listaProd:
        if producto["id"] == entrada:
            print(f"Has seleccionado {producto}")
            cambioN = str(input("Escribe el nuevo nombre: "))
            producto["nombre"] = cambioN
            cambioP = float(input("Escribe el nuevo precio: "))
            producto["precio"] = cambioP 
            cambioS = int(input("Introduce el nuevo Stock: "))
            producto["stock"] = cambioS

def eliminarArticulo(listaProd):
    entrada = int(input("Borrar por ID: "))
    for producto in listaProd:
        if producto["id"] == entrada:
            print(f"Has borrado{producto}")
            producto["activo"] = False

def alternar(listaProd):
    entrada = int(input("Alternar activo o inactivo por ID: "))
    for producto in listaProd:
        if producto["id"] == entrada:
            print(f"Has Seleccionado{producto}")
            pregunta = str(input("Cambiar a Activo o inactivo (a/i): "))
            match pregunta:
                case "a":
                    producto["activo"] = True
                case "i":
                    producto["activo"]= False

#Definicion Funciones Usuario Login
#   LOGIN   LOGIN   #
#   LOGIN   LOGIN   #
#   LOGIN   LOGIN   #
def crearUser(listaUser):
    emailValido = False
    id_nuevo = len(listaUser) + 1
    nombreNuevo = input("Define el nombre: ")
    emailNuevo = str(input("Ingresa Email: "))
    while not emailValido==True:
        if "@" in emailNuevo and "." in emailNuevo:
            print("El email verificado")
            emailValido = True
        else:
            print("Email no válido (debe contener @ y .): ")
            emailNuevo = (input("Ingresa Email: "))


    activoEntrada = input("Esta activo? (s/n): ")
    activoNuevo = (activoEntrada == "s")
    nuevoUser = {  #Crea un diccionario para agregarlo dentro de la lista vacia
            "id": id_nuevo,
            "nombre": nombreNuevo,
            "email": emailNuevo,
            "activo": activoNuevo
    }
    return listaUser.append(nuevoUser)

def listarUser(listaUser):
    entrada = str(input("Buscar usuario (activo/inactivo) (a/i): "))
    match entrada:
        case "a":
            for i in listaUser:
                if i["activo"] == True:
                    print(f"Usuarios activos \n {i}")
        case "i":
            for n in listaUser:
                if n["activo"] == False:
                    print(f"Usuarios inactivos \n {n}")

def buscarUser(listaUser):
    entrada = int(input("Buscar por ID: "))
    for i in listaUser: #Recorre la lista
        if i["id"] != entrada: #Solo diferencia con id
            print("El ID no existe o es incorrecto")
    for i in listaUser:
        if i["id"] == entrada:
            print(i)

def actualizarUser(listaUser):
    entrada = int(input("Alternar activo o inactivo por ID: "))
    for i in listaUser:
        if i["id"] == entrada:
            print(f"Has Seleccionado{i}")
            pregunta = str(input("Cambiar a Activo o inactivo (a/i): "))
            match pregunta:
                case "a":
                    i["activo"] = True
                case "i":
                    i["activo"]= False

def eliminarUser(listaUser):
    entrada = int(input("Borrar user por ID: "))
    for i in listaUser:
        if i["id"] == entrada:
            print(f"Has borrado a {i}")
            i["activo"] = False

def alternarUser(listaUser):
    entrada = int(input("Alternar activo o inactivo por ID: "))
    for i in listaUser:
        if i["id"] == entrada:
            print(f"Has Seleccionado{i}")
            pregunta = str(input("Cambiar a Activo o inactivo (a/i): "))
            match pregunta:
                case "a":
                    i["activo"] = True
                case "i":
                    i["activo"]= False

#Definicion Funciones Carrito
#   CARRITO   #
#   CARRITO   #
#   CARRITO   #
# # # # # # # # 
def buscadorArticulos(listaProd, id_buscado): #Funcion para buscar los articulos y etiquetarlos con la variable encontrado
    encontrado = None
    for producto in listaProd:
        if producto["id"] == id_buscado:
            encontrado = producto
    return encontrado 

def seleccionar_usuario_activo(listaUser, estadoApp):
    print("------Seleccionar Usuario Activo------")

    id_usr = int(input("Ingrese el ID del usuario: "))
    usuario_encontrado = None
    for usuario in listaUser: #Comprobacion
        if usuario["id"] == id_usr:
            usuario_encontrado = usuario

    if usuario_encontrado:
        if usuario_encontrado["activo"] == True:
            estadoApp["usuario_activo"] = usuario_encontrado["id"] 
            print(f"Usuario '{usuario_encontrado["nombre"]}' seleccionado.")

        else:
            print("Error: Ese usuario existe pero su cuenta está inactiva.")
    else:
        print("Error: Usuario no encontrado.")


def addArticuloCarrito(listaProd, estadoApp):
    print("-----Añadir Articulo al Carrito----- ")
    id_art = int(input("Ingrese el ID del articulo: "))

    articuloEncontrado = None  # Busqueda del articulo
    for articulo in listaProd:
        if articulo["id"] == id_art:
            articuloEncontrado = articulo

    if not articuloEncontrado:
        print("Error: Articulo no encontrado.")
        return # Salimos de la función
    
    if not articuloEncontrado["activo"]:
        print("Error: Este artículo no está activo y no se puede comprar.")
        return None

    print(f"Articulo: {articuloEncontrado["nombre"]} | Precio: {articuloEncontrado["precio"]} | Stock: {articuloEncontrado["stock"]}")
    cantidad = int(input("Ingrese la cantidad: "))

    if cantidad < 1:
        print("Error: La cantidad debe ser al menos 1.")
        return None

    encontrado_en_carrito = False
    nuevo_carrito = [] 
    cantidad_total_requerida = cantidad

    for item_id, itemCantidad in estadoApp["carrito_actual"]:
        if item_id == id_art:
            cantidad_total_requerida = itemCantidad + cantidad

    # Comprobar el stock
    if cantidad_total_requerida > articuloEncontrado["stock"]:
        print(f"Error: No hay stock suficiente. Stock disponible: {articuloEncontrado["stock"]}")
        return None


    for item_id, itemCantidad in estadoApp["carrito_actual"]:
        if item_id == id_art:
            nuevo_carrito.append((item_id, cantidad_total_requerida))
            print(f"Cantidad actualizada. Total en carrito: {cantidad_total_requerida}")
            encontrado_en_carrito = True
        else:
            nuevo_carrito.append((item_id, itemCantidad))
    
    if not encontrado_en_carrito:
        nuevo_carrito.append((id_art, cantidad))
        print(f"Artículo '{articuloEncontrado["nombre"]}' añadido al carrito.")
    
    estadoApp["carrito_actual"] = nuevo_carrito


def quitar_articulo_carrito(listaProd, estadoApp):
    print("\n-----Quitar Artículo del Carrito ------")

    if len(estadoApp["carrito_actual"]) == 0: #Comprobacion del carrito
        print("El carrito esta vacio.")
        return 

    id_art_quitar = int(input("Ingrese el ID del artículo a quitar: "))
    nuevo_carrito = []
    encontrado = False

    for item_id, itemCantidad in estadoApp["carrito_actual"]:
        
        if item_id == id_art_quitar: #Comprobacion de ID
            encontrado = True
        else:
            nuevo_carrito.append((item_id, itemCantidad))

    if encontrado == True:
        print("Artículo quitado del carrito.")
    else:
        print("Error: Ese artículo no está en el carrito.")

    estadoApp["carrito_actual"] = nuevo_carrito


def ver_carrito(listaProd, estadoApp):
    print("\n--- 4. Ver Carrito ---")
    carrito = estadoApp["carrito_actual"]

    if len(carrito) == 0:
        print("El carrito está vacío.")
        return

    usuario_encontrado = None   # Buscar el usuario
    for u in listaUser:
        if u["id"] == estadoApp["usuario_activo"]:
            usuario_encontrado = u

    print("--- Detalle del Carrito (Usuario: " + usuario_encontrado["nombre"] + ") ---")
    total_carrito = 0.0
 
    for item_id, itemCantidad in carrito:
        articulo_encontrado = None
        for articulo in listaProd: #Buscamos cada artículo
            if articulo["id"] == item_id:
                articulo_encontrado = articulo

        nombre_del_item = ""
        precio_del_item = 0.0

        if articulo_encontrado:
            nombre_del_item = articulo_encontrado["nombre"]
            precio_del_item = articulo_encontrado["precio"]
        else:
            nombre_del_item = "ID " + str(item_id) + " (Articulo borrado)"
            precio_del_item = 0.0 

        subtotal = precio_del_item * itemCantidad
        print("  - " + nombre_del_item + " | Cantidad: " + str(itemCantidad) + " x €" + str(precio_del_item) + " = €" + str(subtotal))
        total_carrito = total_carrito + subtotal
    

    print(f"TOTAL: €" + str(total_carrito))

def confirmar_compra(listaProd, ventas, estadoApp):
    print("\n----- Confirmar Compra -----")

    carrito = estadoApp["carrito_actual"]
    
    if len(carrito) == 0:
        print("Error: El carrito esta vacio.")
        return None

    print("Verificando stock final")

    items_para_venta = [] 
    total_compra = 0.0
    stock_suficiente = True 

    for item_id, itemCantidad in carrito: #Verificacion de stock
        articulo_encontrado = None
        for articulo in listaProd:
            if articulo["id"] == item_id:
                articulo_encontrado = articulo

        if not articulo_encontrado or not articulo_encontrado["activo"]:
            print("Error: El artículo con ID " + str(item_id) + " ya no existe o no está activo.")
            stock_suficiente = False
        elif itemCantidad > articulo_encontrado["stock"]:
            print("Error: No hay stock suficiente para '" + articulo_encontrado["nombre"] + "'.")
            stock_suficiente = False

    if not stock_suficiente:
        print("No se puede procesar la compra. Ajuste su carrito.")
        return 

    print("Stock verificado. Procesando compra")

    id_nueva_venta = len(ventas) + 1

    for item_id, itemCantidad in carrito:
        articulo_encontrado = None
        for articulo in listaProd:
            if articulo["id"] == item_id:
                articulo_encontrado = articulo
        
        articulo_encontrado["stock"] = articulo_encontrado["stock"] - itemCantidad
        
        precio_snapshot = articulo_encontrado["precio"]
        items_para_venta.append((item_id, itemCantidad, precio_snapshot))
        total_compra = total_compra + (itemCantidad * precio_snapshot)

    nueva_venta = {
        "id_venta": id_nueva_venta,

        "usuario_id": estadoApp["usuario_activo"],
        "items": items_para_venta,
        "total": total_compra
    }

    ventas.append(nueva_venta)

    estadoApp["carrito_actual"] = []

    print("\n¡Compra confirmada con éxito!")
    print("Venta ID: " + str(id_nueva_venta) + " | Total: €" + str(total_compra))


def historial_ventas_usuario(ventas, listaProd, listaUser):
    print("\n--- 6. Historial de Ventas por Usuario ---")
    if len(ventas) == 0:
        print("No hay ventas registradas en el sistema.")
        return

    id_usr = int(input("Ingrese el ID del usuario para ver su historial: "))

    # Buscamos al usuario
    usuario_encontrado = None
    for usuario in listaUser:
        if usuario["id"] == id_usr:
            usuario_encontrado = usuario

    if not usuario_encontrado:
        print("Error: Usuario no encontrado.")
        return

    print("\n--- Historial de Ventas para " + usuario_encontrado["nombre"] + " ---")

    ventas_encontradas = 0
    total_gastado = 0.0

    for venta in ventas:
        if venta["usuario_id"] == id_usr:
            ventas_encontradas = ventas_encontradas + 1
            print("\n  Venta ID: " + str(venta["id_venta"]) + " | Total: €" + str(venta["total"]))
            print("    Items:")
            for item_id, itemCantidad, item_precio in venta["items"]:
                
                # Buscamos el nombre del artículo
                articulo_encontrado = None
                for articulo in listaProd:
                    if articulo["id"] == item_id:
                        articulo_encontrado = articulo

                nombre_articulo = ""
                if articulo_encontrado:
                    nombre_articulo = articulo_encontrado["nombre"]
                else:
                    nombre_articulo = "ID " + str(item_id) + " (Borrado)"

                print("      - " + str(itemCantidad) + " x " + nombre_articulo + " @ €" + str(item_precio) + " c/u")
            
            total_gastado = total_gastado + venta["total"]
    
    if ventas_encontradas == 0:
        print("Este usuario no tiene ventas registradas.")
    else:
        print("Total gastado: €" + str(total_gastado))
#Definicion Logica

#Menu Principal (Escoger entre Menu Articulos y Usuarios)
while entrada != 4:
    print(inicio)
    entrada = int(input("Selecciona un Menú: "))
    match entrada:
        case 1:
            articulosMenu(seleccion)
        case 2:
            usuarioMenu(seleccion)
        case 3:
            ventasMenu(listaProd, listaUser, ventas, estadoApp)
        case 4:
            print("¡Hasta luego!")
        case _:
            print("Opción no válida. Intente de nuevo.")