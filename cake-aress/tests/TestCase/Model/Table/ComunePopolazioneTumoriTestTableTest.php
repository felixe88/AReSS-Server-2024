<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComunePopolazioneTumoriTestTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComunePopolazioneTumoriTestTable Test Case
 */
class ComunePopolazioneTumoriTestTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComunePopolazioneTumoriTestTable
     */
    protected $ComunePopolazioneTumoriTest;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ComunePopolazioneTumoriTest',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ComunePopolazioneTumoriTest') ? [] : ['className' => ComunePopolazioneTumoriTestTable::class];
        $this->ComunePopolazioneTumoriTest = $this->getTableLocator()->get('ComunePopolazioneTumoriTest', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ComunePopolazioneTumoriTest);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ComunePopolazioneTumoriTestTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
