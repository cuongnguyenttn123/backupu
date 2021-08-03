<html>
<head>
    @include('Layout/head')
</head>
<body>
    <header>
        @include('Layout/header')
    </header>
    <div class="container">
        <section>
            @include('Layout/siderbar')
            <article>
                <h1 style="text-decoration: underline">About Us</h1><br>
                <p>We are facilitating Escro Holding services by implementing Virtual Trust Account system for 'Registered User' (Payers & payees). Using our facility, the money in the Holdings:</p>
                <ul>
                    <li>Becomes proof of available fund without making Deposit Payment.</li>
                    <li>Is guaranteed available to designated Payee.</li>
                    <li>Can only be disbursed by the approval of Payer.</li>
                    <li>Can only be refunded by the approval of Payer.</li>
                </ul>

            </article>
        </section>
    </div>
    <footer class="bg-dark">
        @include('Layout/footer')
    </footer>
</body>
</html>

