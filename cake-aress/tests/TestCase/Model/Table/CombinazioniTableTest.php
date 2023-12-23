<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CombinazioniTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CombinazioniTable Test Case
 */
class CombinazioniTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CombinazioniTable
     */
    protected $Combinazioni;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Combinazioni',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Combinazioni') ? [] : ['className' => CombinazioniTable::class];
        $this->Combinazioni = $this->getTableLocator()->get('Combinazioni', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Combinazioni);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CombinazioniTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
