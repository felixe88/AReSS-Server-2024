<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriLinfomaNonHodgkinCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriLinfomaNonHodgkinCasiTable Test Case
 */
class TumoriLinfomaNonHodgkinCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriLinfomaNonHodgkinCasiTable
     */
    protected $TumoriLinfomaNonHodgkinCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriLinfomaNonHodgkinCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriLinfomaNonHodgkinCasi') ? [] : ['className' => TumoriLinfomaNonHodgkinCasiTable::class];
        $this->TumoriLinfomaNonHodgkinCasi = $this->getTableLocator()->get('TumoriLinfomaNonHodgkinCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriLinfomaNonHodgkinCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriLinfomaNonHodgkinCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
