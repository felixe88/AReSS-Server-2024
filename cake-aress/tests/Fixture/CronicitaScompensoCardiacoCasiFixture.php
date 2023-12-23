<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CronicitaScompensoCardiacoCasiFixture
 */
class CronicitaScompensoCardiacoCasiFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cronicita_scompenso_cardiaco_casi';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IDComunePop' => 1,
                'IDPatologia' => 1,
                'casi' => 1,
            ],
        ];
        parent::init();
    }
}
