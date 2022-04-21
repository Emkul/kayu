<?php

namespace frontend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property int $id
 * @property string $judul
 * @property string|null $konten
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $kategori
 *
 * @property User $createdBy
 * @property Kategori $kategori0
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul'], 'required'],
            [['konten'], 'string'],
            [['created_by', 'kategori'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['judul'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['kategori'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['kategori' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'judul' => Yii::t('app', 'Judul'),
            'konten' => Yii::t('app', 'Konten'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'kategori' => Yii::t('app', ''),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Kategori0]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getKategori0()
    // {
    //     return $this->hasOne(Kategori::className(), ['id' => 'kategori']);
    // }
}
