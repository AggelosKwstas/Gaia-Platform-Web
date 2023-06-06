<?php

namespace app\controllers;

use app\models\Measurements;
use app\models\pure\Node;

use app\models\Sensor;
use Yii;
use yii\web\Controller;
use yii\web\Response;


class ApiController extends Controller
{
    public function actionFetch()
    {
        //get data and check that they are not null;
        $request = Yii::$app->request;
        $time = $request->post('TS');
        $mac = $request->post('S_ID');
        $lon = $request->post('LON');
        $lat = $request->post('LAT');

        $timestamp = date('Y-m-d H:i:s', strtotime($time));

        $sensorId = \app\models\pure\Node::find()
            ->select('id')
            ->where(['like', 'MAC_address', $mac])
            ->scalar();


        foreach ($request as $id => $val) {

            //write sensorType to a file, won't use it in a query
            $sensorType = \app\models\pure\Sensor::find()->select('id,hour_limit,eight_hours,day_limit,month_limit,year_limit')->where(['like', 'name', $id])->one();

            if ($sensorType && $val != -1) {
                //get sensor based on id
                $sensor = \app\models\Node::findOne($sensorId);
                $measurements = new Measurements();
                $measurements->sensor_id = $sensor->id;
                $measurements->timestamp = $timestamp;
                $measurements->value = $val;
                $measurements->save();

            }
        }
    }

}