<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriLeucemiaLinfaticaCronicaCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriLeucemiaLinfaticaCronicaCasiTable Test Case
 */
class TumoriLeucemiaLinfaticaCronicaCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriLeucemiaLinfaticaCronicaCasiTable
     */
    protected $TumoriLeucemiaLinfaticaCronicaCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriLeucemiaLinfaticaCronicaCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriLeucemiaLinfaticaCronicaCasi') ? [] : ['className' => TumoriLeucemiaLinfaticaCronicaCasiTable::class];
        $this->TumoriLeucemiaLinfaticaCronicaCasi = $this->getTableLocator()->get('TumoriLeucemiaLinfaticaCronicaCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriLeucemiaLinfaticaCronicaCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriLeucemiaLinfaticaCronicaCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
