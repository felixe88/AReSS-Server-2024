<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriMielomaCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriMielomaCasiTable Test Case
 */
class TumoriMielomaCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriMielomaCasiTable
     */
    protected $TumoriMielomaCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriMielomaCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriMielomaCasi') ? [] : ['className' => TumoriMielomaCasiTable::class];
        $this->TumoriMielomaCasi = $this->getTableLocator()->get('TumoriMielomaCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriMielomaCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriMielomaCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
