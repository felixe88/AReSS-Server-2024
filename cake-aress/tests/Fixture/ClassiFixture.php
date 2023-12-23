<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClassiFixture
 */
class ClassiFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'classi';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'IDClasse' => 1,
                'classe_eta' => 'Lor',
                'peso_eu' => 1,
                'Gruppo_Tumori' => 'Lor',
                'Gruppo_Cronicita' => 'Lorem ipsum',
            ],
        ];
        parent::init();
    }
}
