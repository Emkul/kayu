<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%identitas}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210914_133109_create_identitas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%identitas}}', [
            'id' => $this->primaryKey(),
            'id_pengguna' => $this->integer(),
            'nama' => $this->string()->notNull(),
            'alamat' => $this->string()->notNull(),
            'no_hp' => $this->string()->notNull(),
            'no_wa' => $this->string(),
            'gambar' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `id_pengguna`
        $this->createIndex(
            '{{%idx-identitas-id_pengguna}}',
            '{{%identitas}}',
            'id_pengguna'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-identitas-id_pengguna}}',
            '{{%identitas}}',
            'id_pengguna',
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
            '{{%fk-identitas-id_pengguna}}',
            '{{%identitas}}'
        );

        // drops index for column `id_pengguna`
        $this->dropIndex(
            '{{%idx-identitas-id_pengguna}}',
            '{{%identitas}}'
        );

        $this->dropTable('{{%identitas}}');
    }
}
