<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property int $id
 * @property int|null $id_pengguna
 * @property int|null $id_barang
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Barang $barang
 * @property User $pengguna
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }
    public function behaviors()
    {
        return 
        [
            [
                'class' => TimestampBehavior::className(),
                'value' => new \yii\db\Expression( 'NOW()' ),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna', 'id_barang'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['id_barang' => 'id']],
            [['id_pengguna'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_pengguna' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pengguna' => Yii::t('app', 'Id Pengguna'),
            'id_barang' => Yii::t('app', 'Id Barang'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Barang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'id_barang']);
    }

    /**
     * Gets query for [[Pengguna]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengguna()
    {
        return $this->hasOne(User::className(), ['id' => 'id_pengguna']);
    }
}
