<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DistrettiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DistrettiTable Test Case
 */
class DistrettiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DistrettiTable
     */
    protected $Distretti;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Distretti',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Distretti') ? [] : ['className' => DistrettiTable::class];
        $this->Distretti = $this->getTableLocator()->get('Distretti', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Distretti);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DistrettiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
