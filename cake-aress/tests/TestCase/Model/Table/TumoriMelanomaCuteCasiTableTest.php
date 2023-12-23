<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriMelanomaCuteCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriMelanomaCuteCasiTable Test Case
 */
class TumoriMelanomaCuteCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriMelanomaCuteCasiTable
     */
    protected $TumoriMelanomaCuteCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriMelanomaCuteCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriMelanomaCuteCasi') ? [] : ['className' => TumoriMelanomaCuteCasiTable::class];
        $this->TumoriMelanomaCuteCasi = $this->getTableLocator()->get('TumoriMelanomaCuteCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriMelanomaCuteCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriMelanomaCuteCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
