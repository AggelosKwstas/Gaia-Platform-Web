<?php

namespace app\helpers\notification;


use app\models\pure\CreationLog;
use app\models\pure\UserLogRead;
use Yii;
use yii\db\Transaction;

class NotificationHelper
{

    public function __construct()
    {


    }

    public static function updateAllNotifications($user_id)
    {
        $date = (new \DateTime())->format('Y-m-d H:i:s');
        $saved = Yii::$app->db->createCommand("update user_log_read set checked_time='$date' where user_id=$user_id and checked_time is null")->execute();
        return $saved;

    }


    public static function save($user_id, $customer_id)
    {
        $transaction = null;
        if((CreationLog::findBySql("select * from creation_log where user_id=$user_id and customer_id=$customer_id")->one()))
            return;
        $log = new CreationLog();
        $log->user_id = $user_id;
        $log->customer_id = $customer_id;
        try {
            $transaction = Yii::$app->db->beginTransaction();
            if ($log->save(false)) {
                $user_log = new UserLogRead();
                $user_log->log_id = $log->id;
                $user_log->user_id = $user_id;
                $user_log->checked_time = (new \DateTime())->format('Y-m-d H:i:s');

                if ($user_log->save()) {


                    $saved = Yii::$app->db->createCommand("insert into user_log_read(user_id,log_id) select user.id,$log->id from user where user.user_type_id>2 and user.id !=$user_id")->execute();


                        $transaction->commit();


                    return true;




                }



            }

            $transaction->rollBack();
            return false;
        } catch (\Exception $e) {
            $transaction->rollBack();
            die($e->getMessage());
        }


        return false;


    }
}
