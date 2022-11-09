<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Domain;


final class Database
{
    public function __construct(
        private ?array $databases_tables,
        private ?array $database_data,
    )
    {
    }

    /**
     * @return null|array
     */
    public function getDatabasesTables(): ?array
    {
        return $this->databases_tables;
    }

    /**
     * @return null|array
     */
    public function getDatabaseData(): ?array
    {
        return $this->database_data;
    }


}
