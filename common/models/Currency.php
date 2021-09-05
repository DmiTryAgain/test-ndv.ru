<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string|null $num_code Циферный код валюты
 * @property string|null $char_code Буквенный код валюты
 * @property string|null $nominal Номинал
 * @property string|null $name Название валюты
 *
 * @property ExchangeRates[] $exchangeRates
 * @property string $cbr_id [varchar(255)]  Внутренний уникальный код валюты
 */
class Currency extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_code', 'char_code', 'nominal', 'name', 'cbr_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num_code' => 'Циферный код валюты',
            'char_code' => 'Буквенный код валюты',
            'nominal' => 'Номинал',
            'name' => 'Название валюты',
            'cbr_id' => 'Внутренний уникальный код валюты',
        ];
    }

    /**
     * Gets query for [[ExchangeRates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExchangeRates()
    {
        return $this->hasMany(ExchangeRates::className(), ['currency_id' => 'id']);
    }
}
