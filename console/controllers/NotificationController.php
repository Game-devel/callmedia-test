<?php
declare(strict_types=1);

namespace console\controllers;

use frontend\models\notifications\interfaces\SendNotificationInterface;
use frontend\models\notifications\Notification;
use frontend\models\notifications\services\SmsNotificationService;
use frontend\models\notifications\services\TelegramNotificationService;
use yii\base\InvalidConfigException;
use yii\console\Controller;

/**
 * Notification controller
 */
class NotificationController extends Controller
{
    /**
     * @throws InvalidConfigException
     */
    public function actionSend()
    {
        /** @var Notification $notification */
        $notification = Notification::find()->statusBy(Notification::STATUS_PENDING)->limit(1)->one();
        if (empty($notification)) {
            return true;
        }
        try {
            $strategy = $this->getTypeService($notification->integrator);
            if ($strategy->sendNotification($notification->message)) {
                $notification->updateAttributes(['status' => Notification::STATUS_SENT, 'sent_at' => date('Y-m-d H:i:s')]);
                return true;
            } else {
                $notification->updateAttributes(['status' => Notification::STATUS_ERROR, 'sent_at' => date('Y-m-d H:i:s')]);
                return false;
            }
        } catch (\Throwable $e) {
            /* ... */
        }
        return false;
    }


    /**
     * @throws InvalidConfigException
     */
    private function getTypeService(int $integrator): SendNotificationInterface
    {
        switch ($integrator) {
            case Notification::TYPE_SMS:
                return \Yii::createObject(SmsNotificationService::class);
            case Notification::TYPE_TELEGRAM:
                return \Yii::createObject(TelegramNotificationService::class);
            default:
                throw new \InvalidArgumentException('Invalid integrator specified.');
        }
    }
}
