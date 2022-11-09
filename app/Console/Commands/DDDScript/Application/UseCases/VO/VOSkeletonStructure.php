<?php


namespace App\Console\Commands\DDDScript\Application\UseCases\VO;


use App\Console\Commands\DDDScript\Domain\DDDUtils;
use App\Console\Commands\DDDScript\Domain\VO;

class VOSkeletonStructure
{

    public function __construct(private VO $vo)
    {
        $this->createVOStructure();
    }

    private function createVOStructure()
    {
        $template = ($this->vo->getInheritance()) ? 'ExampleInheritanceVO.php' : 'ExampleVO.php';

        $primitive = DDDUtils::getType($this->vo->getInheritance());

        $fileVOExample = file_get_contents('DDDExample/' . $template);
        $fileVOExample = str_replace('//**inheritance_use**', 'use ' . ucfirst($this->vo->getMainFolder()) . '\Shared\Domain\ValueObjects\\' . $this->vo->getInheritance() . ';', $fileVOExample);
        $fileVOExample = str_replace('//**inheritance**', 'extends ' . $this->vo->getInheritance(), $fileVOExample);
        $fileVOExample = str_replace('__NameOfVO__', $this->vo->getVoName(), $fileVOExample);
        $fileVOExample = str_replace('__ModuleName__', $this->vo->getModuleName(), $fileVOExample);
        $fileVOExample = str_replace('__ModuleName_Aggregate__', $this->vo->getAggregateName(), $fileVOExample);
        $fileVOExample = str_replace('__ModuleName_Min__', $this->vo->getModuleName(), $fileVOExample);
        $fileVOExample = str_replace('/*__AbstractOrFinal__*/', ($this->vo->getModuleName() == 'Shared') ? 'abstract ' : 'final ', $fileVOExample);
        $fileVOExample = str_replace('/*__FinalOrEmpty__*/', ($this->vo->getModuleName() == 'Shared') ? '' : 'final ', $fileVOExample);
        $fileVOExample = str_replace('__primitive__', $primitive . ' ', $fileVOExample);
        $fileVOExample = str_replace('__BasePath__', ucfirst($this->vo->getMainFolder()), $fileVOExample);
        $fileVOExample = str_replace('//**inheritance_parent**', 'parent::__construct($value);', $fileVOExample);

        file_put_contents(
            base_path() . DIRECTORY_SEPARATOR . $this->vo->getMainFolder() .
            DIRECTORY_SEPARATOR .
            $this->vo->getModuleName() .
            DIRECTORY_SEPARATOR .
            'Domain' .
            DIRECTORY_SEPARATOR .
            $this->vo->getAggregateName() .
            DIRECTORY_SEPARATOR .
            'ValueObjects' .
            DIRECTORY_SEPARATOR .
            $this->vo->getVoName() . '.php',
            $fileVOExample);
    }
}
