<?php

use yii\db\Migration;

/**
 * Handles the creation of table `books`.
 */
class m180713_052639_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'author' => $this->string(),
            'pages' => $this->integer(),
            'description' => $this->text(),
            'image' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('books');
    }
}
