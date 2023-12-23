<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriPolmoneCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriPolmoneCasiTable Test Case
 */
class TumoriPolmoneCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriPolmoneCasiTable
     */
    protected $TumoriPolmoneCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriPolmoneCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriPolmoneCasi') ? [] : ['className' => TumoriPolmoneCasiTable::class];
        $this->TumoriPolmoneCasi = $this->getTableLocator()->get('TumoriPolmoneCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriPolmoneCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriPolmoneCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
