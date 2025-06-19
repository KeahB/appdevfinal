<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800">

<section class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-xl p-6">
        <h2 class="text-2xl font-semibold text-center mb-4">Sign in to your account</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded mb-4 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email</label>
                 <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="name@gmail.com"
                         class="input input-bordered bg-white w-full" required />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <input type="password" id="password" name="password"
                       placeholder="••••••••"
                       class="input input-bordered bg-white w-full" required />
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="checkbox checkbox-sm" />
                    <span>Remember me</span>
                </label>
                <a href="#" class="text-blue-600 hover:underline">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-full mt-2">Sign In</button>

            <p class="text-sm text-center text-gray-500 mt-3">
                Don’t have an account? <a href="#" class="text-blue-600 hover:underline">Sign up</a>
            </p>
        </form>
    </div>
</section>

</body>
</html>
