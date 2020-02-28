<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Entrada;

class EntradaController extends Controller {

	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}

	public function actionIndex() {
		return $this->render('index');
	}
	
	public function actionCreate() {
		$model = new Entrada();
		
		var_dump($model->load(Yii::$app->request->post()));die;
		return $this->render('create');
	}


}
