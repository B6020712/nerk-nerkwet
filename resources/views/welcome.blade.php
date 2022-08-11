<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nerk | Nerkwet</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div id="app"></div>

        <section class="encrypt-decrypt aes-gcm">
            <h2 class="encrypt-decrypt-heading">AES-GCM</h2>
            <section class="encrypt-decrypt-controls">
                <div class="message-control">
                    <label for="aes-gcm-message">Enter a message to encrypt:</label>
                    <input type="text" id="aes-gcm-message" name="message" size="25" value="The bunny hops at teatime">
                </div>
                <div class="ciphertext">Ciphertext:<span class="ciphertext-value"></span></div>
                <div class="decrypted">Decrypted:<span class="decrypted-value"></span></div>
                <input class="encrypt-button" type="button" value="Encrypt">
                <input class="decrypt-button" type="button" value="Decrypt">
            </section>
        </section>
        
        <script>
            // const text = 'An obscure body in the S-K System, your majesty. The inhabitants refer to it as the planet Earth.';

            // async function digestMessage(message) {
            //     const msgUint8 = new TextEncoder().encode(message);                           // encode as (utf-8) Uint8Array
            //     const hashBuffer = await crypto.subtle.digest('SHA-256', msgUint8);           // hash the message
            //     const hashArray = Array.from(new Uint8Array(hashBuffer));                     // convert buffer to byte array
            //     const hashHex = hashArray.map((b) => b.toString(16).padStart(2, '0')).join(''); // convert bytes to hex string
            //     return hashHex;
            // }
            // digestMessage(text).then((digestHex) => console.log(digestHex));
            
            (() => {

                let ciphertext;
                let iv;

                function getMessageEncoding() {
                    const messageBox = document.querySelector("#aes-gcm-message");
                    let message = messageBox.value;
                    // let message = "this message let you know that encrypt successful.";
                    let enc = new TextEncoder();
                    return enc.encode(message);
                }

                async function encryptMessage(key) {
                    let encoded = getMessageEncoding();
                    // The iv must never be reused with a given key.
                    iv = window.crypto.getRandomValues(new Uint8Array(12));
                    ciphertext = await window.crypto.subtle.encrypt( { name: "AES-GCM", iv: iv }, key, encoded );
                    console.log(ciphertext)
                    let buffer = new Uint8Array(ciphertext, 0, 5);
                    const ciphertextValue = document.querySelector(".aes-gcm .ciphertext-value");
                    ciphertextValue.classList.add('fade-in');
                    ciphertextValue.addEventListener('animationend', () => {
                        ciphertextValue.classList.remove('fade-in');
                    });
                    ciphertextValue.textContent = `${buffer}...[${ciphertext.byteLength} bytes total]`;
                }

                async function decryptMessage(key) {
                    let decrypted = await window.crypto.subtle.decrypt( { name: "AES-GCM", iv: iv }, key, ciphertext );

                    let dec = new TextDecoder();
                    const decryptedValue = document.querySelector(".aes-gcm .decrypted-value");
                    decryptedValue.classList.add('fade-in');
                    decryptedValue.addEventListener('animationend', () => {
                        decryptedValue.classList.remove('fade-in');
                    });
                    decryptedValue.textContent = dec.decode(decrypted);
                }

                window.crypto.subtle.generateKey(
                    { name: "AES-GCM", length: 256, }, true, ["encrypt", "decrypt"]
                ).then((key) => {
                    const encryptButton = document.querySelector(".aes-gcm .encrypt-button");
                    encryptButton.addEventListener("click", () => {
                        encryptMessage(key);
                    });

                    const decryptButton = document.querySelector(".aes-gcm .decrypt-button");
                    decryptButton.addEventListener("click", () => {
                        decryptMessage(key);
                    });
                });
            })();
            
        </script>
    </body>
</html>