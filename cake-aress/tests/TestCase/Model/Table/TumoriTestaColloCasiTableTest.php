<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriTestaColloCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriTestaColloCasiTable Test Case
 */
class TumoriTestaColloCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriTestaColloCasiTable
     */
    protected $TumoriTestaColloCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriTestaColloCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriTestaColloCasi') ? [] : ['className' => TumoriTestaColloCasiTable::class];
        $this->TumoriTestaColloCasi = $this->getTableLocator()->get('TumoriTestaColloCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriTestaColloCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriTestaColloCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
