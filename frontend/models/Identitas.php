<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%identitas}}".
 *
 * @property int $id
 * @property int|null $id_pengguna
 * @property string $nama
 * @property string $alamat
 * @property string $no_hp
 * @property string|null $no_wa
 * @property string|null $gambar
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $pengguna
 */
class Identitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%identitas}}';
    }
    /**
     * Buat Waktu/Timestamp
     * 
    */
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
            [['id_pengguna'], 'integer'],
            [['nama', 'alamat', 'no_hp'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'alamat', 'no_hp', 'no_wa'], 'string', 'max' => 255],
            [['gambar'], 'file', 'skipOnEmpty'=>TRUE,'extensions'=> ['jpg', 'png', 'jpeg']],
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
            'nama' => Yii::t('app', 'Nama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_hp' => Yii::t('app', 'No Hp'),
            'no_wa' => Yii::t('app', 'No Wa'),
            'gambar' => Yii::t('app', 'Gambar'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
