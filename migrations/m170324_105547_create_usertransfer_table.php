<?php

use yii\db\Migration;

/**
 * Handles the creation of table `usertransfer`.
 */
class m170324_105547_create_usertransfer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('usertransfer', [
            'id' => $this->primaryKey(),
            'from_user_id' => $this->integer(),
            'from_username' => $this->string(),
            'to_user_id' => $this->integer(),
            'to_username' => $this->string(),
            'summa' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('usertransfer');
    }
}
