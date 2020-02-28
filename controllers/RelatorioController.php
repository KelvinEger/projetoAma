<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;

use setasign\FPDF;


class RelatorioController extends Controller{
		
	public $title = 'Relatórios';

	/**
	 * Ao chamar a URL http://localhost/projetoAma/web/index.php?r=relatorio/produto cai aqui e renderiza a view em Views/Relatorio/produto
	 * @return type
	 */
	public function actionProduto() {
		return $this->render('produto'); /* Render vai automaticamente até a pasta 'Views/NomeClasse' e encontra o arquivo passado por parâmetro*/;
	}	
	
	/**
	 * Ao chamar a URL http://localhost/projetoAma/web/index.php?r=relatorio/categoria cai aqui e renderiza a view em Views/Relatorio/categoria
	 * Se tiver setado algo do formulário, chama a impressão em em Views/Relatorio_impressao/categoria
	 * @return type
	 */
	public function actionCategoria() {
		if(sizeof(Yii::$app->request->post()) > 0){
			Yii::$app->response->headers->add('Content-Type', 'application/pdf');
			
			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(40,10,'Hello World!');
	 
			$pdf->Output('categorias.pdf', 'D');

		}
		else{
			return $this->render('categoria');
		}
	}	
}
