<?php

/**
 * MyStudent API
 * No description provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: 1.0
 * 
 *
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen.git
 * Do not edit the class manually.
 */

/**
 * MyStudent API
 * @version 1.0
 */

$app->get('/', function () use ($app) {
    return $app->version();
});

/**
 * get listPeople
 * Summary: List people data
 * Notes: 
 * Output-Formats: [application/hal+json]
 */
$app->get('/api/v1/people', 'PeopleApi@listPeople');
