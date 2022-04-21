<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laporan}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%barang}}`
 * - `{{%user}}`
 */
class m220313_024042_create_laporan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%laporan}}', [
            'id' => $this->primaryKey(),
            'id_barang' => $this->integer(),
            'id_user' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `id_barang`
        $this->createIndex(
            '{{%idx-laporan-id_barang}}',
            '{{%laporan}}',
            'id_barang'
        );

        // add foreign key for table `{{%barang}}`
        $this->addForeignKey(
            '{{%fk-laporan-id_barang}}',
            '{{%laporan}}',
            'id_barang',
            '{{%barang}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-laporan-id_user}}',
            '{{%laporan}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-laporan-id_user}}',
            '{{%laporan}}',
            'id_user',
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
            '{{%fk-laporan-id_barang}}',
            '{{%laporan}}'
        );

        // drops index for column `id_barang`
        $this->dropIndex(
            '{{%idx-laporan-id_barang}}',
            '{{%laporan}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-laporan-id_user}}',
            '{{%laporan}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-laporan-id_user}}',
            '{{%laporan}}'
        );

        $this->dropTable('{{%laporan}}');
    }
}
