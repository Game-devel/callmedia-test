<?php
declare(strict_types=1);

namespace frontend\models\notifications\services;

use frontend\models\notifications\interfaces\SendNotificationInterface;

class SmsNotificationService implements SendNotificationInterface
{

    public function sendNotification(string $message): bool
    {
        return true;
    }
}