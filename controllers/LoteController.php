<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Lote;

class LoteController extends Controller {

	public function actionLotes($iProduto) {
		$aRetorno = []; /* $data no exemplo */

		$aLotes = Lote::find()
			->innerJoin('`estoque` ON  `estoque`.`lote_sequencial` =  `lote`.`lote_sequencial`')
			->where(['`estoque`.`prod_codigo`'=>$iProduto])
			->orderBy('lote_validade')
			->all();

		foreach($aLotes as $oLote) {

			$aRetorno[] = ['item' => ['value'=>$oLote->lote_sequencial, 
								'text' => $oLote->lote_descricao]];
		}

		echo json_encode($aRetorno);
	}
}
	