<?php

declare(strict_types=1);


namespace App\Console\Commands\DDDScript\Domain;


final class DDDScriptConfig
{
    const DOT_PHP = '.php';

    const APPLICATION    = 'application';
    const DOMAIN         = 'domain';
    const INFRASTRUCTURE = 'infrastructure';
    const CONTROLLERS    = 'controllers';
    const CREATE         = 'create';
    const UPDATE         = 'update';
    const SHOW           = 'show';
    const DELETE         = 'delete';

    const REQUEST   = 'request';
    const RESPONSE  = 'response';
    const USE_CASES = 'useCases';

    const REPOSITORIES = 'repositories';

    const PERSISTENCE = 'persistence';
    const ORM         = 'ORM';

    const VALUE_OBJECTS = 'valueObjects';

    const TESTS = 'tests';


    public static function ucFirst(string $value): string
    {
        return ucfirst($value);
    }


    /**
     * CONSTANTS COMMENTS
     */
    const FILL_DATA_MAPPER_WITH_NEW_VO_PARAMETER                              = '// -- fill data mapper with new vo parameters -- //';
    const GET_VALUE_FROM_REQUEST_IN_CONTROLLERS                               = '// -- get value from request in controllers -- //';
    const PARAMETERS_OF_REQUESTS                                              = '// -- parameters of requests -- //';
    const PARAMETERS_OF_RESPONSES                                             = '// -- parameters of responses -- //';
    const RESPONSE_TO_ENTITY_FUNCTION_IN_RESPONSE                             = '// -- response to entity function in Response -- //';
    const RESPONSES_VALUES_WITH_VO_IN_SELF_RESPONSE                           = '// -- responses values with vo in self response -- //';
    const GETTERS                                                             = '// -- getters -- //';
    const GETTERS_WITH_VO_IN_ENTITIES                                         = '// -- getters with vo in entities -- //';
    const DATA_TO_ARRAY_WITH_ASSOC_IN_RESPONSE                                = '// -- data to array with assoc in response -- //';
    const REQUEST_TO_ENTITY_IN_CREATE_MAPPER_FUNCTION                         = '// -- request to entity in create mapper function -- //';
    const REQUEST_TO_ENTITY_IN_UPDATE_MAPPER_FUNCTION                         = '// -- request to entity in update mapper function -- //';
    const PARAMETERS_OF_REQUEST_TO_ENTITY_IN_UPDATE_MAPPER_FUNCTION           = '// -- parameters of request to entity in update mapper function -- //';
    const USES_OF_ID_VO                                                       = '// -- uses of id vo -- //';
    const PARAMETERS_OF_ENTITIES                                              = '// -- parameters of entities -- //';
    const PARAMETERS_OF_ENTITIES_FUNCTIONS                                    = '// -- parameters of entities functions -- //';
    const CREATE_ENTITY_PARAMETERS_IN_CREATE_FUNCTION                         = '// -- create entity parameters in create function -- //';
    const ENTITIES_UPDATE_FUNCTION_ASSIGNMENT_VALUES_FROM_PARAMETERS          = '// -- Entities update function assignment values from parameters -- //';
    const GET_PRIMITIVES_TO_ARRAY_IN_ENTITIES                                 = '// -- get primitives to array in entities-- //';
    const USES_OF_VO                                                          = '// -- uses of vo -- //';
    const USES_OF_VO_MOTHER                                                   = '// -- uses of vo mother-- //';
    const CREATE_ARRAY_ASSOC_WITH_VO_RANDOM_VALUES_IN_REQUEST_MOTHER          = '// -- create array assoc with vo random values in request mother -- //';
    const PARAMETERS_IN_REQUEST_MOTHER_FUNCTIONS                              = '// -- parameters in request mother functions -- //';
    const PARAMETERS_VO_MOTHER_IN_FUNCTION_REQUEST_MOTHER                     = '// -- parameters vo mother in function request mother -- //';
    const USES_OF_ID_VO_MOTHER                                                = '// -- uses of id vo mother -- //';
    const UNDERSCORE_VARIABLE_WITH_HIS_NULLABLE_OR_NOT_TYPE_IN_REQUEST_MOTHER = '// -- underscore variable with his nullable or not type in request mother --//';
    const PARAMETERS_OF_ENTITIES_MOTHER_FUNCTIONS                             = '// -- parameters of entities mother functions -- //';
    const CREATE_ENTITY_MOTHER_PARAMETERS_IN_CREATE_FUNCTION                  = '// -- create entity mother parameters in create function -- //';
    const VO_MOTHER_RANDOM_VALE_IN_ENTITIES_MOTHER                            = '// -- vo mother random vale in entities mother -- //';

}
