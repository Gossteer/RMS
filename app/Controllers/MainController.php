<?php

namespace App\Controllers;

use App\Components\TemplateEngine\TemplateEngine;
use App\Models\Hotel;
use App\Models\HotelCategory;

class MainController
{

    /**
     * Action для главной страницы
     */
    public function index()
    {
        return TemplateEngine::getInstance()->render('main/index.php', [
            'hotels' => Hotel::all()->toArray(),
            'hotel_categories' => HotelCategory::all()->toArray()
        ]);
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
