<?php
include './router/Router.php';
include './router/Request.php';
include './functions/functions.php';
include './.env/.values.php';
include './functions/database.php';
require __DIR__ . '/vendor/autoload.php';
$router = new Router(new Request());
// home
$router->get("/", function ($request) {
    // check for auth
    // include "./middleware/auth.middleware.php";    
    // get home controller
    include "./controllers/home.controller.php";
});

// contact
$router->get("/contact", function ($request) {
    // check for auth
    // include "./middleware/auth.middleware.php";
    // get home controller
    include "./controllers/contact.controller.php";
});
$router->get("/route/:id",function ($request) {
    
    echo "from another route";
});
$router->post("/route", function ($request) {
    echo "from another route";
});


// login routs
$router->get("/login", function ($request) {
    include "./controllers/login.controller.php";
});
$router->post("/login", function ($request) {
    include "./controllers/login.controller.php";
});

$router->post("/newsletter", function ($request) {   
    // get home controller
    include "./controllers/newsletter.controller.php";
});