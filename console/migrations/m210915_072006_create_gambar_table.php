<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gambar}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%barang}}`
 * - `{{%user}}`
 */
class m210915_072006_create_gambar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gambar}}', [
            'id' => $this->primaryKey(),
            'id_barang' => $this->integer(),
            'id_pengguna' => $this->integer(),
            'gambar' => $this->string(30),
        ]);

        // creates index for column `id_barang`
        $this->createIndex(
            '{{%idx-gambar-id_barang}}',
            '{{%gambar}}',
            'id_barang'
        );

        // add foreign key for table `{{%barang}}`
        $this->addForeignKey(
            '{{%fk-gambar-id_barang}}',
            '{{%gambar}}',
            'id_barang',
            '{{%barang}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_pengguna`
        $this->createIndex(
            '{{%idx-gambar-id_pengguna}}',
            '{{%gambar}}',
            'id_pengguna'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-gambar-id_pengguna}}',
            '{{%gambar}}',
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
        // drops foreign key for table `{{%barang}}`
        $this->dropForeignKey(
            '{{%fk-gambar-id_barang}}',
            '{{%gambar}}'
        );

        // drops index for column `id_barang`
        $this->dropIndex(
            '{{%idx-gambar-id_barang}}',
            '{{%gambar}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-gambar-id_pengguna}}',
            '{{%gambar}}'
        );

        // drops index for column `id_pengguna`
        $this->dropIndex(
            '{{%idx-gambar-id_pengguna}}',
            '{{%gambar}}'
        );

        $this->dropTable('{{%gambar}}');
    }
}
