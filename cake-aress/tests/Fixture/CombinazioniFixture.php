<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CombinazioniFixture
 */
class CombinazioniFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'combinazioni';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'classe_eta' => 1,
                'comuni' => 'Lorem ipsum dolor sit amet',
                'anno' => 1,
                'sesso' => 'Lorem ipsum dolor sit amet',
                'patologia' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
