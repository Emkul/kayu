<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kategori}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220313_023049_create_kategori_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kategori}}', [
            'id' => $this->primaryKey(),
            'namakategori' => $this->string(25)->notNull(),
            'created_by' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-kategori-created_by}}',
            '{{%kategori}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-kategori-created_by}}',
            '{{%kategori}}',
            'created_by',
            '{{%user}}',
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
            '{{%fk-kategori-created_by}}',
            '{{%kategori}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-kategori-created_by}}',
            '{{%kategori}}'
        );

        $this->dropTable('{{%kategori}}');
    }
}
