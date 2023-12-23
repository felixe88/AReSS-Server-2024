<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PatologieFixture
 */
class PatologieFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'patologie';
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
                'patologia' => 'Lorem ipsum dolor sit am',
                'sezione' => 'Lorem i',
            ],
        ];
        parent::init();
    }
}
