<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\License;

class LicenseController extends Controller
{
    public function validate_license(Request $request)
    {
        $licenseKey = $request->input('license_key');
        $domain = $request->input('domain');

        $license = License::where('key', $licenseKey)->first();

        if (!$license) {
            return response()->json(['status' => 'error', 'message' => 'Invalid license key'], 400);
        }

        if (!$license->is_active || ($license->expires_at && $license->expires_at < now())) {
            return response()->json(['status' => 'error', 'message' => 'License expired/invalid'], 403);
        }

        if ($license->domain && $license->domain !== $domain) {
            return response()->json(['status' => 'error', 'message' => 'License tied to another domain'], 403);
        }

        if (!$license->domain) {
            $license->domain = $domain;
            $license->save();
        }

        return response()->json(['status' => 'success', 'message' => 'License validation successful']);
    }

    public function create_license() {
        dd("create_license");
    }
}
