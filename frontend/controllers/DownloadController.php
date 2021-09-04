<?php

namespace frontend\controllers;

use GuzzleHttp\Client;
use yii\web\Controller;

/**
 * Контроллер для загрузки курса валют
 */
class DownloadController extends Controller
{
    public function actionIndex($date = null)
    {
        $xml = simplexml_load_file('https://www.cbr.ru/scripts/XML_val.asp?d=0');
        echo '<pre>'; print_r($xml);die();
    }
}