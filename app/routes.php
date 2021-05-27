<?php
//Список маршрутов => контроллер/метод
const ROUTES = [
    // Главная страница
    'index.php' => 'main/index', // actionIndex в MainController
    '' => 'main/index', // actionIndex в MainController
    'hotel/create' => 'hotel/create', // actionCreate в HotelController
    'hotel/delete' => 'hotel/delete',
    'floor/delete' => 'floor/delete',
];