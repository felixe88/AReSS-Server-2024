<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TumoriTesticoloCasiTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TumoriTesticoloCasiTable Test Case
 */
class TumoriTesticoloCasiTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TumoriTesticoloCasiTable
     */
    protected $TumoriTesticoloCasi;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TumoriTesticoloCasi',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TumoriTesticoloCasi') ? [] : ['className' => TumoriTesticoloCasiTable::class];
        $this->TumoriTesticoloCasi = $this->getTableLocator()->get('TumoriTesticoloCasi', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TumoriTesticoloCasi);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TumoriTesticoloCasiTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
