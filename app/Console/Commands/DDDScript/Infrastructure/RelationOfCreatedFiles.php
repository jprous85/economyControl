<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Infrastructure;


use App\Console\Commands\DDDScript\Application\UseCases\DDD\DDDSkeletonStructure;
use App\Console\Commands\DDDScript\Application\UseCases\DDD\DDDTestSkeletonStructure;
use App\Console\Commands\DDDScript\Domain\DDD;
use Illuminate\Console\Command;

final class RelationOfCreatedFiles
{
    private DDDSkeletonStructure     $structure;
    private DDDTestSkeletonStructure $test_structure;

    public function __construct(private Command $command, private DDD $ddd)
    {
        $this->structure      = new DDDSkeletonStructure($this->ddd, false);
        $this->test_structure = new DDDTestSkeletonStructure($this->ddd, false);

        $this->relationOfCreatedFiles();
    }

    private function relationOfCreatedFiles()
    {
        $this->command->info("Module created successfully!");

        $this->command->newLine(2);
        $this->command->comment('LIST OF FILES CREATED:');
        $this->command->comment("/src");
        $this->command->comment("../" . $this->ddd->getModuleName());

        foreach ($this->structure->getStructure($this->ddd->getModuleName()) as $main => $mainDirectory) {

            // INFRASTRUCTURE, APPLICATION, DOMAIN Folders

            $this->command->comment('  |../' . $main);
            foreach ($mainDirectory as $mainFolder => $directory) {

                // INFRASTRUCTURE: (CONTROLLERS, PERSISTENCE)
                // APPLICATION: (REQUEST, RESPONSE, USE CASES)
                // DOMAIN: (MODULE NAME FOLDER)

                if (is_array($directory)) {
                    $this->command->comment('  |  |../' . $mainFolder);
                    foreach ($directory as $subFolder => $fileOrDirectory) {

                        // INFRASTRUCTURE - PERSISTENCE: (ORM, FILES)
                        // APPLICATION: (FILES)
                        // DOMAIN: (EVENT, REPOSITORIES && VALUE OBJECTS FOLDERS)

                        if (is_array($fileOrDirectory)) {
                            $this->command->comment('  |  |  |../' . $subFolder);
                            foreach ($fileOrDirectory as $subFile) {
                                $this->command->comment('  |  |  |  |..' . $subFile);
                            }
                        } else {
                            $this->command->comment('  |  |  |../' . $fileOrDirectory);
                            if ($fileOrDirectory == 'ValueObjects' && $this->ddd->getVo()) {
                                foreach ($this->ddd->getVo() as $vo) {
                                    $this->command->comment('  |  |  |  |..' . $vo['vo_name']);
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($this->ddd->getTest()) {

            $this->command->newLine(2);
            $this->command->comment('LIST OF FILES CREATED IN TEST:');
            $this->command->comment("/tests");
            $this->command->comment("../" . $this->ddd->getModuleName());

            foreach ($this->test_structure->getTestStructure($this->ddd->getModuleName()) as $main => $mainDirectory) {
                $this->command->comment('  |../' . $main);
                if (is_array($mainDirectory)) {
                    foreach ($mainDirectory as $directory => $mainFolder) {
                        if (is_array($mainFolder)) {
                            $this->command->comment('  |  |../' . $directory);
                            foreach ($mainFolder as $mainFile => $file) {
                                if (is_array($file)) {
                                    $this->command->comment('  |  |  |../' . $mainFile);
                                    foreach ($file as $key => $item) {
                                        $this->command->comment('  |  |  |  |..' . $item);
                                    }
                                } else {
                                    $this->command->comment('  |  |  |../' . $file);
                                    if ($file == 'ValueObjects' && $this->ddd->getVo()) {
                                        foreach ($this->ddd->getVo() as $vo) {
                                            $this->command->comment('  |  |  |  |..' . $vo['vo_name_mother']);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $this->command->newLine(2);
        $this->command->comment('ROUTES:');
        $this->command->comment("/routes/api.php");
        $this->command->comment("/routes/" . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . ".php");

        $this->command->newLine(2);
        $this->command->comment('SERVICE PROVIDER:');
        $this->command->comment("/config/app.php");
        $this->command->comment("/app/Provider/" . $this->ddd->getModuleName() . "ServiceProvider.php");

        $this->command->newLine(2);
        $this->command->comment('GLOBAL OBSERVER:');
        $this->command->comment("/app/Observers/EventServiceProvider.php");

        $this->command->newLine(2);
        $this->command->comment("REMEMBER:");
        $this->command->info(' - Remember to revise created files: ');

        $this->command->comment('
    - Revise Routes, EventServiceProvider and Providers files
    - Modify VOMother fakers
    - Revise Request and Response files in Src/Model folder
    - Check VO types and nullables
    - Implement UnitCase Tests
    - Implement Accept Tests
    - Revise Controllers
    - Revise UseCases
    - Revise repository
    - Revise MYSQL implementation
    - Revise Model Domain
    - Revise Domain Events
                        ');
        $this->command->info("Thanks for complete this module with Jordi's magical travel, I hope that you having a great day today, and remember, if anything is failed, is your problem.");
        $this->command->info('Have a nice day');

        $this->command->newLine(2);
    }
}
