<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriLeucemiaMieloideCronicaCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriLeucemiaMieloideCronicaCasiTable Test Case
 */
class TumoriLeucemiaMieloideCronicaCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriLeucemiaMieloideCronicaCasiTable
     */
    protected $TumoriLeucemiaMieloideCronicaCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriLeucemiaMieloideCronicaCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriLeucemiaMieloideCronicaCasi') ? [] : ['className' => TumoriLeucemiaMieloideCronicaCasiTable::class];
        $this->TumoriLeucemiaMieloideCronicaCasi = $this->getTableLocator()->get('TumoriLeucemiaMieloideCronicaCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriLeucemiaMieloideCronicaCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriLeucemiaMieloideCronicaCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
