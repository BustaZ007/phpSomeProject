<?php

namespace app\modules\telemetry\controllers;


use app\models\Telemetry;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ShowController extends Controller
{
    /**
     * Displays telemetry page.
     *
     * @return string
     */
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Telemetry::find()
        ]);
        return $this->render('telemetry', ['data' => $dataProvider]);
    }
}