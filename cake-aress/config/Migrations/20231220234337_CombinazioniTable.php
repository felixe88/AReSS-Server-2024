<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CombinazioniTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('combinazioni');
        $table->addColumn('classe_eta', 'integer')
              ->addColumn('comuni', 'string', ['limit' => 255])
              ->addColumn('anno', 'integer')
              ->addColumn('sesso', 'string', ['limit' => 255])
              ->addColumn('patologia', 'string', ['limit' => 255])
              ->create();
    }
}
