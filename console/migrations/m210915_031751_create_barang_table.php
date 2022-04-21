<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%barang}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210915_031751_create_barang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%barang}}', [
            'id' => $this->primaryKey(),
            'jenis' => $this->integer(),
            'judul' => $this->string()->notNull(),
            'harga' => $this->integer(11)->notNull(),
            'keterangan' => $this->text()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'pengiklan' => $this->integer(),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'ukuran' => $this->string(6),
            'alamat' => $this->string(50),
            'jumlah' => $this->integer(5),
            'mobil' => $this->string(50),
            'sopir' => $this->string(50),
            'no_hp' => $this->string(20),
            'no_wa' => $this->string(20),
        ]);

        // creates index for column `pengiklan`
        $this->createIndex(
            '{{%idx-barang-pengiklan}}',
            '{{%barang}}',
            'pengiklan'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-barang-pengiklan}}',
            '{{%barang}}',
            'pengiklan',
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
            '{{%fk-barang-pengiklan}}',
            '{{%barang}}'
        );

        // drops index for column `pengiklan`
        $this->dropIndex(
            '{{%idx-barang-pengiklan}}',
            '{{%barang}}'
        );

        $this->dropTable('{{%barang}}');
    }
}
