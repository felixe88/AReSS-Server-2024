<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriEncefaloCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriEncefaloCasiTable Test Case
 */
class TumoriEncefaloCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriEncefaloCasiTable
     */
    protected $TumoriEncefaloCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriEncefaloCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriEncefaloCasi') ? [] : ['className' => TumoriEncefaloCasiTable::class];
        $this->TumoriEncefaloCasi = $this->getTableLocator()->get('TumoriEncefaloCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriEncefaloCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriEncefaloCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
