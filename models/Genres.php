<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genres".
 *
 * @property int $id
 * @property string $name
 *
 * @property MangaGenres[] $mangaGenres
 * @property Manga[] $mangas
 */
class Genres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[MangaGenres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaGenres()
    {
        return $this->hasMany(MangaGenres::className(), ['genre_id' => 'id']);
    }

    /**
     * Gets query for [[Mangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangas()
    {
        return $this->hasMany(Manga::className(), ['id' => 'manga_id'])->viaTable('manga_genres', ['genre_id' => 'id']);
    }
}
