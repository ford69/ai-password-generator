@extends('layouts')

@section('title', 'AI Password Generator')

@section('content')

<div class="relative w-full min-h-screen flex items-center justify-center">
    <!-- Particles Background -->
    <div id="particles-js" class="absolute inset-0 z-0"></div>

    <!-- Content Section -->
    <div class="relative flex flex-col md:flex-row items-center justify-center text-center md:text-left px-6 py-80 z-10">
        <div class="max-w-lg">
            <h1 id="typing-text" class="text-4xl font-extrabold leading-tight text-center md:text-left">
            </h1>
            <p class="text-lg mt-2">
                Our AI-powered password generator creates ultra-secure, random, and unbreakable passwords in seconds.
            </p>
        </div>

        <div class="bg-white text-black p-6 rounded-lg shadow-lg w-full max-w-md mt-6 md:mt-0 md:ml-10">
            <textarea id="userPrompt" placeholder="Describe your password..."
                class="w-full p-3 border rounded-md text-lg min-h-[100px] resize-none"></textarea>

            <label class="block text-sm font-medium mt-3">Generated password</label>
            <div class="relative flex items-center">
                <input type="text" id="generatedPassword" class="w-full p-2 border rounded-md mt-1 text-center pr-10"
                    readonly>
                <div id="strength-meter" class="mt-2 text-sm"></div>

                <!-- Copy Button with Icon -->
                <button id="copyBtn" onclick="copyToClipboard()" class="absolute right-3 text-gray-500 hidden">
                    <!-- Clipboard Icon -->
                    <svg id="clipboardIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 2a2 2 0 00-2 2v14a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H8zM16 8H8M16 12H8M10 16h4" />
                    </svg>
                </button>
            </div>

            <!-- Loader -->
            <div id="loader" class="flex justify-center my-3 hidden">
                <div class="w-6 h-6 border-4 border-gray-300 border-t-blue-500 rounded-full animate-spin"></div>
            </div>

            <div class="flex mt-4">
                <button id="generateBtn" onclick="generatePassword()"
                    class="flex-1 bg-blue-500 text-white hover:bg-blue-600 active:scale-95 transition-all duration-300 px-6 py-3 rounded-md">
                    Generate Password
                </button>
            </div>
        </div>
    </div>
