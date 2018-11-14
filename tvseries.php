<?php

class Tvseries extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}

$app->get('/tvseries', function ($req, $res, $args) {
    $series = json_decode(\Tvseries::all());
    return $this->view->render($res, 'tvserieslist_template.php', [ 'items' => $series ]);
})->setName('tvseries');

$app->get('/tvseries/{name}', function ($req, $res, $args) {
    $s = \Tvseries::find($args['name']);  
    $serie = json_decode($s);
    return $this->view->render($res, 'tvseries_template.php', [ 'item' => $serie ]);
});

$app->delete('/tvseries/{name}', function ($req, $res, $args) {
    $serie = Tvseries::find($args['name']);
    $serie->delete();
});

$app->post('/tvseries', function ($req, $res, $args) {
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];
    $longitud = count($datos);
    for ($i = 0; $i < $longitud; $i++) {
        switch($datos[$i]['name']) {
            case "name":
                $name = $datos[$i]['value'];
                break;
            case "description":
                $description = $datos[$i]['value'];
                break;
            case "creator":
                $creator = $datos[$i]['value'];
                break;
            case "seasons":
                $seasons = $datos[$i]['value'];
                break;
            case "episodes":
                $episodes = $datos[$i]['value'];
                break;
            case "dateReleaseFirst":
                $dateReleaseFirst = $datos[$i]['value'];
                break;
            case "dateReleaseLast":
                $dateReleaseLast = $datos[$i]['value'];
                break;
            case "embedUrl":
                $embedUrl = $datos[$i]['value'];
                break;
        }
    }
    $nueva_serie = new Tvseries;
    $nueva_serie['name'] = $name;
    $nueva_serie['description'] = $description;
    $nueva_serie['creator'] = $creator;
    $nueva_serie['seasons'] = $seasons;
    $nueva_serie['episodes'] = $episodes;
    $nueva_serie['dateReleaseFirst'] = $dateReleaseFirst;
    $nueva_serie['dateReleaseLast'] = $dateReleaseLast;
    $nueva_serie['embedUrl'] = $embedUrl;

    $nueva_serie->save();
});

//Actualizar pelicula
$app->put('/tvseries/{id}', function ($req, $res, $args) {
    $template = $req->getParsedBody();
    $datos = $template['template']['data'];
    $longitud = count($datos);
    for ($i = 0; $i < $longitud; $i++) {
        switch($datos[$i]['name']) {
            case "name":
                $name = $datos[$i]['value'];
                break;
            case "description":
                $description = $datos[$i]['value'];
                break;
            case "creator":
                $creator = $datos[$i]['value'];
                break;
            case "seasons":
                $seasons = $datos[$i]['value'];
                break;
            case "episodes":
                $episodes = $datos[$i]['value'];
                break;
            case "dateReleaseFirst":
                $dateReleaseFirst = $datos[$i]['value'];
                break;
            case "dateReleaseLast":
                $dateReleaseLast = $datos[$i]['value'];
                break;
            case "embedUrl":
                $embedUrl = $datos[$i]['value'];
                break;
        }
    }
  
    $nueva_serie = Tvseries::find($args['id']);
    $nueva_serie['name'] = $name;
    $nueva_serie['description'] = $description;
    $nueva_serie['creator'] = $creator;
    $nueva_serie['seasons'] = $seasons;
    $nueva_serie['episodes'] = $episodes;
    $nueva_serie['dateReleaseFirst'] = $dateReleaseFirst;
    $nueva_serie['dateReleaseLast'] = $dateReleaseLast;
    $nueva_serie['embedUrl'] = $embedUrl;
  
    $nueva_serie->save();

});

?>
