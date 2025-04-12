<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #d4fc79, #96e6a1);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding-top: 40px;
        }

        .logo {
            width: 230px;
            margin-bottom: 30px;
        }

        .login-container {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #50B83B;
            margin-bottom: 25px;
            font-weight: 700;
        }

        .form-group {
            width: 100%;
            margin-bottom: 18px;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        input:focus {
            border-color: #50B83B;
            outline: none;
        }

        input::placeholder {
            color: #999;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #50B83B;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #3e9631;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 25px 20px;
            }

            h2 {
                font-size: 22px;
            }

            input,
            button {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Logo di paling atas -->
    <img src="{{ asset('foto/logo.png') }}" alt="Logo" class="logo" />

    <!-- Kotak login -->
    <div class="login-container">
        <h2>LOGIN</h2>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST" style="width: 100%;">
            @csrf

            <div class="form-group">
                <input type="text" name="username" placeholder="Masukkan Username..." required />
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Masukkan Password..." required />
            </div>

            <button type="submit">Masuk</button>
        </form>
    </div>
</body>

</html>
