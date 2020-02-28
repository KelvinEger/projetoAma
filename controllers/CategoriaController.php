<?php

namespace app\controllers;

use Yii;
use app\models\Categoria;
use app\models\CategoriaConsulta;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriaController implements the CRUD actions for Categoria model.
 */
class CategoriaController extends Controller {

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
	 * Lists all Categoria models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new CategoriaConsulta();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
					  'searchModel' => $searchModel,
					  'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Categoria model.
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
	 * Creates a new Categoria model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Categoria();

		if ($model->load(Yii::$app->request->post())) {
			$model->setAttribute('cate_codigo', $this->getMaxCategoria()['cate_codigo'] + 1);
			
			if($model->save()){
				Yii::$app->session->setFlash('success', "Registro salvo com sucesso");
				return $this->redirect(['index', 'id' => $model->cate_codigo]);
			}
			else{
				Yii::$app->session->setFlash('error', "Erro ao salvar. Erro: ". json_encode($model->getErrors()));
			}
		}

		return $this->render('create', [
					  'model' => $model,
		]);
	}

	/**
	 * Updates an existing Categoria model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->cate_codigo]);
		}

		return $this->render('update', [
					  'model' => $model,
		]);
	}

	/**
	 * Deletes an existing Categoria model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Categoria model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Categoria the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = Categoria::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('A página requisitada não existe.');
	}
	
	/**
	 * Retorna o maior valor da chave da tabela produto
	 * @return int
	 */
	private function getMaxCategoria() {
		$oBusca = Yii::$app->db->createCommand('SELECT MAX(cate_codigo) AS cate_codigo FROM categoria')->queryAll();
		return $oBusca[0];
	}

}
