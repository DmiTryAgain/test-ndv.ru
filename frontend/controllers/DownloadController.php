<?php

namespace frontend\controllers;

use common\models\Currency;
use common\traits\CustomFunctionsTrait;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Контроллер для загрузки курса валют
 */
class DownloadController extends Controller
{

    use CustomFunctionsTrait;

    public function actionExchangeRates($date = null)
    {

    }

    public function actionCurrency($date = null)
    {
        $currencies = Currency::find()->select('cbr_id')->asArray()->all();
        $xml = simplexml_load_file('https://www.cbr.ru/scripts/XML_valFull.asp');
        foreach ($xml->Item as $item)
        {
            if (!CustomFunctionsTrait::in_array_r($item->attributes()->ID, $currencies)) {
                $currency = new Currency();
                $currency->setAttributes([
                    'num_code' => (string)$item->ISO_Num_Code,
                    'char_code' => (string)$item->ISO_Char_Code,
                    'nominal' => (string)$item->Nominal,
                    'name' => (string)$item->Name,
                    'cbr_id' => (string)$item->attributes()->ID,
                ]);
                $currency->save();
            }
        }
        return $this->redirect('/site/currency');
    }
}