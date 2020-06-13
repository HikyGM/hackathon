<?php
require 'vendor/autoload.php';

// Переменная, которая содержит объект PhpWord. Обязательно указывать весь путь!
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Определение шрифта и размера текста по умолчанию
$phpWord->setDefaultFontName('Times New Roman');
$phpWord->setDefaultFontSize(14);

//Определение различных параметров документов

$properties = $phpWord->getDocInfo(); // объект с параметрами документов
$properties->setCreator('Илья');   //Указать автора докумена
$properties->setCompany('Антарес'); //Указать компанию автора документа
$properties->setTitle('Новый документ'); //Заголовок документа
$properties->setDescription('Тестовая версия создания документа'); //Описание документа
$properties->setCategory('Тест'); //Категория документа
$properties->setLastModifiedBy('My name'); //Кем были выполнены последние изменения
$properties->setCreated(mktime(0, 0, 0, 13, 06, 2020)); //Дата создания документа
$properties->setModified(mktime(0, 0, 0, 13, 06, 2020)); //Дата редактирования
$properties->setSubject('My subject');
$properties->setKeywords('my, key, word');

//Создание раздела для документа, он необходим для размещения текста
// array - Массив с параметрами формирования раздела
$sectionStyle = array( 'marginTop' => \PhpOffice\PhpWord\Shared\Converter::pixelToTwip(100)); // pixelToTwip конвертирует пиксели в формат твипов ворда

//Добавление стилей к секции
$section = $phpWord->addSection($sectionStyle);

//Добавляем текст в раздел 
$text = "Сегодня достаточно хороший день для написания кода PHP. Всю жизнь и мечтал, что писать коды PHP, наверное, лучшее занятие в мире.";
$section->addText(htmlspecialchars($text), array('name' => 'Arial', 'size' => 18, 'color' => 'FF0000', 'italic' => (true)), array('lineHeight' =>1.5)); // В первом массиве передаются настройки шрифта, во втором параграфа




// Создаём файл с помощью специального класса Writer и сохраняем его
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
$objWriter->save('doc.docx');
?>
