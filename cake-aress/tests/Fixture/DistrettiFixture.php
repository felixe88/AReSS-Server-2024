<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DistrettiFixture
 */
class DistrettiFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'distretti';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IDDistretto' => 1,
                'Descrizione' => 'Lorem ipsum dolor si',
                'IDAsl' => 1,
                'CapSede' => 1,
                'ProvinciaSigla' => 'Lo',
            ],
        ];
        parent::init();
    }
}
