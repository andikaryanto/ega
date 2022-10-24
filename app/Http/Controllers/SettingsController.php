<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Settings;

class SettingsController extends Controller
{
    /**
     * @OA\Patch(
     *     path="/api/settings",
     *     tags={"setting"},
     *     summary="Update an existing setting.",
     *     description="",
     *     @OA\RequestBody(
     *         required=true,
     *         description="",
     *         @OA\JsonContent(ref="#/components/schemas/UpdateSettingRequest"),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Validation Exeption",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Validation Exeption",
     *     )
     * )
     */
    public function update(UpdateSettingRequest $request){
        $setting = Settings::where('key', $request->validated()['key'])->firstOrFail();

        $setting->update($request->validated());

        return response()->json([
            'success' => true,
            'data'    => null
        ]);
    }
}
