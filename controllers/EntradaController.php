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
	 * @todo Refatorar de modo que a função não ultrapasse 20 linhas (boa prática de programação)
	 */
	public function actionCreate() {
		$searchModel = new EntradaProduto();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		
		if((Yii::$app->request->post())){
			$oDados = Yii::$app->request->post();
			$oLote  = new Lote();
			$oLote->setNextId();
			$oLote->setAttributes($oDados['Lote']);
						
			if($oLote->save()){
				$oEntrada = new Entrada();
				$oEntrada->setNextId();
				$oEntrada->setAttributes($oDados['Entrada']);
				
				if($oEntrada->save()){
					$aErrosProdutoEntrada = false;
					$aDadosProdutos       = json_decode($oDados['produtos']);
					
					foreach($aDadosProdutos as $oProduto) {
						$oEntradaProduto = new EntradaProduto();
						$oEntradaProduto->setNextId();
						$oEntradaProduto->setAttributes(['lote_sequencial' => $oLote->getAttribute('lote_sequencial'),
																	'entr_sequencial' => $oEntrada->getAttribute('entr_sequencial'),
																	'entr_prod_quantidade' => $oProduto->quantidade,
																	'prod_codigo' => $oProduto->produto
																  ]);
						
						if($oEntradaProduto->save()){							
							return $this->render('create', [
								'searchModel'  => $searchModel,
								'dataProvider' => $dataProvider,
								'cadastrou'    => true
							]);	
						}
						else{
							$aErrosProdutoEntrada[] = $oEntradaProduto->getErrors();
						}
					}
					
					if($aErrosProdutoEntrada){
						var_dump($aErrosProdutoEntrada);
					}
				}
				else{
					$aErrosEntrada = $oEntrada->getErrors();
				}
			}
			else{
				$aErrosLote = $oLote->getErrors();
			}			
		}
		else {
			return $this->render('create', [
					'searchModel'  => $searchModel,
					'dataProvider' => $dataProvider
			]);
		}
	}

}
