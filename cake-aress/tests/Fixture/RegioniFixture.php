<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegioniFixture
 */
class RegioniFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'regioni';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IDRegione' => 1,
                'Descrizione' => 'Lore',
            ],
        ];
        parent::init();
    }
}
