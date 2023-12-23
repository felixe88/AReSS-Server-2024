<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriStomacoCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriStomacoCasiTable Test Case
 */
class TumoriStomacoCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriStomacoCasiTable
     */
    protected $TumoriStomacoCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriStomacoCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriStomacoCasi') ? [] : ['className' => TumoriStomacoCasiTable::class];
        $this->TumoriStomacoCasi = $this->getTableLocator()->get('TumoriStomacoCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriStomacoCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriStomacoCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
