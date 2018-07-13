<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Books".
 *
 * @property int $id
 * @property string $name
 * @property string $author
 * @property int $pages
 * @property string $description
 * @property string $image
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pages'], 'integer'],
            [['description'], 'string'],
            [['name', 'author', 'image'], 'string', 'max' => 255],
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
            'author' => 'Author',
            'pages' => 'Pages',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? (Yii::getAlias('@web/uploads/'). $this->image) : (Yii::getAlias('@web/'). 'no-image.png');
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();

        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();

        return parent::beforeDelete();
    }
}
