 Descripción del Proyecto

El backend del proyecto fue desarrollado utilizando Laravel, un framework PHP para el desarrollo de aplicaciones web. Este backend expone una API RESTful que permite la gestión de datos relacionados con países, ciudades, presupuestos de viajes, y proporciona información adicional como clima y conversión de moneda.
2. Estructura del Proyecto

    app/Http/Controllers: Contiene los controladores que manejan las peticiones HTTP, organizando la lógica de negocio.
    app/Models: Contiene los modelos que representan las tablas de la base de datos.
    database/migrations: Contiene las migraciones para crear y modificar las tablas de la base de datos.
    database/seeders: Contiene los seeders para pre-cargar la base de datos con datos iniciales.
    routes/api.php: Define las rutas que exponen los endpoints de la API.

3. Endpoints de la API

    Países:
        GET /api/paises: Obtiene la lista de todos los países.
        POST /api/paises: Crea un nuevo país.
        GET /api/paises/{id}: Obtiene la información de un país específico.
        PUT /api/paises/{id}: Actualiza la información de un país.
        DELETE /api/paises/{id}: Elimina un país.
    Ciudades:
        GET /api/ciudades: Obtiene la lista de todas las ciudades.
        POST /api/ciudades: Crea una nueva ciudad.
        GET /api/ciudades/{id}: Obtiene la información de una ciudad específica.
        PUT /api/ciudades/{id}: Actualiza la información de una ciudad.
        DELETE /api/ciudades/{id}: Elimina una ciudad.
    Presupuestos:
        POST /api/presupuestos: Crea un registro de presupuesto.
        GET /api/presupuestos: Obtiene el historial de presupuestos.

4. Migraciones

Se definieron las migraciones para crear las siguientes tablas en la base de datos:

    paises: Contiene los registros de los países.
    ciudades: Contiene los registros de las ciudades.
    presupuestos: Contiene los registros de los presupuestos.

5. Seeders

Se utilizaron seeders para pre-cargar la base de datos con un conjunto inicial de países y ciudades.
6. Servicios

    Servicio de Clima: Se implementó un servicio que consulta la API de OpenWeather para obtener la información climática de las ciudades.
    Servicio de Moneda: Se implementó un servicio que consulta una API de conversión de monedas para obtener la tasa de cambio entre diferentes monedas.

7. Validaciones

Las validaciones se realizaron a nivel de los controladores para asegurar que los datos recibidos sean correctos antes de realizar cualquier operación en la base de datos.
8. Pruebas

Se implementaron pruebas unitarias y de integración utilizando PHPUnit para asegurar la correcta funcionalidad del backend.# back-plan-viaje
