# Yoan E-Commerce

Un sistema simple de administración de e-commerce desarrollado en PHP con arquitectura MVC.

## Descripción del Proyecto

Este es un proyecto básico de e-commerce que permite la gestión de usuarios a través de un panel de administración. El sistema utiliza una arquitectura MVC (Modelo-Vista-Controlador) para organizar el código de manera estructurada y mantenible.

### Acceso a la Plataforma

Puedes acceder a la plataforma en línea a través de la siguiente URL:

**🌐 [https://yoan-ramos.infinityfree.me/](https://yoan-ramos.infinityfree.me/)**

> **Nota**: Esta es la versión de producción del proyecto desplegada en InfinityFree.

## Características

- **Gestión de Usuarios**: Crear, editar, eliminar y listar usuarios
- **Sistema de Autenticación**: Login y sesión de usuarios
- **Panel de Administración**: Interfaz intuitiva para la gestión
- **Base de Datos**: Almacenamiento de usuarios y cajas
- **Interfaz Responsiva**: Diseño adaptable a diferentes dispositivos

## Tecnologías Utilizadas

### Backend
- **PHP 7+**: Lenguaje principal del servidor
- **MySQL**: Sistema de gestión de base de datos
- **Arquitectura MVC**: Patrón de diseño para separación de responsabilidades

### Frontend
- **HTML5**: Estructura del contenido
- **CSS3**: Estilos y diseño visual
- **JavaScript**: Funcionalidad interactiva
- **Bootstrap 5**: Framework CSS para diseño responsivo
- **jQuery**: Biblioteca JavaScript para manipulación del DOM
- **DataTables**: Plugin para tablas interactivas
- **SweetAlert2**: Alertas personalizadas y modernas

## Estructura del Proyecto

```
yoan_e_commerce/
├── Assets/                 # Recursos estáticos
│   ├── css/               # Hojas de estilo
│   │   ├── datatables.min.css
│   │   ├── style.min.css
│   │   └── styles.css
│   ├── js/                # Archivos JavaScript
│   │   ├── jquery-3.7.1.min.js
│   │   ├── bootstrap.bundle.min.js
│   │   ├── datatables.min.js
│   │   ├── sweetalert2.all.min.js
│   │   └── funciones.js   # Lógica personalizada
│   └── demo/              # Archivos de demostración
├── Config/                # Configuración del sistema
│   ├── Config.php         # Configuración de base de datos y URLs
│   └── App/              # Clases principales
│       ├── Controller.php # Clase base controladora
│       ├── Query.php     # Clase para consultas a BD
│       └── autoload.php  # Cargador automático de clases
├── Controllers/           # Controladores de la aplicación
│   ├── Home.php          # Controlador principal
│   └── Usuarios.php      # Controlador de usuarios
├── Models/               # Modelos de datos
│   ├── HomeModel.php     # Modelo principal
│   └── UsuariosModel.php # Modelo de usuarios
├── Views/                # Vistas de la aplicación
│   ├── Templates/        # Plantillas comunes
│   │   ├── header.php    # Cabecera HTML
│   │   └── footer.php    # Pie de página HTML
│   ├── index.php         # Vista principal
│   └── Usuarios/         # Vistas de usuarios
│       └── index.php     # Listado de usuarios
├── .htaccess             # Configuración de Apache
├── index.php             # Punto de entrada principal
└── README.md             # Este archivo
```

## Configuración

### Base de Datos

El proyecto utiliza una base de datos MySQL con las siguientes tablas principales:

- **usuarios**: Almacena información de usuarios del sistema
- **cajas**: Almacena información de cajas asignadas a usuarios

### Configuración del Servidor

1. **Configuración Local (XAMPP)**:
   ```php
   // Config/Config.php
   const host= "localhost";
   const base_url= "http://localhost/yoan_e_commerce/";
   const user= "root";
   const pass= "";
   const db= "yoan_e_commerce_db";
   ```

2. **Configuración Producción (InfinityFree)**:
   ```php
   // Config/Config.php
   const host= "[HOST_DE_PRODUCCIÓN]";
   const base_url= "[URL_DE_PRODUCCIÓN]";
   const user= "[USUARIO_DE_BASE_DE_DATOS]";
   const pass= "[CONTRASEÑA_DE_BASE_DE_DATOS]";
   const db= "[NOMBRE_DE_BASE_DE_DATOS]";
   ```
   > **Nota**: Las credenciales de producción deben ser reemplazadas con los valores reales del servidor de producción por razones de seguridad.

## Instalación

### Requisitos Previos

- Servidor web (Apache)
- PHP 7.0 o superior
- MySQL 5.6 o superior
- Navegador web moderno

### Pasos de Instalación

1. **Clonar o descargar el proyecto**
   ```bash
   git clone [URL-del-repositorio]
   # o descargar el archivo ZIP
   ```

2. **Configurar el servidor web**
   - Colocar los archivos en el directorio raíz del servidor (ej: `htdocs/` para XAMPP)
   - Asegurarse de que el módulo `mod_rewrite` de Apache esté habilitado

3. **Configurar la base de datos**
   - Crear una base de datos MySQL
   - Importar la estructura de las tablas
   - Configurar las credenciales en `Config/Config.php`

4. **Configurar permisos**
   - Asegurarse de que el servidor tenga permisos de escritura en los archivos necesarios

5. **Acceder a la aplicación**
   - Abrir un navegador web
   - Navegar a la URL configurada (ej: `http://localhost/yoan_e_commerce/`)

## Uso

### Inicio de Sesión

1. Acceder a la URL principal del proyecto
2. Ingresar las credenciales de usuario
3. El sistema redirigirá al panel de administración

### Gestión de Usuarios

#### Listar Usuarios
- Los usuarios se muestran en una tabla interactiva con DataTables
- Se visualizan: ID, Usuario, Nombre, Caja, Estado y Acciones

#### Crear Usuario
1. Hacer clic en el botón "Nuevo"
2. Completar el formulario con:
   - Usuario
   - Nombre
   - Contraseña
   - Confirmar Contraseña
   - Caja (seleccionar de la lista)
3. Hacer clic en "Guardar"

#### Editar Usuario
1. Hacer clic en el botón "Editar" en la fila del usuario deseado
2. El sistema cargará automáticamente los datos del usuario en el formulario modal:
   - Usuario (nombre de usuario)
   - Nombre completo
   - Caja asignada
   - *Nota: La contraseña no se muestra por seguridad, pero puede ser actualizada si se ingresa*
3. Modificar los datos necesarios:
   - El campo de contraseña es opcional al editar (solo se actualiza si se ingresa nueva contraseña)
   - Se debe confirmar la contraseña si se desea cambiar
4. Hacer clic en "Guardar" para actualizar los datos
5. La tabla se actualizará automáticamente con los cambios

#### Eliminar Usuario
1. Hacer clic en el botón "Eliminar" en la fila del usuario
2. Confirmar la eliminación en el diálogo de SweetAlert2
3. El usuario será eliminado y la tabla se actualizará automáticamente

## Funcionalidades Principales

### Sistema de Rutas

El proyecto utiliza un sistema de rutas amigables a través de `.htaccess`:
- `Home/index` - Página principal
- `Usuarios/index` - Listado de usuarios
- `Usuarios/validar` - Validación de login
- `Usuarios/registrar` - Registro de usuarios
- `Usuarios/editar/{id}` - Edición de usuarios
- `Usuarios/eliminar/{id}` - Eliminación de usuarios

### Arquitectura MVC

- **Modelos**: Encargados de la lógica de negocio y acceso a datos
- **Vistas**: Encargadas de la presentación y interfaz de usuario
- **Controladores**: Encargados de gestionar las peticiones y coordinar modelos y vistas

### Seguridad

- Validación de campos obligatorios en formularios
- Manejo seguro de contraseñas
- Protección contra inyección SQL a través de consultas preparadas
- Gestión de sesiones para autenticación

## Problemas Comunes y Soluciones

### Error: "$ is not defined"
**Causa**: jQuery no se carga correctamente antes de su uso.
**Solución**: El sistema incluye una función que espera a que jQuery esté disponible antes de ejecutar código dependiente.

### Error: "Unexpected token '<', not valid JSON"
**Causa**: El servidor devuelve HTML en lugar de JSON.
**Solución**: El sistema incluye manejo de errores para respuestas no JSON y muestra mensajes apropiados.

### Error: "Call to undefined method"
**Causa**: Nombre de método incorrecto en el controlador.
**Solución**: Verificar que los nombres de métodos coincidan entre controladores y modelos.

## Contribución

Este es un proyecto educativo y simple. Para contribuir:

1. Hacer un fork del proyecto
2. Crear una rama para la nueva funcionalidad
3. Hacer commit de los cambios
4. Push a la rama
5. Crear un Pull Request

## Licencia

Este proyecto es para fines educativos. Puede ser utilizado y modificado libremente para aprendizaje.

## Contacto

Para preguntas o sugerencias sobre el proyecto, por favor contactar al desarrollador.

---

**Nota**: Este proyecto fue desarrollado como parte de un ejercicio práctico de programación web con PHP y arquitectura MVC.
