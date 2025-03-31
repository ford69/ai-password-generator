<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use OpenAI;

class PasswordController extends Controller
{
    //
    public function generate(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:255',
        ]);

        // Generate password from AI
        $aiPassword = $this->generatePasswordFromAI($request->prompt);

        return response()->json([
            'password' => $aiPassword
        ]);
    }



    private function generatePasswordFromAI($prompt)
    {
        try {
            $apiKey = env('GEMINI_API_KEY');
            $url = "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-pro:generateContent?key=$apiKey";

            $response = Http::post($url, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => "Generate a strong and secure password based on this description: $prompt"]
                        ]
                    ]
                ]
            ]);

            $data = $response->json();
            \Log::info('Gemini API Response:', $data);


            if (!empty($data['candidates'][0]['content']['parts'][0]['text'])) {
                $password = trim($data['candidates'][0]['content']['parts'][0]['text']);


                // Ensure it's a single password without extra text
            $password = explode(' ', $password)[0]; // Take only the first word
            $password = preg_replace('/[^A-Za-z0-9!@#$%^&*()]/', '', $password); // Remove unnecessary characters

            return Str::random(4) . $password . Str::random(4);
            }

            \Log::error('Gemini API: Invalid or missing password in response.');
            return "Error: Invalid password from AI";

        } catch (\Exception $e) {
            \Log::error('Gemini API Error: ' . $e->getMessage());
            return "Error generating password";
        }
    }


}
