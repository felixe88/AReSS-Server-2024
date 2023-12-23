<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatologieTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatologieTable Test Case
 */
class PatologieTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PatologieTable
     */
    protected $Patologie;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Patologie',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Patologie') ? [] : ['className' => PatologieTable::class];
        $this->Patologie = $this->getTableLocator()->get('Patologie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Patologie);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PatologieTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
