<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AslTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AslTable Test Case
 */
class AslTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AslTable
     */
    protected $Asl;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Asl',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Asl') ? [] : ['className' => AslTable::class];
        $this->Asl = $this->getTableLocator()->get('Asl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Asl);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AslTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
