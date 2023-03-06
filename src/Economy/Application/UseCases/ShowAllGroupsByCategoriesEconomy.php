<?php

declare(strict_types=1);


namespace Src\Economy\Application\UseCases;


use Src\Economy\Application\Request\EconomyAccountUuidRequest;
use Src\Economy\Application\Response\EconomyResponse;

final class ShowAllGroupsByCategoriesEconomy
{
    public function __construct(
        private ShowEconomy $showEconomy
    )
    {
    }

    public function __invoke(EconomyAccountUuidRequest $request): EconomyResponse
    {
        $economy = ($this->showEconomy)($request);

        $management = $economy->getEconomicManagement();

        $management['incomes'] = $this->orderByCategory($economy->getEconomicManagement()['incomes']);
        $management['expenses'] = $this->orderByCategory($economy->getEconomicManagement()['expenses']);

        $economy->setEconomicManagement($management);

        return $economy;
    }

    private function orderByCategory(array $collections): array
    {
        $group = [];

        foreach ($collections as $collection) {
            $group[$collection['category']][] = $collection;
        }

        return $group;
    }
}
