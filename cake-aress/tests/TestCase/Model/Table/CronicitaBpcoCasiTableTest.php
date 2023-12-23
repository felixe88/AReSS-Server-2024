<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CronicitaBpcoCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CronicitaBpcoCasiTable Test Case
 */
class CronicitaBpcoCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CronicitaBpcoCasiTable
     */
    protected $CronicitaBpcoCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CronicitaBpcoCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CronicitaBpcoCasi') ? [] : ['className' => CronicitaBpcoCasiTable::class];
        $this->CronicitaBpcoCasi = $this->getTableLocator()->get('CronicitaBpcoCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CronicitaBpcoCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CronicitaBpcoCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
