<?php

namespace App\Controllers;

use App\Components\TemplateEngine\TemplateEngine;
use App\Models\Employee;
use App\Models\Hotel;
use App\Models\HotelCategory;
use Twig\Template;

class MainController
{

    /**
     * Action для главной страницы
     */
    public function index()
    {
        // Подключаем вид
        // $hotelCategory = HotelCategory::find(3);
        
        // var_dump(Hotel::delete(3));
        // $hotel = new Hotel;
        // $hotel->name = 'Hotel';
        // $hotel->floor = 7;
        // $hotel->hotelcategory_id = $hotelCategory->getId();
        // $hotel->save();
        // Employee::create([
        //     'name' => 'Олег',
        //     'hotel_id' => 5,
        // ]);
        // Employee::create([
        //     'name' => 'Антон',
        //     'hotel_id' => 0,
        // ]);
        // $test = Employee::find(4);
        // var_dump($test);
        
        // $test = HotelCategory::find(3);

        // var_dump($test->oneToMany('Hotel')->first());

        // $test = Hotel::find(0)->oneToMany('Employee')->first();
        // foreach ($test->getData() as $key => $value) {
        //     echo "<br>";
        //     var_dump($value);
        // }
        // var_dump($test);
        
        return TemplateEngine::getInstance()->render('main/index.php', ['pelmen' => 'lol']);
    }

    /**
     * Action для страницы "Контакты"
     */
    // public function actionContact()
    // {

    //     // Переменные для формы
    //     $userEmail = false;
    //     $userText = false;
    //     $result = false;

    //     // Обработка формы
    //     if (isset($_POST['submit'])) {
    //         // Если форма отправлена 
    //         // Получаем данные из формы
    //         $userEmail = $_POST['userEmail'];
    //         $userText = $_POST['userText'];

    //         // Флаг ошибок
    //         $errors = false;

    //         // Валидация полей
    //         if (!User::checkEmail($userEmail)) {
    //             $errors[] = 'Неправильный email';
    //         }

    //         if ($errors == false) {
    //             // Если ошибок нет
    //             // Отправляем письмо администратору 
    //             $adminEmail = 'php.start@mail.ru';
    //             $message = "Текст: {$userText}. От {$userEmail}";
    //             $subject = 'Тема письма';
    //             $result = mail($adminEmail, $subject, $message);
    //             $result = true;
    //         }
    //     }

    //     // Подключаем вид
    //     require_once(ROOT . '/views/site/contact.php');
    //     return true;
    // }
    
    /**
     * Action для страницы "О магазине"
     */
    // public function actionAbout()
    // {
    //     // Подключаем вид
    //     require_once(ROOT . '/views/site/about.php');
    //     return true;
    // }

}