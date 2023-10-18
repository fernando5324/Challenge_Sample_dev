# Invoice Recorder Challenge Sample - Desarrollo

Esta es mi resolución del repositorio 
https://github.com/anthony-rosado/invoice-recorder-challenge-sample#invoice-recorder-challenge-sample-v10-es

Base de datos utilizada: [aqui](https://github.com/fernando5324/Challenge_Sample_dev/blob/ac2cd3c4dc6b7ecc092bfc071e1633a7f43cef8d/Base%20de%20datos.sql)

### Función 1:
Utilice el endpoint ya existente y agregue los campos serie, número, tipo de comprobante y moneda. También cree un nuevo endpoint para actualizar los registros ya guardados con los del campo xml_content.
Tenía pensado hacerlo cada vez que se guarda, pero teniendo en cuenta que no sería muy recurrente agregar nuevos campos a la tabla decidí hacerlo aparte.
Las pruebas las hice insertando un valor nulo a cualquiera de los nuevos campos agregado.

Ruta: /api/v1/vouchers
Metodo: POST
Función: Guardar comprobantes por cantidad

Ruta: /api/v1/vouchers/restore_values
Metodo: GET
Función: Restaurar la data actual con los nuevos campos requeridos

### Función 2:
Ahora se guarda en segundo plano los comprobantes y a la vez también el correo, pero el filtro final donde se muestra todo lo guardado se pierde.
Esta función me tomo mucho más tiempo de lo esperado, ya que quería adaptarme a la estructura del proyecto, pero al final no logre hacerlo del todo bien.

### Función 3:
Hice la suma total de los comprobantes con el tipo de monera de PEN y USD por separado para mostrarlo.

Ruta: api/v1/vouchers/total_mont
Metodo: GET

### Función 4:
Note que agregar la configuración que por cada consulta revise si hay el campo deleted_at es null para no mostrarlo. Lo que hice fue que al eliminar solo se agrega la fecha actual a ese campo y por defecto no se mostraría en ninguna consulta.

Ruta: /api/v1/vouchers
Metodo: DELETE
Parametros: id

### Función 5:
Se creó un nuevo endpoint con los filtros serie, número y por un rango de fechas. Hice que el rango de fechas sea opcional en caso solo se quiera revisar por serie y número que si son requeridos para su uso.

Ruta: /api/v1/vouchers/search
Metodo: GET
Parametros: serie , number , initial_date , end_date

### Comentarios finales:
Me tomo más tiempo entender el proyecto y el uso de la autentificación por JWT, ya que era necesario iniciar sesión primero para poder hacer las consultas. Gracias por la oportunidad.



