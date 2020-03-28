<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Produto;

class SaidaController extends Controller {

	/**
	 * Creates a new Produto model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		
		return $this->render('create', ['model'=> new Produto()]);
	}

}
