<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\EntradaProduto;
use app\models\Entrada;
use app\models\Produto;
use app\models\Lote;

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
		
//		if((Yii::$app->request->post())){
//			var_dump(Yii::$app->request->post());die;
//			
//			$oDados = Yii::$app->request->post();
//			
//			$oLote = new Lote();
//			$oLote->setNextId();
//			$oLote->setAttributes($oDados['Lote']);
//			echo $oLote->save();
//			
//			$oEntrada = new Entrada();;
//			$oEntrada->setNextId();
//			$oEntrada->setAttributes($oDados['Entrada']);
//			echo $oEntrada->save();
//			
//			$oEntradaProduto = new EntradaProduto();
//			$oEntradaProduto->setNextId();
//			$oEntradaProduto->setAttribute(['entr_prod_quantidade' => $oDados['EntradaProduto']['entr_prod_quantidade'],
//													  'entr_sequencial' => $oEntrada['entr_sequencial'],
//													  'lote_sequencial' => $oLote['lote_sequencial']
//													]);
//			echo $oEntradaProduto->save();
//			
//			
//			
//		}
//		else{
			return $this->render('create', [
					'searchModel'  => $searchModel,
					'dataProvider' => $dataProvider
			]);
//		}
		
	}

}
