<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: white;
            margin: 0;
        }

        .login-container {
            background: #50B83B;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 360px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 300px;
        }

        h2 {
            color: white;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .form-body {
            flex-grow: 1;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #ccc;
            background: transparent;
            font-size: 16px;
            outline: none;
            color: white;
        }

        input::placeholder {
            color: white;
        }

        /* .checkbox-container {
            display: flex;
            align-items: center;
            font-size: 14px;
            gap: 10px;
            justify-content: flex-start;
            color: white;
            margin: 10px 0;
        }

        .checkbox-container input[type="checkbox"] {
            width: 16px;
            height: 16px;
        } */

        button {
            width: 100%;
            padding: 10px;
            background: #ccc;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #bbb;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Responsif Tablet */
        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
                max-width: 400px;
                width: 37%;
                height: 270px;
            }

            h2 {
                font-size: 24px;
                margin: 8px 0;
            }

            input {
                padding: 8px;
                font-size: 16px;
            }

            input::placeholder {
                color: white;
            }

            button {
                padding: 9px;
                font-size: 16px;
            }

            button:hover {
                background: #bbb;
            }

            .error {
                color: red;
                font-size: 14px;
                margin-bottom: 5px;
            }
        }

        /* Responsif HP */
        @media (max-width: 480px) {
            .login-container {
                width: 55%;
                max-width: 100%;
                height: 230px;
                padding: 20px;
            }

            h2 {
                font-size: 20px;
                margin: 4px 0;
            }

            input {
                padding: 7px;
                font-size: 14px;
            }

            input::placeholder {
                color: white;
            }

            button {
                padding: 8px;
                font-size: 14px;
            }

            button:hover {
                background: #bbb;
            }

            .error {
                color: red;
                font-size: 10px;
                margin-bottom: 1px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>LOGIN</h2>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-body">
                <input type="text" name="username" placeholder="Masukkan Username..." required>
                <input type="password" name="password" placeholder="Masukkan Password" required>

                {{-- <div class="checkbox-container">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Ingatkan saya</label>
                </div> --}}
            </div>

            <button type="submit">Log In</button>
        </form>
    </div>
</body>

</html>
