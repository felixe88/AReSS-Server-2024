<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriLeucemiaMieloideAcutaCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriLeucemiaMieloideAcutaCasiTable Test Case
 */
class TumoriLeucemiaMieloideAcutaCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriLeucemiaMieloideAcutaCasiTable
     */
    protected $TumoriLeucemiaMieloideAcutaCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriLeucemiaMieloideAcutaCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriLeucemiaMieloideAcutaCasi') ? [] : ['className' => TumoriLeucemiaMieloideAcutaCasiTable::class];
        $this->TumoriLeucemiaMieloideAcutaCasi = $this->getTableLocator()->get('TumoriLeucemiaMieloideAcutaCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriLeucemiaMieloideAcutaCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriLeucemiaMieloideAcutaCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
