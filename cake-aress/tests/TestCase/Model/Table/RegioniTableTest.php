<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegioniTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegioniTable Test Case
 */
class RegioniTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RegioniTable
     */
    protected $Regioni;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Regioni',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Regioni') ? [] : ['className' => RegioniTable::class];
        $this->Regioni = $this->getTableLocator()->get('Regioni', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Regioni);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RegioniTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
