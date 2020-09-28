<? php

use  Symfony \ Component \ HttpFoundation \ Request ;

require ( '../vendor/autoload.php' );

$ aplicación = nueva  Silex \ Aplicación ();
$ aplicación [ 'depuración' ] = verdadero ;

// Registrar el servicio de registro de monólogos
$ aplicación -> registro ( nuevo  Silex \ Provider \ MonologServiceProvider (), array (
  'monolog.logfile' => 'php: // stderr' ,
));

// Registrar la representación de la vista
$ aplicación -> registrar ( nuevo  Silex \ Provider \ TwigServiceProvider (), array (
    'twig.path' => __DIR__. '/ vistas' ,
));

// Nuestros manipuladores web

$ aplicación -> get ( '/' , function () use ( $ app ) {
  $ app [ 'monolog' ] -> addDebug ( 'salida de registro.' );
  return  $ aplicación [ 'ramita' ] -> render ( 'index.twig' );
});


// Ruta de demostración, para validar que se recibe (n) dato (s) y se responde con este mismo
$ app -> post ( '/ enviarDato' , function ( Request  $ request ) use ( $ app ) {
   devolver  $ solicitud ;
});


// Ruta de demostración, se recibe (n) dato (s) y se manipulan
$ app -> post ( '/ modificarDato' , function ( Request  $ request ) use ( $ app ) {
   	$ nombre = $ solicitud -> get ( 'nombre' );
	$ respuesta = "Hola" . $ nombre ;
   	return  $ respuesta ;
});

// Ruta de demostración, se recibe (n) dato (s) y se manipulan
$ app -> post ( '/ postArduino' , function ( Request  $ request ) use ( $ app ) {
   	devuelve  "OK" ;
});

$ aplicación -> ejecutar ();