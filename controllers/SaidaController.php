<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Produto;
use Yii;
use app\models\Saida;
use app\models\SaidaProduto;

class SaidaController extends Controller {

	/**
	 * Creates a new Produto model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		return (Yii::$app->request->post()) ? $this->insereDados(Yii::$app->request->post()) : $this->renderiza();
	}
	
	/**
	 * Faz a persistência dos dados
	 * @param object $oDados
	 */
	private function insereDados($oDados){
		$aErrosSaida = false;
		$aErrosProduto = Array();
		
		$oSaida = new Saida();
		$oSaida->setNextId();
		$oSaida->setAttributes($oDados['Saida']);
		
		if($oSaida->save()){
			$aDadosProdutos = json_decode($oDados['produtos']);
			
			foreach($aDadosProdutos as $oProduto) {
				$oProdutoSaida = new SaidaProduto();
				$oProdutoSaida->setNextId();
				$oProdutoSaida->setAttributes($oProduto);
				$oProdutoSaida->setAttribute('said_sequencial', $oSaida->getAttribute('said_sequencial'));
				
				if(!$oProdutoSaida->save()){
					$aErrosProduto[] = $oProdutoSaida->getErrors();
				}
			}
		}
		else {
			$aErrosSaida = $oSaida->getErrors();
		}
		
		if($aErrosSaida || count($aErrosProduto) > 0){
			var_dump($aErrosSaida);
			var_dump($aErrosProduto);
		}
		else{
			return $this->renderiza();
		}
		
	}
	
	/**
	 * Retorna a página de renderização
	 * @return Mixed
	 */
	private function renderiza(){
		return $this->render('create', ['model' => new Produto()]);
	}

}
