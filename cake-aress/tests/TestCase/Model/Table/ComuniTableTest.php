<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComuniTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComuniTable Test Case
 */
class ComuniTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComuniTable
     */
    protected $Comuni;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Comuni',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Comuni') ? [] : ['className' => ComuniTable::class];
        $this->Comuni = $this->getTableLocator()->get('Comuni', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Comuni);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ComuniTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
