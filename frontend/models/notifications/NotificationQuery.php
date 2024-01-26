<?php
declare(strict_types=1);

namespace frontend\models\notifications;

/**
 * This is the ActiveQuery class for [[Notification]].
 *
 * @see Notification
 */
class NotificationQuery extends \yii\db\ActiveQuery
{
    public function statusBy(int $status): self
    {
        $this->andWhere(['status' => $status]);
        return $this;
    }
}
