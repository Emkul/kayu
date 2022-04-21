<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%barang}}`
 */
class m211022_120014_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'id_pengguna' => $this->integer(),
            'id_barang' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `id_pengguna`
        $this->createIndex(
            '{{%idx-cart-id_pengguna}}',
            '{{%cart}}',
            'id_pengguna'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-cart-id_pengguna}}',
            '{{%cart}}',
            'id_pengguna',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_barang`
        $this->createIndex(
            '{{%idx-cart-id_barang}}',
            '{{%cart}}',
            'id_barang'
        );

        // add foreign key for table `{{%barang}}`
        $this->addForeignKey(
            '{{%fk-cart-id_barang}}',
            '{{%cart}}',
            'id_barang',
            '{{%barang}}',
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
            '{{%fk-cart-id_pengguna}}',
            '{{%cart}}'
        );

        // drops index for column `id_pengguna`
        $this->dropIndex(
            '{{%idx-cart-id_pengguna}}',
            '{{%cart}}'
        );

        // drops foreign key for table `{{%barang}}`
        $this->dropForeignKey(
            '{{%fk-cart-id_barang}}',
            '{{%cart}}'
        );

        // drops index for column `id_barang`
        $this->dropIndex(
            '{{%idx-cart-id_barang}}',
            '{{%cart}}'
        );

        $this->dropTable('{{%cart}}');
    }
}
