<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 90vh;
            background-color: white; /* Background putih */
        }

        .logo {
            width: 100px; /* Sesuaikan ukuran logo */
            margin-bottom: 10px;
        }

        .login-container {
            background: #50B83B; /* Warna hijau untuk login box */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 260px;
            height: 55%;
            text-align: center;
        }

        h2 {
            color: white; /* Supaya lebih kontras di background hijau */
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0px;
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

        .checkbox-container {
            margin: 10px 0px 10px 10px;
            display: flex;
            align-items: center;
            font-size: 14px;
            gap: 10px; 
            justify-content: flex-start;
            color: white;
        }

        .checkbox-container input {
            width: 16px; 
            height: 16px;
            margin: 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #ccc;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background: #bbb;
        }
        .error {
            color: red;
            font-size: 14px;
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
            <input type="text" name="email" placeholder="Masukkan Email" required>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <div class="checkbox-container">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ingatkan saya</label>
            </div>

            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>
