<?php
declare(strict_types=1);

namespace frontend\models\notifications;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $message
 * @property string $integrator
 * @property string $status
 * @property string $created_at
 * @property string|null $sent_at
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'integrator', 'status'], 'required'],
            [['message'], 'string'],
            [['created_at', 'sent_at'], 'safe'],
            [['integrator', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'integrator' => 'Integrator',
            'status' => 'Status',
            'created_at' => 'Created At',
            'sent_at' => 'Sent At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NotificationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotificationQuery(get_called_class());
    }
}
