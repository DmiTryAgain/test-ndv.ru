<?php

use yii\db\Migration;

/**
 * Class m210904_190401_create_table_currency
 */
class m210904_190401_create_table_currency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'num_code' => $this->string()->comment('Циферный код валюты'),
            'char_code' => $this->string()->comment('Буквенный код валюты'),
            'nominal' => $this->string()->comment('Номинал'),
            'name' => $this->string()->comment('Название валюты'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }
}
