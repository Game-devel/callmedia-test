<?php
declare(strict_types=1);

namespace frontend\models\notifications;

/**
 * This is the model class for table "notifications".
 *
 * @property int $id
 * @property string $message
 * @property int $integrator
 * @property int $status
 * @property string $created_at
 * @property string|null $sent_at
 */
class Notification extends \yii\db\ActiveRecord
{
    private const TYPE_SMS = 1;
    private const TYPE_TELEGRAM = 2;

    public const TYPE_LIST = [
      self::TYPE_SMS => 'sms',
      self::TYPE_TELEGRAM => 'telegram'
    ];

    public const STATUS_PENDING = 1;
    public const STATUS_SENT = 2;
    public const STATUS_ERROR = 3;

    public const STATUS_LIST = [
        self::STATUS_PENDING => 'pending',
        self::STATUS_SENT => 'sent',
        self::STATUS_ERROR => 'error'
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%notifications}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['message', 'integrator', 'status'], 'required'],
            [['message'], 'string'],
            [['created_at', 'sent_at'], 'safe'],
            [['integrator', 'status'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
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
    public static function find(): NotificationQuery
    {
        return new NotificationQuery(get_called_class());
    }

    public static function getTypeList(): array
    {
        return self::TYPE_LIST;
    }

    public static function getStatusList(): array
    {
        return self::STATUS_LIST;
    }
}
