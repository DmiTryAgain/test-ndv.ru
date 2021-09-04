<?php

use yii\db\Migration;

/**
 * Class m210904_191350_create_table_exchange_rates
 */
class m210904_191350_create_table_exchange_rates extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('exchange_rates', [
            'id' => $this->primaryKey(),
            'currency_id' => $this->integer(),
            'value' => $this->string()->comment('Значение'),
            'date' => $this->dateTime()->comment('Дата курса'),
        ]);

        $this->addForeignKey(
            'fk-exchange_rates-currency',
            'exchange_rates',
            'currency_id',
            'currency',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('exchange_rates');
    }

}
