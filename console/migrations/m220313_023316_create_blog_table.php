<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%kategori}}`
 */
class m220313_023316_create_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'judul' => $this->string()->notNull(),
            'konten' => $this->text(),
            'created_by' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'kategori' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-blog-created_by}}',
            '{{%blog}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-blog-created_by}}',
            '{{%blog}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `kategori`
        $this->createIndex(
            '{{%idx-blog-kategori}}',
            '{{%blog}}',
            'kategori'
        );

        // add foreign key for table `{{%kategori}}`
        $this->addForeignKey(
            '{{%fk-blog-kategori}}',
            '{{%blog}}',
            'kategori',
            '{{%kategori}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-blog-created_by}}',
            '{{%blog}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-blog-created_by}}',
            '{{%blog}}'
        );

        // drops foreign key for table `{{%kategori}}`
        $this->dropForeignKey(
            '{{%fk-blog-kategori}}',
            '{{%blog}}'
        );

        // drops index for column `kategori`
        $this->dropIndex(
            '{{%idx-blog-kategori}}',
            '{{%blog}}'
        );

        $this->dropTable('{{%blog}}');
    }
}
