<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\EntradaProduto;
use app\models\Entrada;
use app\models\Produto;
use yii\i18n\Formatter;

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

	/**
	 * Renderiza a página index
	 * @return type
	 */
	public function actionIndex() {

		$searchModel = new \app\models\EntradaConsulta();
		$dados = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
				'dataProvider' => $dados,
				'searchModel' => $searchModel
		]);
	}

	/**
	 * Renderiza a página de cadastro de entradas
	 * @return type
	 * @todo Refatorar de modo que a função não ultrapasse 20 linhas (boa prática de programação)
	 */
	public function actionCreate() {
		return (Yii::$app->request->post()) ? $this->insereDados(Yii::$app->request->post()) : $this->renderiza();
	}

	/**
	 * Insere os dados no banco
	 * @param object $oDados
	 * @return void
	 */
	private function insereDados($oDados) {
		$aErrosProdutoEntrada = [];
		$bErroEntrada = false;

		$oEntrada = new Entrada();
		$oEntrada->setNextId();
		$oEntrada->setAttributes($oDados['Entrada']);

		if($oEntrada->save()) {
			$aDadosProdutos = json_decode($oDados['produtos']);

			foreach($aDadosProdutos as $oProduto) {
				$oEntradaProduto = new EntradaProduto();
				$oEntradaProduto->setNextId();
				$oEntradaProduto->setAttributes((array) $oProduto);
				$oEntradaProduto->setAttribute('entr_sequencial', $oEntrada->getAttribute('entr_sequencial'));

				if(!$oEntradaProduto->save()) {
					$aErrosProdutoEntrada[] = $oEntradaProduto->getErrors();
				}
			}
		}
		else {
			$bErroEntrada = $oEntrada->getErrors();
		}

		if($bErroEntrada || count($aErrosProdutoEntrada) > 0) {
			var_dump($aErrosProdutoEntrada);
			var_dump($bErroEntrada);
		}
		else {
			return $this->renderiza();
		}
	}

	/**
	 * Renderiza a tela de create
	 * @return void
	 */
	private function renderiza() {
		$searchModel = new EntradaProduto();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('create', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
	}

}
