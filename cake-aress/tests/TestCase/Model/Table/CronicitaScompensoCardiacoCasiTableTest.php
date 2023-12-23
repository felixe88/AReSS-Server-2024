<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CronicitaScompensoCardiacoCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CronicitaScompensoCardiacoCasiTable Test Case
 */
class CronicitaScompensoCardiacoCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CronicitaScompensoCardiacoCasiTable
     */
    protected $CronicitaScompensoCardiacoCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CronicitaScompensoCardiacoCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CronicitaScompensoCardiacoCasi') ? [] : ['className' => CronicitaScompensoCardiacoCasiTable::class];
        $this->CronicitaScompensoCardiacoCasi = $this->getTableLocator()->get('CronicitaScompensoCardiacoCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CronicitaScompensoCardiacoCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CronicitaScompensoCardiacoCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
