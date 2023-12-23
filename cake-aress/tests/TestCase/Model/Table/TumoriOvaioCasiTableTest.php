<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriOvaioCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriOvaioCasiTable Test Case
 */
class TumoriOvaioCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriOvaioCasiTable
     */
    protected $TumoriOvaioCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriOvaioCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriOvaioCasi') ? [] : ['className' => TumoriOvaioCasiTable::class];
        $this->TumoriOvaioCasi = $this->getTableLocator()->get('TumoriOvaioCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriOvaioCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriOvaioCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
