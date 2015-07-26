<?php

use Phinx\Migration\AbstractMigration;

class Inicial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('name','string')
            ->addColumn('email','string')
            ->addColumn('telephone','string')
            ->addColumn('created','datetime')
            ->addColumn('modified','datetime')
            ->save();
    }

    public function down()
    {
        $users = $this->dropTable('users');
    }
}
