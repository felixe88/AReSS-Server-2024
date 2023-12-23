<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriColonRettoCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriColonRettoCasiTable Test Case
 */
class TumoriColonRettoCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriColonRettoCasiTable
     */
    protected $TumoriColonRettoCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriColonRettoCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriColonRettoCasi') ? [] : ['className' => TumoriColonRettoCasiTable::class];
        $this->TumoriColonRettoCasi = $this->getTableLocator()->get('TumoriColonRettoCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriColonRettoCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriColonRettoCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
