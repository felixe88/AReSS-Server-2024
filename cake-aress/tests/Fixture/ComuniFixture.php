<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComuniFixture
 */
class ComuniFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'comuni';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IDComune' => 1,
                'Descrizione' => 'Lorem ipsum dolor sit ame',
                'IDDistretto' => 1,
            ],
        ];
        parent::init();
    }
}
