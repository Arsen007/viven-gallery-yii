<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property string $price
 * @property string $custom_attributes
 * @property string $description
 * @property string $image
 * @property string $images
 * @property string $url_name
 * @property string $ebay_url
 * @property integer $state
 * @property integer $visible
 * @property string $keywords
 *
 * The followings are the available model relations:
 * @property ProductCategories $category
 */
class Products extends CActiveRecord
{
    public $subcategory_id;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, price, url_name,ebay_url, visible, category_id', 'required'),
			array('category_id, state, visible', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('price', 'length', 'max'=>10),
			array('image', 'length', 'max'=>100),
			array('url_name', 'length', 'max'=>255),
			array('description, images, subcategory_id', 'safe'),
			array('custom_attributes, images, keywords', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, category_id, price, description, image, images, url_name, state, visible', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'ProductCategories', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'category_id' => 'Category',
			'price' => 'Price',
			'custom_attributes' => 'Custom Attributes',
			'description' => 'Description',
			'image' => 'Image',
			'images' => 'Images',
			'url_name' => 'Url Name',
			'ebay_url' => 'Ebay Url',
			'state' => 'State',
			'visible' => 'Visible',
			'keywords' => 'Keywords',
			'subcategory_id' => 'Subcategory',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('custom_attributes',$this->custom_attributes,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('images',$this->images,true);
		$criteria->compare('url_name',$this->url_name,true);
		$criteria->compare('ebay_url',$this->ebay_url,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('keywords',$this->keywords,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Products the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
