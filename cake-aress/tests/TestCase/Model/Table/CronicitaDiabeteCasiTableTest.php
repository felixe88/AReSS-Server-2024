<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CronicitaDiabeteCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CronicitaDiabeteCasiTable Test Case
 */
class CronicitaDiabeteCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CronicitaDiabeteCasiTable
     */
    protected $CronicitaDiabeteCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CronicitaDiabeteCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CronicitaDiabeteCasi') ? [] : ['className' => CronicitaDiabeteCasiTable::class];
        $this->CronicitaDiabeteCasi = $this->getTableLocator()->get('CronicitaDiabeteCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CronicitaDiabeteCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CronicitaDiabeteCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
