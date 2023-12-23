<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComunePopolazioneTumoriTestFixture
 */
class ComunePopolazioneTumoriTestFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'comune_popolazione_tumori_test';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'ID' => 1,
                'IDComune' => 1,
                'IDClasse' => 1,
                'anno' => 1,
                'sesso' => 'Lorem',
                'popolazione' => 1,
            ],
        ];
        parent::init();
    }
}
