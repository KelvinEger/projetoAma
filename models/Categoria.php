<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $cate_codigo Código do cadastro da categoria
 * @property string|null $cate_descricao Descrição da categoria
 */
class Categoria extends ActiveRecord {

   /**
    * {@inheritdoc}
    */
   public static function tableName() {
      return 'categoria';
   }

   /**
    * {@inheritdoc}
    */
   public function rules() {
      return [
         [['cate_codigo', 'cate_descricao'], 'required', 'message' => 'Campo obrigatório'],
         [['cate_codigo'], 'integer'],
         [['cate_descricao'], 'string', 'max' => 50],
         [['cate_codigo'], 'unique'],
      ];
   }

   /**
    * {@inheritdoc}
    */
   public function attributeLabels() {
      return [
         'cate_codigo' => 'Categoria',
         'cate_descricao' => 'Descrição'
      ];
   }
}
