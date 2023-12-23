<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TumoriPolmoneCasiFixture
 */
class TumoriPolmoneCasiFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tumori_polmone_casi';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IDPatologia' => 1,
                'IDComunePop' => 1,
                'casi' => 1,
            ],
        ];
        parent::init();
    }
}
