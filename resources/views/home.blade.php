@extends('layouts')

@section('title', 'Home - AI Password Generator')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md mx-auto">
        <h2 class="text-lg font-bold text-center mb-4">Generate a Password</h2>

        <input type="text" id="userPrompt" placeholder="Describe your password..." class="w-full p-2 border rounded-md">

        <button onclick="generatePassword()" class="mt-3 bg-blue-500 text-white w-full p-2 rounded-md hover:bg-blue-700">
            Generate Password
        </button>

        <p id="generatedPassword" class="text-center mt-3 font-semibold"></p>

        <button id="copyBtn" onclick="copyToClipboard()"
            class="mt-3 bg-green-500 text-white w-full p-2 rounded-md hover:bg-green-700 hidden">
            Copy Password
        </button>
    </div>

    <script>
        async function generatePassword() {
            let userPrompt = document.getElementById('userPrompt').value;

            if (!userPrompt) {
                alert("Please enter a prompt");
                return;
            }

            try {
                let response = await fetch('/api/generate-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        prompt: userPrompt
                    })
                });

                if (!response.ok) {
                    throw new Error(`Server responded with ${response.status}: ${response.statusText}`);
                }

                let data = await response.json();
                document.getElementById('generatedPassword').innerText = data.password;
                document.getElementById('copyBtn').classList.remove('hidden');

            } catch (error) {
                console.error("Error:", error);
                alert("Something went wrong! Check the console for details.");
            }
        }

        function copyToClipboard() {
            let text = document.getElementById('generatedPassword').innerText;
            navigator.clipboard.writeText(text);
            alert("Password copied to clipboard!");
        }
    </script>
@endsection
