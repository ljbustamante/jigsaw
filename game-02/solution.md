# Game 02

## [Circuit Breaker pattern](https://docs.microsoft.com/en-us/azure/architecture/patterns/circuit-breaker)

El patrón Circuit Braker permite actuar frente la denegación del servicio WTF identificando el momento en el cual 
este deja de responder adecuadamente, deteniendo las conexiones a dicho servicio durante un tiempo prudencial 
antes de volver a intentar volver comunicarnos con él, evitando saturarlo con peticiones que se 
acumulen a la espera de respuesta.

## [Cache-Aside pattern](https://docs.microsoft.com/en-us/azure/architecture/patterns/cache-aside)

Este patrón nos permite hacer frente durante un tiempo determinado a un eventual fallo en el servicio WTF, dándole posibilidad 
de recuperación ante el cese de peticiones que genera el Circuit Braker anterior.
Se debe considerar el tiempo durante el que se puede utilizar datos de la caché, esto depende mucho del tipo de datos que
se intercambian entre YOLO y WTF ya que si la interacción es únicamene consumo de datos se podría aplicar este patrón 
para seguir dando servicio a los usuario, en cambio si la interacción incluye manipulación de datos y la necesida de datos 
"frescos" este patrón no aportaría un beneficio.


## [Availability patterns](https://docs.microsoft.com/en-us/azure/architecture/patterns/category/availability)

De ser posible en el lado del servicio WTF se podrían implementar patrones de disponibilidad para mejorar el desempeño
y monitorizar su estado, por ejemplo el [Health Endpoint Monitoring pattern](https://docs.microsoft.com/en-us/azure/architecture/patterns/health-endpoint-monitoring) que permitiría a YOLO verificar
la disponibilidad del servicio WTF antes de intentar realizar nuevamente peticiones de datos luego de un incidente.