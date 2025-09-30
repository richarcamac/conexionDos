<?php 

$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

$idx = 1;
// $response = Helper::retornaRespuesta( 500, true, 'TEST1', array_filter($arrayRutas)[2]);

if(count(array_filter($arrayRutas)) == 0) {
    
    /*=============================================
    Cuando no se hace ninguna petición a la API
    =============================================*/
    $response = Helper::retornaRespuesta( 500, true, 'Ruta no válida');

}else{

    /*=============================================
    Cuando pasamos solo un índice en el array $arrayRutas
    =============================================*/

    if(count(array_filter($arrayRutas)) == $idx) {	

        /*=============================================
        Cuando se hace peticiones desde registro
        =============================================*/

        if(array_filter($arrayRutas)[$idx] == "registro") {


            
            if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
                
                /*=============================================
                Capturar datos
                =============================================*/

                $datos = array( 
                    "nombre"   => $_POST["nombre"]   ?? null,
                    "correo"   => $_POST["correo"]   ?? null,
                    "password" => $_POST["password"] ?? null,
                    "rol"      => $_POST["rol"]      ?? null,
                    "status"   => $_POST["status"]   ?? null,
                );


                $registro = new ControladorUsuarios();
                $registro -> create($datos);

            }else{
                $response = Helper::retornaRespuesta( 500, true, 'Ruta no válida');
            }

        } else if(array_filter($arrayRutas)[$idx] == "login") {

            /*=============================================
            Login
            =============================================*/
            
            if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

                $datos = array( "correo"=>$_POST["correo"],
                                "password"=>$_POST["password"]
                            );

                $login = new ControladorUsuarios();
                $login -> login($datos);

            }else{
                $response = Helper::retornaRespuesta( 500, true, 'Ruta no válida');
            }

        } else if(array_filter($arrayRutas)[$idx] === "productos") {


            if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {


            } else if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {


            }else{
                $response = Helper::retornaRespuesta( 500, true, 'Ruta no válida');
            }

        }else{
            $response = Helper::retornaRespuesta( 500, true, 'Ruta no válida');
        }

    }else{

        /*=============================================
        Cuando se hace peticiones de un solo producto
        =============================================*/

        if(array_filter($arrayRutas)[$idx] == "productos" && is_numeric(array_filter($arrayRutas)[$idx + 1 ])) {



        } else if ( array_filter($arrayRutas)[$idx] == "productos" ) {


            // $response = Helper::retornaRespuesta( 500, true, 'Categoria', array_filter($arrayRutas)[$idx + 1 ]);
        } else {
            $response = Helper::retornaRespuesta( 500, true, 'Ruta no válida');
        }

    }

}

return $response;


  
  
