<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriTiroideCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriTiroideCasiTable Test Case
 */
class TumoriTiroideCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriTiroideCasiTable
     */
    protected $TumoriTiroideCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriTiroideCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriTiroideCasi') ? [] : ['className' => TumoriTiroideCasiTable::class];
        $this->TumoriTiroideCasi = $this->getTableLocator()->get('TumoriTiroideCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriTiroideCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriTiroideCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
