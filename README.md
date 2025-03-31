# Blog de Videojuegos

Este es un proyecto de un blog de videojuegos desarrollado en PHP con MySQL como base de datos. Permite a los usuarios registrarse, iniciar sesión, crear entradas, categorías y buscar contenido.

## Vista previa

![Vista previa del Blog](assets/img/Screenshot.png)

## Características

- Registro e inicio de sesión de usuarios.
- Creación y gestión de entradas de blog.
- Creación de categorías para organizar las entradas.
- Búsqueda de entradas por palabras clave.
- Diseño responsivo con HTML y CSS.
- Diseño responsive adaptado a móviles.
- Entorno Docker integrado.

## Requisitos

- Docker >= 20.10
- Docker Compose >= 1.29
- Navegador moderno (Chrome 90+, Firefox 88+)
- Conexión a internet para descargar imágenes base de Docker.

## Estructura del Proyecto

proyecto-php/
├── assets/                # Archivos estáticos (CSS, imágenes, fuentes)
│   ├── css/
│   │   └── style.css      # Estilos del proyecto
│   ├── fonts/
│   │   └── fuente.ttf     # Fuente personalizada
│   └── img/               # Imágenes del proyecto
├── includes/              # Archivos PHP reutilizables
│   ├── cabecera.php       # Cabecera del sitio
│   ├── conexion.php       # Conexión a la base de datos
│   ├── helpers.php        # Funciones auxiliares
│   ├── lateral.php        # Barra lateral
│   ├── pie.php            # Pie de página
│   └── redireccion.php    # Redirección de usuarios no autenticados
├── public/                # Archivos accesibles desde el navegador
│   ├── index.php          # Página principal
│   ├── login.php          # Inicio de sesión
│   ├── registro.php       # Registro de usuarios
│   ├── categoria.php      # Entradas por categoría
│   ├── entrada.php        # Detalle de una entrada
│   ├── crear-entradas.php # Crear nuevas entradas
│   ├── crear-categoria.php # Crear nuevas categorías
│   ├── buscar.php         # Búsqueda de entradas
│   └── ...                # Otros archivos relacionados
├── sql/
│   └── database.sql       # Script para crear la base de datos y tablas
├── Dockerfile             # Configuración del contenedor PHP
├── docker-compose.yml     # Configuración de servicios Docker
├── nginx.conf             # Configuración del servidor Nginx
├── php.ini                # Configuración de PHP
└── README.md              # Documentación del proyecto


## Instalación y Configuración

1. **Clonar el repositorio**:
git clone https://github.com/tu-usuario/blog-videojuegos.git
cd blog-videojuegos

2. **Configurar el entorno con Docker**:
   Asegúrate de que Docker y Docker Compose estén instalados en tu sistema.

   Construye y levanta los contenedores:
   docker-compose up --build
   

3. **Acceder a la aplicación**:
   - Blog: [http://localhost:8082](http://localhost:8082)
   - phpMyAdmin: [http://localhost:8081](http://localhost:8081)

4. **Configurar la base de datos**:
   - Accede a phpMyAdmin en [http://localhost:8081](http://localhost:8081).
   - Usa las credenciales:
     - Usuario: `root`
     - Contraseña: `mi_nueva_contrasea`
   - Importa el archivo `sql/database.sql` para crear las tablas y datos iniciales.

## Uso

- **Registro**: Los usuarios pueden registrarse en el blog.
- **Inicio de sesión**: Los usuarios registrados pueden iniciar sesióncon sus credenciales.
- **Crear entradas**: Los usuarios autenticados pueden crear nuevas entradas.
- **Categorías**: Los usuarios pueden explorar contenido por categorías.
- **Búsqueda**: Los usuarios pueden buscar entradas por palabras clave.

## Tecnologías Utilizadas

- **Backend**: PHP 8.2 con extensiones `pdo_mysql` y `mysqli`.
- **Frontend**: HTML5, CSS3.
- **Base de datos**: MySQL 8.0.
- **Servidor web**: Nginx.
- **Gestión de contenedores**: Docker y Docker Compose.

## Problemas Comunes

1. **El puerto 8082 está ocupado**:
   Cambia el puerto en `docker-compose.yml`:

   services:
      nginx:
          ports:
          - "8083:80"  # Cambiar puerto local
 

2. **Error de conexión a la base de datos**:
   - Verifica que el contenedor `mysql_db` esté corriendo:
   
     docker ps
    
  - Error de conexión a MySQL:

    docker-compose restart mysql_db

3. **Errores de PHP no visibles**:
   Asegúrate de que php.ini tenga habilitada la visualización de errores:
   
   display_errors = On
   display_startup_errors = On
   error_reporting = E_ALL
   

## Contribuciones

Si deseas contribuir al proyecto, por favor abre un issue o envía un pull request.

## Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo `LICENSE` para más detalles.

