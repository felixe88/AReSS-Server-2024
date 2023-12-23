<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassiTable Test Case
 */
class ClassiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassiTable
     */
    protected $Classi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Classi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Classi') ? [] : ['className' => ClassiTable::class];
        $this->Classi = $this->getTableLocator()->get('Classi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Classi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClassiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
