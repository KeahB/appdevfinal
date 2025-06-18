<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

<section class="min-h-screen flex items-center justify-center px-4">
    <div class="card w-full max-w-sm bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title justify-center text-2xl">Sign in to your account</h2>

            @if ($errors->any())
                <div class="alert alert-error text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}" class="space-y-4">
                @csrf

                <div class="form-control">
                    <label for="email" class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           placeholder="name@company.com"
                           class="input input-bordered w-full" required />
                </div>

                <div class="form-control">
                    <label for="password" class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" id="password" name="password"
                           placeholder="••••••••"
                           class="input input-bordered w-full" required />
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="checkbox checkbox-sm" />
                        <span class="label-text">Remember me</span>
                    </label>
                    <a href="#" class="text-blue-600 hover:underline">Forgot password?</a>
                </div>

                <div class="form-control mt-4">
                    <button type="submit" class="btn btn-primary w-full">Sign In</button>
                </div>

                <p class="text-sm text-center text-gray-500 mt-2">
                    Don’t have an account? <a href="#" class="text-blue-600 hover:underline">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</section>

</body>
</html>
