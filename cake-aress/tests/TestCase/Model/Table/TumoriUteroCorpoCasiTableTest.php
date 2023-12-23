<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriUteroCorpoCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriUteroCorpoCasiTable Test Case
 */
class TumoriUteroCorpoCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriUteroCorpoCasiTable
     */
    protected $TumoriUteroCorpoCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriUteroCorpoCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriUteroCorpoCasi') ? [] : ['className' => TumoriUteroCorpoCasiTable::class];
        $this->TumoriUteroCorpoCasi = $this->getTableLocator()->get('TumoriUteroCorpoCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriUteroCorpoCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriUteroCorpoCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
