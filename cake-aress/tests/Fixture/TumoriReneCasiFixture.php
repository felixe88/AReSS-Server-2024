<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TumoriReneCasiFixture
 */
class TumoriReneCasiFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tumori_rene_casi';
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
