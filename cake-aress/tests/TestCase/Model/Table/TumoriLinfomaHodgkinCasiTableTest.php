<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriLinfomaHodgkinCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriLinfomaHodgkinCasiTable Test Case
 */
class TumoriLinfomaHodgkinCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriLinfomaHodgkinCasiTable
     */
    protected $TumoriLinfomaHodgkinCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriLinfomaHodgkinCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriLinfomaHodgkinCasi') ? [] : ['className' => TumoriLinfomaHodgkinCasiTable::class];
        $this->TumoriLinfomaHodgkinCasi = $this->getTableLocator()->get('TumoriLinfomaHodgkinCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriLinfomaHodgkinCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriLinfomaHodgkinCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
