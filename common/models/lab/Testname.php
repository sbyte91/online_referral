<?php

namespace common\models\lab;

use Yii;

/**
 * This is the model class for table "tbl_testname".
 *
 * @property int $testname_id
 * @property string $testName
 * @property int $status_id
 * @property string $create_time
 * @property string $update_time
 *
 * @property TestnameMethod[] $testnameMethods
 */
class Testname extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_testname';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('eulimsdb');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['testName', 'status_id'], 'required'],
            [['status_id'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['testName'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'testname_id' => 'Testname ID',
            'testName' => 'Test Name',
            'status_id' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestnameMethods()
    {
        return $this->hasMany(TestnameMethod::className(), ['testname_id' => 'testname_id']);
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getSampletypes()
    {
        return $this->hasMany(Sampletypetestname::className(), ['testname_id' => 'testname_id']);
    }
}
