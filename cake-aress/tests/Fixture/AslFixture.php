<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AslFixture
 */
class AslFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'asl';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IDAsl' => 1,
                'Descrizione' => 'Lorem ',
                'IDRegione' => 1,
            ],
        ];
        parent::init();
    }
}
