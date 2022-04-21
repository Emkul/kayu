<?php

namespace frontend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%gambar}}".
 *
 * @property int $id
 * @property int|null $id_barang
 * @property int|null $id_pengguna
 * @property string|null $gambar
 *
 * @property Barang $barang
 * @property User $pengguna
 */
class Gambar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%gambar}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_barang', 'id_pengguna'], 'integer'],
            [['gambar'], 'file', 'extensions' => 'jpg, png, jpeg' , 'maxFiles' => 7],
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
            'id_barang' => Yii::t('app', 'Id Barang'),
            'id_pengguna' => Yii::t('app', 'Id Pengguna'),
            'gambar' => Yii::t('app', 'Gambar'),
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
