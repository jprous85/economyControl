<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Application\UseCases\DDD;


use App\Console\Commands\DDDScript\Domain\DDD;
use App\Console\Commands\DDDScript\Domain\DDDScriptConfig;
use App\Console\Commands\DDDScript\Domain\DDDUtils;

final class ReplaceValues
{

    public function __construct(private DDD $ddd)
    {
        if ($this->ddd->getVo()) {
            $this->replaceData();
        }
    }

    private function replaceData()
    {
        $directories = [
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::INFRASTRUCTURE) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::PERSISTENCE) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::ORM) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . 'MYSQLRepository.php',
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::INFRASTRUCTURE) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::CONTROLLERS) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . 'PostController.php',
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::INFRASTRUCTURE) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::CONTROLLERS) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . 'PutController.php',

            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::RESPONSE) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . 'Response.php',
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::REQUEST) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::CREATE) . $this->ddd->getModuleName() . 'Request.php',
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::REQUEST) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::UPDATE) . $this->ddd->getModuleName() . 'Request.php',
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::USE_CASES) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::CREATE) . $this->ddd->getModuleName() . DDDScriptConfig::DOT_PHP,
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::USE_CASES) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::UPDATE) . $this->ddd->getModuleName() . DDDScriptConfig::DOT_PHP,
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::USE_CASES) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::SHOW) . $this->ddd->getModuleName() . DDDScriptConfig::DOT_PHP,
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::USE_CASES) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::DELETE) . $this->ddd->getModuleName() . DDDScriptConfig::DOT_PHP,

            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::DOMAIN) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DDDScriptConfig::DOT_PHP,
            $this->ddd->getMainFolder() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::DOMAIN) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::REPOSITORIES) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . 'repository.php',


            DDDScriptConfig::TESTS . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::INFRASTRUCTURE) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::REQUEST) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . 'RequestMother.php',

            DDDScriptConfig::TESTS . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::REQUEST) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::CREATE) . $this->ddd->getModuleName() . 'RequestMother.php',
            DDDScriptConfig::TESTS . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::REQUEST) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::UPDATE) . $this->ddd->getModuleName() . 'RequestMother.php',
            DDDScriptConfig::TESTS . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::REQUEST) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::SHOW) . $this->ddd->getModuleName() . 'RequestMother.php',
            DDDScriptConfig::TESTS . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::REQUEST) . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::DELETE) . $this->ddd->getModuleName() . 'RequestMother.php',
            DDDScriptConfig::TESTS . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::APPLICATION) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . 'UnitTestCase.php',

            DDDScriptConfig::TESTS . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . DDDScriptConfig::ucFirst(DDDScriptConfig::DOMAIN) . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . DIRECTORY_SEPARATOR . $this->ddd->getModuleName() . 'Mother.php',
        ];


        foreach ($directories as $directory) {

            /**
             * Infrastructure
             */
            $this->replaceDataContent($directory, DDDScriptConfig::FILL_DATA_MAPPER_WITH_NEW_VO_PARAMETER, $this->fillDataMappeWithVOParameters());
            $this->replaceDataContent($directory, DDDScriptConfig::GET_VALUE_FROM_REQUEST_IN_CONTROLLERS, $this->getValuesFromRequestInControllers());

            /**
             * Application
             */
            // Responses & Request
            $this->replaceDataContent($directory, DDDScriptConfig::PARAMETERS_OF_REQUESTS, $this->parametersOfRequests());
            $this->replaceDataContent($directory, DDDScriptConfig::PARAMETERS_OF_RESPONSES, $this->parametersOfResponses());
            $this->replaceDataContent($directory, DDDScriptConfig::RESPONSE_TO_ENTITY_FUNCTION_IN_RESPONSE, $this->ResponseToEntityFunctionInResponse());
            $this->replaceDataContent($directory, DDDScriptConfig::RESPONSES_VALUES_WITH_VO_IN_SELF_RESPONSE, $this->responseValuesWithVOInSelfResponse());
            $this->replaceDataContent($directory, DDDScriptConfig::GETTERS, $this->createGetters());
            $this->replaceDataContent($directory, DDDScriptConfig::GETTERS_WITH_VO_IN_ENTITIES, $this->createGettersWithVOs());
            $this->replaceDataContent($directory, DDDScriptConfig::DATA_TO_ARRAY_WITH_ASSOC_IN_RESPONSE, $this->createDataToArrayWithAssocInResponse());

            // Use Cases
            $this->replaceDataContent($directory, DDDScriptConfig::REQUEST_TO_ENTITY_IN_CREATE_MAPPER_FUNCTION, $this->RequestToEntityInCreateMapperFunction());
            $this->replaceDataContent($directory, DDDScriptConfig::REQUEST_TO_ENTITY_IN_UPDATE_MAPPER_FUNCTION, $this->RequestToEntityInUpdateMapperFunction());
            $this->replaceDataContent($directory, DDDScriptConfig::PARAMETERS_OF_REQUEST_TO_ENTITY_IN_UPDATE_MAPPER_FUNCTION, $this->updateParametersUseCase());
            $this->replaceDataContent($directory, DDDScriptConfig::USES_OF_ID_VO, 'use ' . ucfirst($this->ddd->getMainFolder()) . '\\' . $this->ddd->getModuleName() . '\\' . DDDScriptConfig::ucFirst(DDDScriptConfig::DOMAIN) . '\\' . $this->ddd->getModuleName() . '\\' . DDDScriptConfig::ucFirst(DDDScriptConfig::VALUE_OBJECTS) . '\\' . $this->ddd->getModuleName() . 'IdVO;' . PHP_EOL);


            /**
             * Domain
             */
            $this->replaceDataContent($directory, DDDScriptConfig::PARAMETERS_OF_ENTITIES, $this->parametersOfEntities());
            $this->replaceDataContent($directory, DDDScriptConfig::PARAMETERS_OF_ENTITIES_FUNCTIONS, $this->parametersOfEntitiesFunctions());
            $this->replaceDataContent($directory, DDDScriptConfig::CREATE_ENTITY_PARAMETERS_IN_CREATE_FUNCTION, $this->updateParametersUseCase()); //
            $this->replaceDataContent($directory, DDDScriptConfig::ENTITIES_UPDATE_FUNCTION_ASSIGNMENT_VALUES_FROM_PARAMETERS, $this->entitiesUpdateFunctionAssignmentVariablesFromParameters());
            $this->replaceDataContent($directory, DDDScriptConfig::GET_PRIMITIVES_TO_ARRAY_IN_ENTITIES, $this->getPrimitivesToArrayInEntities());


            /**
             * Some places
             */
            $this->replaceDataContent($directory, DDDScriptConfig::USES_OF_VO, $this->formatUsesOfVO());
            $this->replaceDataContent($directory, DDDScriptConfig::USES_OF_VO_MOTHER, $this->createUsesOfVoMother());
            $this->replaceDataContent($directory, '/* ' . $this->ddd->getModuleName() . 'IdVO */', $this->ddd->getModuleName() . 'IdVO');

            /**
             * ------ TEST ------
             */

            /**
             * Infrastructure
             */
            $this->replaceDataContent($directory, DDDScriptConfig::CREATE_ARRAY_ASSOC_WITH_VO_RANDOM_VALUES_IN_REQUEST_MOTHER, $this->createArrayAssocWithVORandomValueInRequestMother());

            /**
             * Application
             */
            $this->replaceDataContent($directory, DDDScriptConfig::PARAMETERS_IN_REQUEST_MOTHER_FUNCTIONS, $this->parametersInRequestMotherFunctions());
            $this->replaceDataContent($directory, DDDScriptConfig::PARAMETERS_VO_MOTHER_IN_FUNCTION_REQUEST_MOTHER, $this->parametersVOMotherInFunctionRequestMother());
            $this->replaceDataContent($directory, DDDScriptConfig::USES_OF_ID_VO_MOTHER, 'use Tests\\' . $this->ddd->getModuleName() . '\\' . DDDScriptConfig::ucFirst(DDDScriptConfig::DOMAIN) . '\\' . $this->ddd->getModuleName() . '\\' . DDDScriptConfig::ucFirst(DDDScriptConfig::VALUE_OBJECTS) . '\\' . ucfirst($this->ddd->getModuleName()) . 'IdVOMother;' . PHP_EOL);
            $this->replaceDataContent($directory, DDDScriptConfig::UNDERSCORE_VARIABLE_WITH_HIS_NULLABLE_OR_NOT_TYPE_IN_REQUEST_MOTHER, $this->underscoreVariableWithHisNullableOrNotTypeInRequestMother());

            /**
             * Domain
             */
            $this->replaceDataContent($directory, DDDScriptConfig::PARAMETERS_OF_ENTITIES_MOTHER_FUNCTIONS, $this->parametersOfEntitiesMotherFunctions());
            $this->replaceDataContent($directory, DDDScriptConfig::CREATE_ENTITY_MOTHER_PARAMETERS_IN_CREATE_FUNCTION, $this->updateParametersUseCase());
            $this->replaceDataContent($directory, DDDScriptConfig::VO_MOTHER_RANDOM_VALE_IN_ENTITIES_MOTHER, $this->voMotherRandomValueInEntitiesMother());
        }
    }

    private function replaceDataContent($directory, $search, $value)
    {
        if (file_exists($directory)) {
            $file = file_get_contents($directory);
            $file = str_replace($search, $value, $file);
            file_put_contents($directory, $file);
        }
    }


    /**
     * ------ FUNCTIONS ------------------------------------
     */

    /**
     * Infrastructure --------------------------------------
     */
    private function fillDataMappeWithVOParameters(): string
    {
        $data_response = "";
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\tnew " . ucfirst($data['vo_name']) . '($' . DDDUtils::convertCamelCaseToUnderscore(lcfirst($this->ddd->getModuleName())) . '->' . $data['name_underscore'] . '),' . PHP_EOL;
        }

        return $data_response;
    }

    private function getValuesFromRequestInControllers(): string
    {
        $data_response = "";
        foreach ($this->ddd->getVo() as $value) {
            $data_response .= "\t\t\t\$request->get('" . $value['name_underscore'] . "')," . PHP_EOL;
        }
        return $data_response;
    }

    /**
     * Application -----------------------------------------
     */

    // Responses & Requests
    private function parametersOfResponses(): string
    {
        $parameters = '';
        foreach ($this->ddd->getVo() as $key => $data) {
            $parameters .= "\t\tprivate " . (($data['is_null']) ? "?" : "") . $data['type'] . " $" . $data['name_underscore'] . ((count($this->ddd->getVo()) - 1 != $key) ? "," . PHP_EOL : "");
        }
        return $parameters;
    }

    private function parametersOfRequests(): string
    {
        $parameters = '';
        foreach ($this->ddd->getVo() as $key => $data) {
            $parameters .= "\t\tprivate " . (($data['is_null']) ? "?" : "") . $data['type'] . " $" . $data['name_underscore'] . ((count($this->ddd->getVo()) - 1 != $key) ? "," . PHP_EOL : "");
        }
        return $parameters;
    }

    private function responseValuesWithVOInSelfResponse(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\t$" . lcfirst($this->ddd->getModuleNameUnderscore()) . '->get' . ucfirst($data['name_camel_case']) . '()->value(),' . PHP_EOL;
        }
        return $data_response;
    }

    private function ResponseToEntityFunctionInResponse(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\tnew " . ucfirst($data['vo_name']) . '($response->get' . ucfirst($data['name_camel_case']) . '()),' . PHP_EOL;
        }
        return $data_response;
    }

    private function createGetters(): string
    {
        $getters = '';
        foreach ($this->ddd->getVo() as $data) {
            $getters .= "\tpublic function get" . ucfirst($data['name_camel_case']) . "(): " . (($data['is_null']) ? '?' : '') . $data['type'] . " {" . PHP_EOL .
                        "\t\treturn \$this->" . $data['name_underscore'] . ";" . PHP_EOL .
                        "\t}" . PHP_EOL .
                        PHP_EOL;
        }
        return $getters;
    }

    private function createGettersWithVOs(): string
    {
        $getters = '';
        foreach ($this->ddd->getVo() as $data) {
            $getters .= "\tpublic function get" . ucfirst($data['name_camel_case']) . "(): " . (($data['is_null']) ? '?' : '') . $data['vo_name'] . " {" . PHP_EOL .
                        "\t\treturn \$this->" . $data['name_underscore'] . ";" . PHP_EOL .
                        "\t}" . PHP_EOL .
                        PHP_EOL;
        }
        return $getters;
    }

    private function createDataToArrayWithAssocInResponse(): string
    {
        $data_to_array = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_to_array .= "\t\t\t\"" . $data['name_underscore'] . "\" => \$this->" . $data['name_underscore'] . "," . PHP_EOL;
        }
        return $data_to_array;
    }

    // Use Cases
    private function RequestToEntityInCreateMapperFunction(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\tnew " . ucfirst($data['vo_name']) . '($request->get' . ucfirst($data['name_camel_case']) . '()),' . PHP_EOL;
        }
        return $data_response;
    }

    private function RequestToEntityInUpdateMapperFunction(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\t$" . $data['name_underscore'] . ' = $request->get' . ucfirst($data['name_camel_case']) . '() ? new ' . $data['vo_name'] . '($request->get' . ucfirst($data['name_camel_case']) . '()) : $' . lcfirst($this->ddd->getModuleNameUnderscore()) . '->get' . ucfirst($data['name_camel_case']) . '();' . PHP_EOL;
        }
        return $data_response;
    }


    /**
     * Domain -----------------------------------------
     */

    private function parametersOfEntities(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\tprivate " . (($data['is_null']) ? "?" : "") . $data['vo_name'] . " $" . $data['name_underscore'] . "," . PHP_EOL;
        }
        return $data_response;
    }

    private function parametersOfEntitiesFunctions(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t" . $data['vo_name'] . " $" . $data['name_underscore'] . "," . PHP_EOL;
        }
        return $data_response;
    }

    private function entitiesUpdateFunctionAssignmentVariablesFromParameters(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\$this->" . $data['name_underscore'] . ' = ' . '$' . $data['name_underscore'] . ';' . PHP_EOL;
        }
        return $data_response;
    }

    private function getPrimitivesToArrayInEntities(): string
    {
        $data_response = "";
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\t'" . $data['name_underscore'] . "' => \$this->get" . ucfirst($data['name_camel_case']) . '()->value(),' . PHP_EOL;
        }
        return $data_response;
    }

    /**
     * Some places -----------------------------------------
     */

    private function formatUsesOfVO(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "use " . ucfirst($this->ddd->getMainFolder()) . '\\' . $this->ddd->getModuleName() . '\Domain\\' . $this->ddd->getModuleName() . '\ValueObjects\\' . $data['vo_name'] . ';' . PHP_EOL;
        }
        return $data_response;
    }

    private function createUsesOfVoMother(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= 'use Tests\\' . $this->ddd->getModuleName() . '\\Domain\\' . $this->ddd->getModuleName() . '\ValueObjects\\' . ucfirst($data['vo_name']) . 'Mother;' . PHP_EOL;
        }
        return $data_response;
    }

    /**
     * ------ TEST -----------------------------------------
     */

    /**
     * Infrastructure -----------------------------------------
     */
    private function createArrayAssocWithVORandomValueInRequestMother(): string
    {
        $data_response = "";
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\t'" . $data['name_underscore'] . "' => " . ucfirst($data['vo_name_mother']) . '::random()->value(),' . PHP_EOL;
        }
        return $data_response;
    }

    /**
     * Application -----------------------------------------
     */
    private function parametersVOMotherInFunctionRequestMother(): string
    {
        $data_response = "";
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\$" . $data['name_underscore'] . " = " . ucfirst($data['vo_name_mother']) . '::random()->value();' . PHP_EOL;
        }
        return $data_response;
    }

    private function underscoreVariableWithHisNullableOrNotTypeInRequestMother(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t" . (($data['is_null']) ? "?" : "") . $data['type'] . " \$" . $data['name_underscore'] . ',' . PHP_EOL;
        }
        return $data_response;
    }

    /**
     * Domain -----------------------------------------
     */

    private function parametersOfEntitiesMotherFunctions(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t" . $data['vo_name'] . " $" . $data['name_underscore'] . "," . PHP_EOL;
        }
        return $data_response;
    }

    private function voMotherRandomValueInEntitiesMother(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\t" . ucfirst($data['vo_name_mother']) . '::random(),' . PHP_EOL;
        }
        return $data_response;
    }


    private function updateParametersUseCase(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\t\t$" . $data['name_underscore'] . ',' . PHP_EOL;
        }
        return $data_response;
    }

    private function parametersInRequestMotherFunctions(): string
    {
        $data_response = '';
        foreach ($this->ddd->getVo() as $data) {
            $data_response .= "\t\t\t\t$" . $data['name_underscore'] . ',' . PHP_EOL;
        }
        return $data_response;
    }
}
