<?php

declare(strict_types=1);

namespace __BasePath__\__ModuleName__\Infrastructure\Persistence\ORM;

use __BasePath__\__ModuleName__\Domain\__ModuleName__\__ModuleName__;
use __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories\__ModuleName__Repository;

// -- uses of vo -- //

final class __ModuleName__MYSQLRepository implements __ModuleName__Repository
{

    public function __construct(private __ModuleName__ORMModel $model)
    {
    }

    public function show(/* __ModuleName__IdVO */ $id): ?__ModuleName__
    {
        $query = $this->model->find($id->value());
        return self::fillDataMapper($query);
    }

    public function showAll(): array
    {
        $eloquent___ModuleMinUnderscoreNameWithPlural__ = $this->model->all();
        $__ModuleMinUnderscoreNameWithPlural__               = [];

        foreach ($eloquent___ModuleMinUnderscoreNameWithPlural__ as $eloquent___ModuleMinUnderscoreName__) {
            $__ModuleMinUnderscoreNameWithPlural__[] = self::fillDataMapper($eloquent___ModuleMinUnderscoreName__);
        }
        return $__ModuleMinUnderscoreNameWithPlural__;

    }

    public function save(__ModuleName__ $__ModuleMinUnderscoreName__): /* __ModuleName__IdVO */
    {
        $response    = $this->model->create($__ModuleMinUnderscoreName__->getPrimitives());
        return new /* __ModuleName__IdVO */($response->id);
    }

    public function update(__ModuleName__ $__ModuleMinUnderscoreName__): void
    {
        $update___ModuleMinUnderscoreName__ = $this->model->find($__ModuleMinUnderscoreName__->getId()->value());
        $update___ModuleMinUnderscoreName__->update($__ModuleMinUnderscoreName__->getPrimitives());

    }

    public function delete(/* __ModuleName__IdVO */ $id): void
    {
        $__ModuleMinUnderscoreName__ = $this->model->find($id->value());
        $__ModuleMinUnderscoreName__->delete();
    }

    private static function fillDataMapper($__ModuleMinUnderscoreName__): ?__ModuleName__
    {
        return $__ModuleMinUnderscoreName__ ? new __ModuleName__(
// -- fill data mapper with new vo parameters -- //
        ) : null;
    }
}