</div>


    <section class="bg-white text-gray-500 py-20 px-6 md:px-16">
        <div class="max-w-5xl mx-auto text-center">
            <!-- Typing Header -->
            <h2 id="why-use-header" class="text-4xl md:text-5xl font-extrabold mb-4">Why Use Our Password Generator?</h2>
            <p class="text-lg md:text-xl text-gray-700 max-w-3xl mx-auto">
                Generate **ultra-secure passwords** instantly, ensuring your online accounts remain **protected** from cyber
                threats.
                Say goodbye to weak passwords and **hello** to ultimate security—effortlessly!
            </p>
        </div>

        <!-- Features Section -->
        <div class="grid md:grid-cols-3 gap-8 mt-12 max-w-5xl mx-auto">
            <div class="text-center">
                <span class="text-blue-500 text-5xl">🔒</span>
                <h3 class="text-xl font-semibold mt-3">Unbreakable Security</h3>
                <p class="text-gray-400 text-sm mt-2">Our AI-powered generator ensures maximum password strength.</p>
            </div>
            <div class="text-center">
                <span class="text-green-500 text-5xl">⚡</span>
                <h3 class="text-xl font-semibold mt-3">Instant Generation</h3>
                <p class="text-gray-400 text-sm mt-2">Get your secure password in **milliseconds** with a single click.</p>
            </div>
            <div class="text-center">
                <span class="text-yellow-500 text-5xl">🛡️</span>
                <h3 class="text-xl font-semibold mt-3">Privacy First</h3>
                <p class="text-gray-400 text-sm mt-2">We don’t store your passwords—your data stays **yours**.</p>
            </div>
        </div>
    </section>
    <!-- FAQ Section -->
    <section class="bg-white py-20 px-6 md:px-16">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-500">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 mt-4">
                Need help? Here are some common questions about our password generator.
            </p>
        </div>

        <!-- FAQ Items -->
        <div class="max-w-3xl mx-auto mt-12">
            <div class="border-t border-gray-300">
                <button
                    class="faq-question w-full text-left py-4 px-6 flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900">🔒 How secure are the passwords?</span>
                    <span class="faq-icon text-xl">+</span>
                </button>
                <div class="faq-answer hidden px-6 pb-4 text-gray-700">
                    Our generator uses advanced algorithms to create **strong, random passwords** that are difficult to
                    crack.
                </div>
            </div>

            <div class="border-t border-gray-300">
                <button
                    class="faq-question w-full text-left py-4 px-6 flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900">⚡ Can I customize my password?</span>
                    <span class="faq-icon text-xl">+</span>
                </button>
                <div class="faq-answer hidden px-6 pb-4 text-gray-700">
                    Yes! You can choose **length, numbers, symbols, and more** to create a password that suits your needs.
                </div>
            </div>

            <div class="border-t border-gray-300">
                <button
                    class="faq-question w-full text-left py-4 px-6 flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900">🛡️ Do you store my passwords?</span>
                    <span class="faq-icon text-xl">+</span>
                </button>
                <div class="faq-answer hidden px-6 pb-4 text-gray-700">
                    No. We do **not** store or track any passwords. Your security is our top priority.
                </div>
            </div>

            <div class="border-t border-b border-gray-300">
                <button
                    class="faq-question w-full text-left py-4 px-6 flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900">📱 Can I use this on mobile?</span>
                    <span class="faq-icon text-xl">+</span>
                </button>
                <div class="faq-answer hidden px-6 pb-4 text-gray-700">
                    Absolutely! Our password generator is **fully responsive** and works on all devices.
                </div>
            </div>
        </div>
    </section>

    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": { "value": 80 },
                "size": { "value": 3 },
                "move": { "speed": 1 }
            }
        });
    </script>
    <!-- FAQ Toggle Script -->
    <script>
        document.querySelectorAll(".faq-question").forEach(button => {
            button.addEventListener("click", () => {
                const answer = button.nextElementSibling;
                const icon = button.querySelector(".faq-icon");

                if (answer.classList.contains("hidden")) {
                    document.querySelectorAll(".faq-answer").forEach(item => item.classList.add("hidden"));
                    document.querySelectorAll(".faq-icon").forEach(icon => icon.textContent = "+");
                    answer.classList.remove("hidden");
                    icon.textContent = "-";
                } else {
                    answer.classList.add("hidden");
                    icon.textContent = "+";
                }
            });
        });
    </script>


    <script>
        //Typing Effect
        const text = "Effortless Security, Maximum Protection";
        let index = 0;

        function typeEffect() {
            if (index < text.length) {
                document.getElementById("typing-text").innerHTML += text.charAt(index);
                index++;
                setTimeout(typeEffect, 80); // Adjust typing speed
            }
        }
        window.onload = () => {
            setTimeout(typeEffect, 500); // Small delay before starting
        };
        async function generatePassword() {
            let userPrompt = document.getElementById('userPrompt').value;
            let generateBtn = document.getElementById('generateBtn');
            let loader = document.getElementById('loader');
            let generatedPasswordField = document.getElementById('generatedPassword');
            let copyBtn = document.getElementById('copyBtn');

            const MAX_LENGTH = 32; // Maximum password length

            if (!userPrompt) {
                alert("Please enter a prompt");
                return;
            }

            // Show loader & disable button
            loader.classList.remove('hidden');
            generateBtn.disabled = true;
            generateBtn.innerText = "Generating...";

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
                let password = data.password;

                // Enforce character limit
                if (password.length > MAX_LENGTH) {
                    password = password.substring(0, MAX_LENGTH);
                    alert(`Password length exceeded ${MAX_LENGTH} characters. It has been trimmed.`);
                }

                generatedPasswordField.value = password;
                copyBtn.classList.remove('hidden');

                // Change button text after first click
                generateBtn.innerText = "Regenerate Password";

            } catch (error) {
                console.error("Error:", error);
                alert("Something went wrong! Check the console for details.");
            } finally {
                // Hide loader & enable button
                loader.classList.add('hidden');
                generateBtn.disabled = false;
            }
        }


        function copyToClipboard() {
            let text = document.getElementById('generatedPassword').value;
            let copyBtn = document.getElementById('copyBtn');
            let clipboardIcon = document.getElementById('clipboardIcon');
            let checkIcon = document.getElementById('checkIcon');

            navigator.clipboard.writeText(text).then(() => {
                // Show check icon
                clipboardIcon.classList.add('hidden');
                checkIcon.classList.remove('hidden');

                // Reset icon back after 1.5 seconds
                setTimeout(() => {
                    checkIcon.classList.add('hidden');
                    clipboardIcon.classList.remove('hidden');
                }, 1500);
            });
        }
    </script>

@endsection
