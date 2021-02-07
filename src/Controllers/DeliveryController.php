<?php

namespace App\Controllers;

use App\Controllers\Dtos\DeliveryDto;
use App\Controllers\Params\GetDeliveryPricesParams;
use App\Domains\Models\Deny;
use App\Domains\Models\Type;
use Yii;
use yii\filters\ContentNegotiator;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;

class DeliveryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
//        $behaviors['contentNegotiator'] = [
//            'class' => ContentNegotiator::class,
//            'formats' => [
//                'application/json' => Response::FORMAT_JSON,
//            ],
//        ];
        return $behaviors;
    }

    /**
     * Get domain with prices
     *
     * @return DeliveryDto[]
     * @throws BadRequestHttpException
     */
    public function actionCheck(): array
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $params = new GetDeliveryPricesParams();
        if (!$params->load(Yii::$app->request->get(), '') || !$params->validate()) {
            throw new BadRequestHttpException();
        }

        /** @var DeliveryDto[] $dtos */
        $dtos = [];
        $deny_type_list = [];
        $search = Yii::$app->request->get('search');
        $types = Type::find()->asArray()->all();
        $deny = Deny::find()->where(['city' => $search])->asArray()->all();

        if ($deny == null) {
            return $dtos;
        }

        foreach ($deny as $d){
            array_push($deny_type_list, $d['type']);
        }

        foreach ($types as $t) {
            $available = true;

            if (in_array($t['type'], $deny_type_list)) {
                $available = false;
            }

            $delivery = [
                'id' => (int) $t['id'],
                'city' => $search,
                'type' => $t['type'],
                'available' => $available,
                'price' => (float) $t['price'],
            ];

            array_push($dtos, $delivery);

        }


        // todo найти список типов доставки из таблицы type
        // todo создать список город + тип
        // todo проверить город на корректность имени (разрешены латинские символы, пробелы и тире)
        // todo проверить наличие города в таблице deny
        // todo создать список dto с ценами для типов доставки

        return $dtos;
    }

    public function actionIndex()
    {
        $name = 'Zhal';
        $age = 19;

        return $this->render('index', [
            'name' => $name,
            'age' => $age,
        ]);
    }
}
