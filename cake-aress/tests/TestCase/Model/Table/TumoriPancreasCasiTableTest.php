<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriPancreasCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriPancreasCasiTable Test Case
 */
class TumoriPancreasCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriPancreasCasiTable
     */
    protected $TumoriPancreasCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriPancreasCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriPancreasCasi') ? [] : ['className' => TumoriPancreasCasiTable::class];
        $this->TumoriPancreasCasi = $this->getTableLocator()->get('TumoriPancreasCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriPancreasCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriPancreasCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
