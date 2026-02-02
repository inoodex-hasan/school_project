<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">

        <!-- Title -->
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
            <p class="text-gray-500 text-sm">Login to your account</p>
        </div>

        <!-- Form -->
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 mt-3">
                    Email
                </label>
                <input type="email" name="email" placeholder="admin@example.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 mt-3">
                    Password
                </label>
                <input type="password" name="password" placeholder="123456789"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between text-sm mt-5">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember"
                        class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="text-gray-600">Remember me</span>
                </label>
                <a href="#" class="text-blue-600 hover:underline">
                    Forgot password?
                </a>
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200 font-semibold mt-5">
                Login
            </button>

        </form>

        <!-- Register -->
        <p class="text-center text-sm text-gray-500 mt-5">
            Don’t have an account?
            <a href="#" class="text-blue-600 hover:underline font-medium">
                Register
            </a>
        </p>

    </div>

</body>

</html>