# M7 UF3 Practica Spring 4-5
MIEMBROS: Aitor Burruezo, Oriol Poncelas.
La principal idea de PowerDot es crear una aplicación web online para poder crear presentaciones de diapositivas a partir de una sintaxis de código.
El patrón de PowerDot se basa en el MVC, modelo, vista y controlador. Dicha arquitectura separa los datos de la aplicación, la interfaz del cliente y la lógica de control.

Dentro del modelo existen diferentes clases serializadas en MONGODB donde se encontraran los datos de portada, presentación, imageSlide, defaultPortada. Seguidamente, el objeto presentación que almacenará los datos referentes al diseño de la presentación.
El controlador se encargará de cargar la vista al usuario y de “parsear” los datos introducidos donde serán enviados a la vista.

La vista principal donde el usuario podrá indicar la creación de las presentaciones, junto con la posiblidad de añadir o no imagen y añadir un nombre de Autor.
Vista donde se generarán las presentaciones donde podrá navegar hacia delante y hacia atras.
Vista de generar todas las presentaciones en una sola ventana.
Vista de mostrar todas las presentaciones de MONGODB.
Vista de filtrar por autor.
Vista de filtrar por fecha.

Una vez nos encontremos en la página principal nos mostrará las instrucciones de PowerDot. Remarcar que no estamos limitados a una forma de generar la presentación. Podremos generarla indicando los atributos iniciales, existiendo la posibilidad de generar presentaciones únicamente con un título, subtítulo o cover o una imagen o autor. Importante, que todos los formatos tienen que contener el carácter de final de línea “>>>”. Importante que al adjuntar la imagen tiene que concidir con el mismo nombre + extensión en la creación de la diapositiva.
EXPLICACIÓN DE ATRIBUTOS:
= Títol 1
[cover] Example
((test.png
>>>

El usuario podrá escoger su diseño de presentación, entre los diferentes posibilidades que nos ofrecen:
Cambiar el color del título y subtítulo en caso de que desee ponerlo:

Rojo
Verde
Azul

Fuentes:

Arial
Verdana

Posición del texto:

Izquierda
Centro
Derecha

Añadir nombre de autor.
Añadir imagen.

Para la creación de este nuevo "sprint" no nos ha surgido bastante problemas para poder implementarlo. En primer lugar, como la estructura de parseo y traspaso de los datos ya estaban implementados anteriormente, ese aspecto no ha sido complicado. Lo que sí, nos ha costado más, ha sido la serialización de las clases en MONGODB, puesto que no sabiamos como era su implementación y como trabajaba MONGODB con PHP.

Consideremos que de los requisitos que se han pedido en la práctica mayoritariamente los hemos podido resolver:
El formato del código está orientado al usuario y es de fácil interpretación para la creación de las diapositivas.
El servidor permite validar la correcta sintaxis y en caso de que la validación no sea satisfactoria se le informará al usuario sobre la línea incorrecta.
Generación de los objetos presentación, portada, imageSlide, default portada.
El usuario podrá navegar hacia delante y atrás. Además de controlar el movimiento en la primera y última presentación (no puede irse hacia atrás en la 1a presentación y en la última hacia delante).
Usuario podrá filtrar por fechas, mostrando las diapositivas existentes en la colección de MongoDB.
Usuario podrá filtrar por author, además de mostrar todas las diapositivas existentes.
Accesible a mostrar todas las diapositivas en una y viceversa y al inicio donde resetea toda la información.
Numeración de las diapositivas. La primera diapositiva será la primera que añada el usuario en el apartado habilitado para escribir e irá iterando de arriba abajo. Dónde la última que esté escrita será la última en mostrarse.
Diseño personalizado en las presentaciones; colores, fuentes y posiciones aplicado a todas las presentaciones.
Imagen subida al servidor con la creación del nombre de carpeta del ID correspondiente en MONGODB.
Permite subir o no imagen al servidor, siempre es opcional.
Filtar por autor, fecha y poder listar todas las presentaciones.


Ampliaciones y mejoras, podríamos a ver implementado varias funciones cómo;

A la hora de mostrar todas las presentaciones que al clicar en una cualquiera derive solamente a esa presentación.
A la hora de ir pasando las presentaciones, que se cambie haciendo un deslizamiento horizontal con el ratón de izquierda a derecha o viceversa.
Optimización del código.
Mejora visual del codigo CSS que sea de mayor agrado visual al usuario.

CONCLUSIÓN ORIOL
Durante los primeros días teníamos los conceptos y conocimientos muy dispersos, poco a poco hemos ido entendiendo un poco más las opciones que va ofreciendo PHP. Como mejora el código se tendría que haber comenzado desde una estructuración más simple y no tan rebuscada como hemos realizado. Durante los días hemos ido puliendo un poco más el código y separando en clases para su facilidad a la hora de ser legible y entendible. Respecto al segundo "Sprint" la implementación ha sido muchisimo mas sencilla, únicamente la serialización con MONGODB tal y como hemos comentado anteriormente.
Finalmente, la mayoría de cosas se han implementado y están funcionando correctamente tal y como se piden en el enunciado.

CONCLUSIÓN AITOR
Hemos ido teniendo algunos problema durante el desarrollo, pero hemos conseguido sacarlo todo, la conexion a la base de datos nos ha dado algun problema que otro, pero no ha sido muy dificil de utilizar, aunque hemos tenido problemas con un bug extraño, al final, hemos conseguido que todo funcione. Al utilizar la practica anterior teniamos miedo de que se nos complicara mucho, ya que la estructura base, no seria la mejor.
REFERENCIAS:
http://ualmtorres.github.io/howtos/MongoDBPHP/#:~:text=Conexi%C3%B3n%20a%20MongoDB,a%20la%20MongoDB%20PHP%20Library.
https://www.php.net/manual/es/set.mongodb.php
https://quejox.gitlab.io/materialsweb/curs21_22/daw_m07desenvolupamentwebservidor/apunts.html
https://campus.copernic.cat/pluginfile.php/154594/mod_resource/content/4/QuestionariDemo_s4_SOLUCIO.html
https://www.php.net/manual/es/reserved.variables.session.php
https://styde.net/instalacion-de-composer/
