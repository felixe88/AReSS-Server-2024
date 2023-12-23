<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriLeucemiaLinfaticaAcutaCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriLeucemiaLinfaticaAcutaCasiTable Test Case
 */
class TumoriLeucemiaLinfaticaAcutaCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriLeucemiaLinfaticaAcutaCasiTable
     */
    protected $TumoriLeucemiaLinfaticaAcutaCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriLeucemiaLinfaticaAcutaCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriLeucemiaLinfaticaAcutaCasi') ? [] : ['className' => TumoriLeucemiaLinfaticaAcutaCasiTable::class];
        $this->TumoriLeucemiaLinfaticaAcutaCasi = $this->getTableLocator()->get('TumoriLeucemiaLinfaticaAcutaCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriLeucemiaLinfaticaAcutaCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriLeucemiaLinfaticaAcutaCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
