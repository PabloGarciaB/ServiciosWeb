<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require_once('Funciones.php');
require_once('Respuestas.php');

$usuarios = array(
    'pruebas1' => 'de88e3e4ab202d87754078cbb2df6063',
    'pruebas2' => '6796ebbb111298d042de1a20a7b9b6eb',
    'pruebas3' => 'f7e999012e3700d47e6cb8700ee9cf19',
);


$app = AppFactory::create();
function Authentication($user, $pass)
{
    global $usuarios;
    $isUser = false;
    $isPass = false;

    if (array_key_exists($user, $usuarios)) {
        $isUser = true;
        if ($usuarios[$user] === md5($pass)) {
            $isPass = true;
        } else {
            return json_encode(['status' => 'error', 'message' => 'Password no reconocido']);
        }
    } else {
        return json_encode(['status' => 'error', 'message' => 'Usuario no reconocido']);
    }

    return json_encode(['status' => 'success', 'message' => 'Atenticacion exitosa']);
};

$app->setBasePath("/xampp/Practica8/pruebaslim/public");

$app->get('/productos/{categoria}', function (Request $request, Response $response, $args) {
    $user = $request->getHeader('user')[0];
    $pass = $request->getHeader('pass')[0];

    $resAuth = Authentication($user, $pass);
    $resAuthObj = json_decode($resAuth);
    $proyecto = 'servicioweb-847de-default-rtdb';
    $objFunciones = new Funciones();
    global $res200, $res501, $res500, $res300;

    if ($resAuthObj->status !== 'error') {
        $respuesta_Prod = $objFunciones->getData($proyecto, 'productos', $args["categoria"]);
        $data = array("code: " => 200, "message: " => $res200, "data: " => $respuesta_Prod, "status: " => 'success');
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    } else {
        $response->getBody()->write($resAuth);
    }

    return $response;
});

$app->get('/detalles/{clave}', function (Request $request, Response $response, $args) {
    $user = $request->getHeader('user')[0];
    $pass = $request->getHeader('pass')[0];

    $resAuth = Authentication($user, $pass);
    $resAuthObj = json_decode($resAuth);
    $proyecto = 'servicioweb-847de-default-rtdb';
    $objFunciones = new Funciones();
    global $res201;

    if ($resAuthObj->status !== 'error') {
        $respuesta_Det = $objFunciones->getData($proyecto, 'detalles', $args["clave"]);
        $data = array("code: " => 201, "message: " => $res201, "data: " => $respuesta_Det, "status: " => 'success');
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    } else {
        $response->getBody()->write($resAuth);
    }

    return $response;
});

#Paso de parametros



#Metodo POST a traves de un formulario.

$app->post("/producto", function (Request $request, Response $response, $args) {
    $user = $request->getHeader('user')[0];
    $pass = $request->getHeader('pass')[0];

    $resAuth = Authentication($user, $pass);
    $resAuthObj = json_decode($resAuth);
    $proyecto = 'servicioweb-847de-default-rtdb';
    $objFunciones = new Funciones();
    global $res201, $res202;
    $reqPost = $request->getParsedBody();
    $insertar_Cat = $reqPost["Categoria"];
    $insertar_Prod = $reqPost["Producto"];
    $InsDetProd = $reqPost["DetalleProducto"];
    $InsISBNProd = $reqPost["ISBNProd"];
    $res_Prod = $objFunciones->insertar_Prod($proyecto, $insertar_Cat, $insertar_Prod);
    $res_Det = $objFunciones->insertar_Detalles($proyecto, $InsISBNProd, $InsDetProd);


    if ($resAuthObj->status !== 'error') {
        $data = array("code: " => 202, "message: " => $res202, "data: " => date('d-m-Y H:i:s'), "status: " => 'success');
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    } else {
        $response->getBody()->write($resAuth);
    }
    return $response;
});
        //Mala implementacion, checar
$app->post("/producto/detalles", function (Request $request, Response $response, $args) {
    $user = $request->getHeader('user')[0];
    $pass = $request->getHeader('pass')[0];

    $resAuth = Authentication($user, $pass);
    $resAuthObj = json_decode($resAuth);
    $proyecto = 'servicioweb-847de-default-rtdb';
    $objFunciones = new Funciones();
    global $res203;
    $reqPost = $request->getParsedBody();
    $act_Info = $reqPost["Info"];
    $act_Clave = $reqPost["ISBN"];
    $res_Up=$objFunciones->update_detalles($proyecto, $act_Clave, $act_Info);
        if ($resAuthObj->status !== 'error') {
            echo json_encode($res_Up);
            $data = array("code: " => 203, "message: " => $res203, "data: " => date('d-m-Y H:i:s'), "status: " => 'success');
            $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
        }

  else {
        $response->getBody()->write($resAuth);
    }
    return $response;
});
        //Mala implementacion, checar
$app->post("/producto/delete", function (Request $request, Response $response, $args) {
    $user = $request->getHeader('user')[0];
    $pass = $request->getHeader('pass')[0];

    $resAuth = Authentication($user, $pass);
    $resAuthObj = json_decode($resAuth);
    $proyecto = 'servicioweb-847de-default-rtdb';
    $objFunciones = new Funciones();
    global $res204;
    $reqPost = $request->getParsedBody();
    $isbn= $reqPost["ISBN"];
    $cat = $reqPost["Categoria"];
    $res_Prod = $objFunciones->delete_prod($proyecto, $cat, $isbn);
    $res_Detalle = $objFunciones->delete_detail($proyecto, 'detalles', $isbn);

    if ($resAuthObj->status !== 'error') {
        $data = array("code: " => 204, "message: " => $res204, "data: " => date('d-m-Y H:i:s'), "status: " => 'success');
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    } else {
        $response->getBody()->write($resAuth);
    }
    return $response;
});


$app->run();
