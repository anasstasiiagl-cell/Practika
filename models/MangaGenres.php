<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manga_genres".
 *
 * @property int $manga_id
 * @property int $genre_id
 *
 * @property Genres $genre
 * @property Manga $manga
 */
class MangaGenres extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manga_genres';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manga_id', 'genre_id'], 'required'],
            [['manga_id', 'genre_id'], 'integer'],
            [['manga_id', 'genre_id'], 'unique', 'targetAttribute' => ['manga_id', 'genre_id']],
            [['manga_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manga::className(), 'targetAttribute' => ['manga_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genres::className(), 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'manga_id' => 'Manga ID',
            'genre_id' => 'Genre ID',
        ];
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genres::className(), ['id' => 'genre_id']);
    }

    /**
     * Gets query for [[Manga]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManga()
    {
        return $this->hasOne(Manga::className(), ['id' => 'manga_id']);
    }
}
