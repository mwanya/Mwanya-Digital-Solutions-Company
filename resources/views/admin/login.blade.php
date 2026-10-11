<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Heisen Group Company Limited</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { brand: { orange: '#E8611F', dark: '#231F20', gold: '#F5B82E', cream: '#FFF8F1' } } } } }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif; }
        input[type="email"], input[type="password"] {
            width: 100%;
            background-color: #fff;
            border: 1.5px solid #e2dfd9;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            font-size: 0.925rem;
            color: #231F20;
            box-shadow: 0 1px 2px rgba(35,31,32,0.04);
            transition: border-color .2s ease, box-shadow .2s ease;
            appearance: none;
            -webkit-appearance: none;
        }
        input[type="email"]:focus, input[type="password"]:focus {
            outline: none;
            border-color: #E8611F;
            box-shadow: 0 0 0 4px rgba(232,97,31,0.15);
        }
        input[type="checkbox"] { width: 1.1rem; height: 1.1rem; accent-color: #E8611F; cursor: pointer; }
        ::placeholder { color: #9b9693; }
    </style>
</head>
<body class="bg-brand-dark min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.jpg') }}" alt="Heisen Group logo" class="h-20 w-20 rounded-full mx-auto ring-4 ring-brand-gold object-cover">
            <h1 class="text-white font-extrabold text-xl mt-4">HEISEN GROUP ADMIN</h1>
            <p class="text-gray-400 text-sm">Sign in to manage the website</p>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl p-8">
            @if (session('error'))
                <div class="bg-red-50 border border-red-300 text-red-700 rounded-lg px-4 py-3 text-sm mb-6">{{ session('error') }}</div>
            @endif
            @if (session('success'))
                <div class="bg-green-50 border border-green-300 text-green-800 rounded-lg px-4 py-3 text-sm mb-6">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="bg-red-50 border border-red-300 text-red-700 rounded-lg px-4 py-3 text-sm mb-6">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold mb-2" for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2" for="password">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full rounded-lg border-gray-300 focus:border-brand-orange focus:ring-brand-orange">
                </div>
                <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-brand-orange focus:ring-brand-orange">
                    Remember me
                </label>
                <button type="submit" class="w-full rounded-full bg-brand-orange text-white py-3 font-bold hover:bg-brand-dark transition">Sign In</button>
            </form>
        </div>

        <p class="text-center text-gray-400 text-xs mt-6">
            <a href="{{ route('home') }}" class="hover:text-brand-gold">&larr; Back to website</a>
        </p>
    </div>

</body>
</html>
