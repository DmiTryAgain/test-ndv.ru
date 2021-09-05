<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "exchange_rates".
 *
 * @property int $id
 * @property int|null $currency_id
 * @property string|null $value Значение
 * @property string|null $date Дата курса
 *
 * @property Currency $currency
 */
class ExchangeRates extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exchange_rates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency_id'], 'integer'],
            [['date'], 'safe'],
            [['value'], 'string', 'max' => 255],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency_id' => 'Currency ID',
            'value' => 'Значение',
            'date' => 'Дата курса',
        ];
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }
}
