<?php

namespace app\controllers;

use Yii;
use app\models\Produto;
use app\models\ProdutoConsulta;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller {

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
	 * Lists all Produto models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new ProdutoConsulta();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
						'searchModel' => $searchModel,
						'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Produto model.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionView($id) {
		return $this->render('view', [
						'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Produto model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Produto();

		if ($model->load(Yii::$app->request->post())) {			
			$model->setAttribute('prod_codigo', $this->getMaxProduto()['id'] + 1); //Fazendo auto-increment manualmente
			
			if ($model->save()) {
				return $this->redirect(['view', 'id' => $model->prod_codigo]);
			} 
			else {
				echo var_dump($model->getErrors());
			}
		}

		return $this->render('create', [
						'model' => $model,
		]);
	}

	/**
	 * Updates an existing Produto model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->prod_codigo]);
		}

		return $this->render('update', [
						'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Produto model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}
	
	/*
	 * Chama a view onde temos os relatórios
	 */
	public function actionRelatorio(){
//		var_dump(Yii::$app->controllerNamespace.'/../relatorios/Produto');
		/*
		 * tem que dar um jeito de fazer essa merda chamar o arquivo da pasta relatórios/relatorio
		 */
	}

	/**
	 * Finds the Produto model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Produto the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Produto::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('A página requisitada não existe.');
	}

	/**
	 * Retorna o maior valor da chave da tabela produto
	 * @return int
	 */
	private function getMaxProduto() {
		$oBusca = Yii::$app->db->createCommand('SELECT MAX(prod_codigo) AS id FROM produto')->queryAll();
		return $oBusca[0];
	}

}
