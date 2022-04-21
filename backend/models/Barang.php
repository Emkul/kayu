<?php

namespace backend\models;

use common\models\User;
use frontend\models\Cart;
use frontend\models\Gambar;
use Yii;

/**
 * This is the model class for table "{{%barang}}".
 *
 * @property int $id
 * @property int|null $jenis
 * @property string $judul
 * @property int $harga
 * @property string $keterangan
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $pengiklan
 * @property int|null $is_deleted
 * @property int|null $published
 * @property string|null $ukuran
 * @property string|null $alamat
 * @property int|null $jumlah
 * @property string|null $mobil
 * @property string|null $sopir
 * @property string|null $no_hp
 * @property string|null $no_wa
 *
 * @property Cart[] $carts
 * @property Gambar[] $gambars
 * @property User $pengiklan0
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%barang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis', 'harga', 'pengiklan', 'is_deleted', 'published', 'jumlah'], 'integer'],
            [['judul', 'harga', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['judul'], 'string', 'max' => 255],
            [['ukuran'], 'string', 'max' => 6],
            [['alamat', 'mobil', 'sopir'], 'string', 'max' => 50],
            [['no_hp', 'no_wa'], 'string', 'max' => 20],
            [['pengiklan'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['pengiklan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'jenis' => Yii::t('app', 'Jenis'),
            'judul' => Yii::t('app', 'Judul'),
            'harga' => Yii::t('app', 'Harga'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'pengiklan' => Yii::t('app', 'Pengiklan'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'published' => Yii::t('app', 'Published'),
            'ukuran' => Yii::t('app', 'Ukuran'),
            'alamat' => Yii::t('app', 'Alamat'),
            'jumlah' => Yii::t('app', 'Jumlah'),
            'mobil' => Yii::t('app', 'Mobil'),
            'sopir' => Yii::t('app', 'Sopir'),
            'no_hp' => Yii::t('app', 'No Hp'),
            'no_wa' => Yii::t('app', 'No Wa'),
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['id_barang' => 'id']);
    }

    /**
     * Gets query for [[Gambars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGambars()
    {
        return $this->hasMany(Gambar::className(), ['id_barang' => 'id']);
    }

    /**
     * Gets query for [[Pengiklan0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengiklan0()
    {
        return $this->hasOne(User::className(), ['id' => 'pengiklan']);
    }
}
