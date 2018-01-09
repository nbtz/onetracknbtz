<?php

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\Point;
use dosamigos\google\maps\Size;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\overlays\MarkerShape;
use dosamigos\google\maps\overlays\Icon;
use dosamigos\google\maps\overlays\Symbol;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;


$coord = new LatLng(['lat' => 39.720089311812094, 'lng' => 2.91165944519042]);
$map = new Map([
    'center' => $coord,
    'zoom' => 14,
    'width' => '100%'
]);

// lets use the directions renderer
$home = new LatLng(['lat' => 39.720991014764536, 'lng' => 2.911801719665541]);
$school = new LatLng(['lat' => 39.719456079114956, 'lng' => 2.8979293346405166]);
$santo_domingo = new LatLng(['lat' => 39.72118906848983, 'lng' => 2.907628202438368]);


$icon = new Icon([
	'url' => 'https://onelinkspace-com-upload.s3.amazonaws.com/2017/12/19/5a38d29e97b611513673374.jpg',
	'scaledSize' => new Size(['width' => 40, 'height' => 40])
]);

// Lets add a marker now
$marker = new Marker([
    'position' => $coord,
    'title' => 'My Home Town',
    'icon' => $icon,
    // 'shape' => new MarkerShape(['coords' => ['x1' => 1, 'y1' => 1, 'x2' => 10, 'y2' => 10], 'type' => 'rect'])
]);

// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
    new InfoWindow([
        'content' => '<p>This is my super cool content</p>'
    ])
);

// Add marker to the map
$map->addOverlay($marker);



/*$icon->attachInfoWindow(
    new InfoWindow([
        'content' => '<p>This is my super cool content eeee</p>'
    ])
);*/

// $map->addOverlay($icon);


// Display the map -finally :)
echo $map->display();