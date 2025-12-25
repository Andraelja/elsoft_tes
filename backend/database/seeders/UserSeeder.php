<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "UserName" => "testcase",
            "Password" => Hash::make("testcase123"),
            "Company" => "d3170153-6b16-4397-bf89-96533ee149ee",

            "browserInfo" => [
                "chrome" => false,
                "firefox" => false,
                "safari" => false,
                "edge" => false,
                "mobile" => false
            ],

            "machineInfo" => [
                "brand" => null,
                "model" => null,
                "os_name" => null,
                "os_version" => null,
                "type" => null
            ],

            "osInfo" => [
                "windows" => false,
                "mac" => false,
                "linux" => false,
                "android" => false,
                "ios" => false
            ],

            "osNameInfo" => [
                "name" => null,
                "version" => null,
                "platform" => null
            ],

            "Device" => null,
            "Model" => null,
            "Source" => null,
            "Exp" => 3,
        ]);
    }
}
