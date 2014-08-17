<?php

/**
 * This is the model class for table "product_relations".
 *
 * The followings are the available columns in table 'product_relations':
 * @property integer $first_product
 * @property integer $second_product
 */
class ProductRelations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_relations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_product, second_product', 'required'),
			array('first_product, second_product', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('first_product, second_product', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'first_product' => 'First Product',
			'second_product' => 'Second Product',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('first_product',$this->first_product);
		$criteria->compare('second_product',$this->second_product);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(
                        'pageSize' => 5,
                    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductRelations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getRelations($id){
        return Yii::app()->db->createCommand('SELECT
          `first_product` AS `related_product_ids`
        FROM
          '.$this->tableName().'
        WHERE `second_product` = '.$id.'
        UNION ALL
        SELECT
          `second_product`
        FROM
          '.$this->tableName().'
        WHERE `first_product` = '.$id.' ')->queryAll();
//        Yii::app()->db->createCommand('delete * from post')->query();
    }

    private function deleteRelated($id1,$id2){
        return Yii::app()->db->createCommand('DELETE FROM `product_relations` WHERE (`first_product` = '.$id1.' && `second_product` = '.$id2.') OR (`first_product` = '.$id2.' && `second_product` = '.$id1.')')->query();
    }

    private function insertRelated($id1,$id2){
        return Yii::app()->db->createCommand('INSERT INTO `viven`.`product_relations` (`first_product`, `second_product`) VALUES ('.$id1.', '.$id2.')')->query();
    }

    public function saveRelations($id,$relatedIds){
        $newRelatedIds = array();
        $alreadyRelatedIds = $this->getRelations($id);
        $existingRelatedIds = array();
        foreach($alreadyRelatedIds as $value){
            $existingRelatedIds[] = $value['related_product_ids'];
        }
        $idsForInsert = array_diff($relatedIds,$existingRelatedIds);
        $idsForDelete = array_diff($existingRelatedIds,$relatedIds);
        if(!empty($idsForDelete)){
            foreach($idsForDelete as $value){
                $this->deleteRelated($id,$value);
            }
        }
        if(!empty($idsForInsert)){
            foreach($idsForInsert as $value){
                if($value == '' || $id == $value){
                    continue;
                }
                $this->insertRelated($id,$value);
            }
        }
    }
}
