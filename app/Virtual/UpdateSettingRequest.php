<?php

namespace App\Virtual;
/**
* @OA\Schema(
*     title="UpdateSettingRequest",
*     description="Update Setting",
*     @OA\Xml(
*         name="UpdateSetting"
*     )
* )
*/
class UpdateSettingRequest
{
    /**
     * @OA\Property(
     *      title="Key",
     *      description="",
     *      example="overtime_method"
     * )
     *
     * @var string
     */
    private $key;

    /**
     * @OA\Property(
     *      title="Value",
     *      description="",
     *      example="1"
     * )
     *
     * @var string
     */
    private $value;
}
