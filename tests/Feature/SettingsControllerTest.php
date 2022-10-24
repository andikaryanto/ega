<?php


use Tests\TestCase;

class SettingsControllerTest extends TestCase
{
    public function test_update_settings_successfully(){
        $response = $this->patch('/api/settings', [
            'key'   => 'overtime_method',
            'value' => 1
        ]);

        $response->assertStatus(200);
    }

    public function test_empty_data_request_update_setting(){
        $response = $this->patch('/api/settings');

        $response->assertStatus(400);
    }

    public function test_key_in_request_update_setting_is_not_overtime_method(){
        $response = $this->patch('/api/settings', [
            'key'   => 'not_overtime_method',
            'value' => 1
        ]);

        $response->assertSeeText('The selected key is invalid.');
    }

    public function test_value_in_request_update_setting_is_not_exist_on_references_table(){
        $response = $this->patch('/api/settings', [
            'key'   => 'overtime_method',
            'value' => 100
        ]);

        $response->assertSeeText('The selected value is invalid.');
    }
}
