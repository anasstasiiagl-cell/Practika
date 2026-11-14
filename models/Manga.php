<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "manga".
 *
 * @property int $id
 * @property string $title
 * @property string|null $author
 * @property string|null $description
 * @property string|null $manga_type
 * @property int|null $release_year
 * @property int|null $total_volumes
 * @property string|null $cover
 * @property float|null $rating
 * @property string|null $created_at
 *
 * @property Genres[] $genres
 * @property MangaGenres[] $mangaGenres
 * @property UserManga[] $userMangas
 * @property Users[] $users
 */
class Manga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'manga_type'], 'string'],
            [['release_year', 'total_volumes'], 'integer'],
            [['rating'], 'number'],
            [['created_at'], 'safe'],
            [['title', 'cover'], 'string', 'max' => 255],
            [['author'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'description' => 'Description',
            'manga_type' => 'Manga Type',
            'release_year' => 'Release Year',
            'total_volumes' => 'Total Volumes',
            'cover' => 'Cover',
            'rating' => 'Rating',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Genres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genres::className(), ['id' => 'genre_id'])->viaTable('manga_genres', ['manga_id' => 'id']);
    }

    /**
     * Gets query for [[MangaGenres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMangaGenres()
    {
        return $this->hasMany(MangaGenres::className(), ['manga_id' => 'id']);
    }

    /**
     * Gets query for [[UserMangas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserMangas()
    {
        return $this->hasMany(UserManga::className(), ['manga_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['id' => 'user_id'])->viaTable('user_manga', ['manga_id' => 'id']);
    }
}
