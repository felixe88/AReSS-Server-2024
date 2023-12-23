<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriFegatoCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriFegatoCasiTable Test Case
 */
class TumoriFegatoCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriFegatoCasiTable
     */
    protected $TumoriFegatoCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriFegatoCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriFegatoCasi') ? [] : ['className' => TumoriFegatoCasiTable::class];
        $this->TumoriFegatoCasi = $this->getTableLocator()->get('TumoriFegatoCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriFegatoCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriFegatoCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
