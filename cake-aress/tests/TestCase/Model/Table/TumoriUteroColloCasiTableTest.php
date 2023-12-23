<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriUteroColloCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriUteroColloCasiTable Test Case
 */
class TumoriUteroColloCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriUteroColloCasiTable
     */
    protected $TumoriUteroColloCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriUteroColloCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriUteroColloCasi') ? [] : ['className' => TumoriUteroColloCasiTable::class];
        $this->TumoriUteroColloCasi = $this->getTableLocator()->get('TumoriUteroColloCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriUteroColloCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriUteroColloCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
