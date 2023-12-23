<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CronicitaIpertensioneCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CronicitaIpertensioneCasiTable Test Case
 */
class CronicitaIpertensioneCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CronicitaIpertensioneCasiTable
     */
    protected $CronicitaIpertensioneCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CronicitaIpertensioneCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CronicitaIpertensioneCasi') ? [] : ['className' => CronicitaIpertensioneCasiTable::class];
        $this->CronicitaIpertensioneCasi = $this->getTableLocator()->get('CronicitaIpertensioneCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CronicitaIpertensioneCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CronicitaIpertensioneCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
