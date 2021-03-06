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

    $app->get('/edit_stylist', function() use ($app) {
        $new_name_st = $_GET['new_name_st'];

        $stylist_id = $_GET['stylist_id'];
        $stylist = Stylist::find($stylist_id);
        $stylist->update($new_name_st);

        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/edit_client', function() use ($app) {
        $new_name_cl = $_GET['new_name_cl'];
        $client_id = $_GET['client_id'];
        $client = Client::find($client_id);
        $client->update($new_name_cl);

        $stylist_id = $_GET['stylist_id'];
        $stylist = Stylist::find($stylist_id);

        $clients = $stylist->getClients();

        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $clients));
    });

    $app->post('/', function() use ($app) {
        $name_st = $_POST['name_st'];
        $stylist = new Stylist($name_st);
        $stylist->save();

        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/delete_stylist', function() use ($app) {
        $stylist_id = $_GET['stylist_id'];
        $stylist = Stylist::find($stylist_id);
        $stylist->delete();

        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/all_stylists_deleted', function() use ($app) {
        Stylist::deleteAll();

        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get('/all_clients_deleted', function() use ($app) {
        Client::deleteAll();

        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });


    $app->get('/stylist/{id}/edit', function($id) use ($app) {
        $stylist = Stylist::find($id);

        return $app['twig']->render('edit_stylist.html.twig', array('stylist' => $stylist));
    });

    $app->get('/stylist/{id}/delete_clients', function($id) use ($app) {
        $stylist = Stylist::find($id);
        $clients = $stylist->getClients();

        return $app['twig']->render('delete_select_clients.html.twig', array('stylist' => $stylist, 'clients' => $clients));
    });

    $app->get('/delete_clients', function() use ($app) {
        $stylist_id = $_GET['stylist_id'];
        $stylist = Stylist::find($stylist_id);
        $stylist->deleteClients();

        $clients = $stylist->getClients();

        return $app['twig']->render('stylist.html.twig', array('clients' => $clients, 'stylist' => $stylist));
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

    $app->get('/delete_client', function() use ($app) {
        $client_id = $_GET['client_id'];
        $client = Client::find($client_id);
        $client->delete();

        $stylist_id = $_GET['stylist_id'];
        $stylist = Stylist::find($stylist_id);

        $clients = $stylist->getClients();

        return $app['twig']->render('stylist.html.twig', array('stylist' => $stylist, 'clients' => $clients));
    });

    $app->get('/client/{id}/edit', function($id) use ($app) {
        $client = Client::find($id);

        return $app['twig']->render('edit_client.html.twig', array('client' => $client));
    });


    return $app;
?>
