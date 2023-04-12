<?php

namespace app\helpers\notification;

use app\models\pure\CreationLog;

use app\models\pure\UserLogRead;
use Yii;

class NotificationBuilder
{

    public $user;
    public $notifications=[];
    public $length=0;
    public $models;


    public function __construct()
    {

        $this->user = Yii::$app->user->identity;

//        $this->models = CreationLog::findBySql("select creation_log.* from creation_log
// inner join user_log_read on user_log_read.log_id=creation_log.id and user_log_read.user_id={$this->user->id}
//         where CONVERT(date,creation_log.date_created) >= DATEADD(day,-15,GETDATE() )
//         order by creation_log.date_created desc ")->all();
//
//        $this->buildNotifications($this->models);
//        $this->length = UserLogRead::findBySql("select * from user_log_read where user_id={$this->user->id} and checked_time is null")->count("*");


    }


    /**
     * @param Log[] $logs '
     */

    private function buildNotifications(array $logs)
    {

        foreach ($logs as $log) {



                $notification = Yii::t('app', '{user} created {customer}!', [
                    'user' => $log->user->fullname,
                    'customer' => $log->customer->fullname,
                    "time" => $log->date_created]);



            if ($notification) {


                $this->notifications[] = new Notification($log, $notification);
            }

        }

    }


}
