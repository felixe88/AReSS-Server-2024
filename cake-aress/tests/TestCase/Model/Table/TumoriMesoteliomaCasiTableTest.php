<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriMesoteliomaCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriMesoteliomaCasiTable Test Case
 */
class TumoriMesoteliomaCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriMesoteliomaCasiTable
     */
    protected $TumoriMesoteliomaCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriMesoteliomaCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriMesoteliomaCasi') ? [] : ['className' => TumoriMesoteliomaCasiTable::class];
        $this->TumoriMesoteliomaCasi = $this->getTableLocator()->get('TumoriMesoteliomaCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriMesoteliomaCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriMesoteliomaCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
