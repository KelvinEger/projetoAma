<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\EntradaProduto;
use app\models\Entrada;
use app\models\Produto;

class EntradaController extends Controller {

	/**
	 * {@inheritdoc}
	 */
	public function behaviors() {
		return [
			'verbs'=>[
				'class'=>VerbFilter::className(),
				'actions'=>[
					'delete'=>['POST'],
				],
			],
		];
	}
	
	/**
	 * Renderiza a página index
	 * @return type
	 */
	public function actionIndex() {
		return $this->render('index');
	}

	/**
	 * Renderiza a página de cadastro de entradas
	 * @return type
	 */
	public function actionCreate() {
		$searchModel = new EntradaProduto();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		return $this->render('create', [
				'searchModel'  => $searchModel,
				'dataProvider' => $dataProvider
		]);
	}

}
