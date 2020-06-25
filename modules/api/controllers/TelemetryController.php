<?php


namespace app\modules\api\controllers;


use app\models\Telemetry;
use Yii;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\web\Controller;

class TelemetryController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * @return ActiveDataProvider
     */
    public function actionIndex()
    {
        return new ActiveDataProvider([
            'query' => Telemetry::find()
        ]);
    }


    /**
     * @return Telemetry
     * @throws InvalidConfigException
     */
    public function actionCreate(){
        $data = Yii::$app->request->getBodyParams();
        $telemetry = new Telemetry();

        if($telemetry->load($data,'' ) && $telemetry->validate()){
            if($telemetry->save()){
                Yii::$app->response->headers->add('Location', 'http://localhost:8500/api/telemetry/create');
                Yii::$app->response->setStatusCode(201);
            }
        }

        return $telemetry;
    }


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];

        return $behaviors;
    }
}