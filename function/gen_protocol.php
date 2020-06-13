<?php
$docx = new ZipArchive();

if ($docx->open('doma.docx') === true) {
    $xml = $docx->getFromName('word/document.xml');

    $xml = str_replace('IDprot', 'ЗАМЕЩАЮЩИЙ ТЕКСТ', $xml);

    $docx->addFromString('word/document.xml', $xml);

    $docx->close();
}