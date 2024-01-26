<?php
declare(strict_types=1);

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notifications}}`.
 */
class m240126_011712_create_notifications_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notifications}}', [
            'id' => $this->primaryKey(),
            'message' => $this->text()->notNull(),
            'integrator' => $this->smallInteger()->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->dateTime()->defaultExpression('NOW()'),
            'sent_at' => $this->dateTime()->null(),
        ]);

        $this->createIndex('IND-notifications-integrator', '{{%notifications}}', ['integrator']);
        $this->createIndex('IND-notifications-status', '{{%notifications}}', ['status']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notifications}}');
    }
}
