<?php

use yii\db\Migration;

/**
 * Class m230614_134221_settings
 */
class m230614_134221_settings extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%settings}}', [
            'id' => $this->string()->notNull(),
            'value' => $this->string()->notNull(),
        ]);

        $this->addPrimaryKey('pk-settings-id', '{{%settings}}', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('settings');
    }
}