<?php

use Phinx\Migration\AbstractMigration;

class TranslateTable extends AbstractMigration
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
        $translate = $this->table('i18n');
        $translate->addColumn('locale','string')
            ->addColumn('model','string')
            ->addColumn('foreign_key','integer')
            ->addColumn('field','string')
            ->addColumn('context','text')
            ->addIndex(array('locale','model','foreign_key','field'),array('unique' => 'true','name' => 'I18N_LOCALE_FIELD'))
            ->addIndex(array('model','foreign_key','field'),array('name' => 'I18N_FIELD'))
            ->save();
    }

    public function down()
    {
        $translate = $this->dropTable('i18n');
    }
}
