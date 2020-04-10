<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\EntradaProduto;
use app\models\Entrada;
use app\models\Produto;
use app\models\LoteEntrada;
use yii\i18n\Formatter;

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


		if((Yii::$app->request->post())) {
			$aErrosProdutoEntrada = [];
			$aErrosEntrada = [];
			$aErrosLote = [];
			
			$oDados         = Yii::$app->request->post();
			$aDadosProdutos = json_decode($oDados['produtos']);

			foreach($aDadosProdutos as $oProduto) {
				$oLote = new LoteEntrada();
				$oLote->setNextId();
				$oLote->setAttributes(['lote_validade' => $oProduto->validade, 'lote_descricao' => $oProduto->lote]);
	
				if($oLote->save()) {
					$oEntrada = new Entrada();
					$oEntrada->setNextId();
					$oEntrada->setAttributes($oDados['Entrada']);

					if($oEntrada->save()) {
						$aErrosProdutoEntrada = false;

						$oEntradaProduto = new EntradaProduto();
						$oEntradaProduto->setNextId();
						$oEntradaProduto->setAttributes(['lote_sequencial'=>$oLote->getAttribute('lote_sequencial'),
							'entr_sequencial'=>$oEntrada->getAttribute('entr_sequencial'),
							'entr_prod_quantidade'=>$oProduto->quantidade,
							'prod_codigo'=>$oProduto->produto
						]);

						if($oEntradaProduto->save()) {
							return $this->render('create', [
									'searchModel'=>$searchModel,
									'dataProvider'=>$dataProvider
							]);
						}
						else {
							$aErrosProdutoEntrada[] = $oEntradaProduto->getErrors();
							$bErro = true;
						}
					}
					else {
						$aErrosEntrada[] = $oEntrada->getErrors();
						$bErro = true;
					}
				}
				else {
					$aErrosLote[] = $oLote->getErrors();
					$bErro = true;
				}
			}
			
			if($bErro){
				var_dump($aErrosProdutoEntrada);
				var_dump($aErrosEntrada);
				var_dump($aErrosLote);
			}
		}
		else {
			return $this->render('create', [
					'searchModel'=>$searchModel,
					'dataProvider'=>$dataProvider
			]);
		}
	}

}
