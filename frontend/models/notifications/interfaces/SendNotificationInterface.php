<?php
declare(strict_types=1);

namespace frontend\models\notifications\interfaces;

interface SendNotificationInterface
{
    public function sendNotification(string $message);
}