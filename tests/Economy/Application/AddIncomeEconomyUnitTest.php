<?php

declare(strict_types=1);


namespace Tests\Economy\Application;


use Tests\Economy\Application\Request\AddEconomyIncomeRequestMother;

final class AddIncomeEconomyUnitTest extends EconomyUnitTestCase
{
    /**
    * @test
    * add_new_income
    */
    public function isShouldAddNewIncome(): void
    {
        $this->shouldAddIncome(AddEconomyIncomeRequestMother::random());
    }
}
