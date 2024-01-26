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
            'integrator' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'sent_at' => $this->timestamp()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notifications}}');
    }
}
