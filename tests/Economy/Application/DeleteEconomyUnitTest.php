<?php

namespace Tests\Economy\Application;


use Tests\Economy\Application\Request\DeleteEconomyRequestMother;

class DeleteEconomyUnitTest extends EconomyUnitTestCase
{
    /**
     * @test
     */
    public function should_delete_Economy(): void
    {
        $this->shouldDelete(DeleteEconomyRequestMother::random());
    }
}
