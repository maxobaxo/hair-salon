<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/Stylist.php';
    require_once __DIR__.'/../src/Client.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'));

    $app->get('/', function() use ($app) {

        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post('/', function() use ($app) {
        $name_st = $_POST['name_st'];
        $stylist = new Stylist($name_st);
        $stylist->save();

        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/all_stylists_deleted', function() use ($app) {
        Stylist::deleteAll();

        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/stylists/{id}', function($id) use ($app) {
        $stylist = Stylist::find($id);
        $clients = $stylist->getClients();

        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $clients));
    });

    $app->post('/clients', function() use ($app) {
        $name_cl = $_POST['name_cl'];
        $stylist_id = $_POST['stylist_id'];
        $client = new Client($name_cl, $stylist_id);
        $client->save();

        $stylist = Stylist::find($stylist_id);

        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $stylist->getClients()));
    });


    return $app;
?>
