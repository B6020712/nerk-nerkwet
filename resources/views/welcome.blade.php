<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nerk | Nerkwet</title>

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js" integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script src="http://127.0.0.1:5173/resources/js/crypto-js.min.js"></script>

        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div id="app"></div>

        <script lang="text/javascript">
            var data = [{id: 1}, {id: 2}]

            // Encrypt
            var ciphertext = CryptoJS.AES.encrypt(JSON.stringify(data), 'secret key 123').toString();

            // Decrypt
            var bytes  = CryptoJS.AES.decrypt(ciphertext, 'secret key 123');
            var decryptedData = JSON.parse(bytes.toString(CryptoJS.enc.Utf8));

            console.log(ciphertext); // [{id: 1}, {id: 2}]
            console.log(decryptedData); // [{id: 1}, {id: 2}]
        </script>
    </body>
</html>