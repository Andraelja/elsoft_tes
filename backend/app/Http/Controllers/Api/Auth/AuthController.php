<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'UserName' => 'required',
            'Password' => 'required'
        ]);

        // Cari user berdasarkan username
        $user = User::where('UserName', $request->UserName)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        if (!Hash::check($request->Password, $user->Password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password salah'
            ], 401);
        }

        $userAgent = $request->header('User-Agent');
        $ipAddress = $request->ip();
        $deviceId = 'device_' . time();

        // Deteksi browser
        $browserInfo = [
            'chrome' => str_contains(strtolower($userAgent), 'chrome'),
            'firefox' => str_contains(strtolower($userAgent), 'firefox'),
            'safari' => str_contains(strtolower($userAgent), 'safari'),
            'edge' => str_contains(strtolower($userAgent), 'edge'),
            'mobile' => preg_match('/Mobile|Android|iPhone|iPad/i', $userAgent) ? true : false,
        ];

        // Deteksi OS
        $osInfo = [
            'windows' => str_contains(strtolower($userAgent), 'windows'),
            'mac' => str_contains(strtolower($userAgent), 'mac'),
            'linux' => str_contains(strtolower($userAgent), 'linux'),
            'android' => str_contains(strtolower($userAgent), 'android'),
            'ios' => str_contains(strtolower($userAgent), 'iphone') || str_contains(strtolower($userAgent), 'ipad'),
        ];

        // Nama OS dan Versi (simple parser)
        $osName = php_uname('s');
        $osVersion = php_uname('r');

        // Update otomatis ke database jika ingin disimpan sebagai last login device
        $user->update([
            'browserInfo' => $browserInfo,
            'osInfo' => $osInfo,
            'osNameInfo' => [
                'name' => $osName,
                'version' => $osVersion,
                'platform' => $userAgent
            ],
            'Device' => $deviceId,
            'Model' => $browserInfo['mobile'] ? 'Mobile Device' : 'Desktop / Web',
            'Source' => $ipAddress
        ]);

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login berhasil',
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
