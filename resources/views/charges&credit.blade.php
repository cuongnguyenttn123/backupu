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
            <h1 style="text-decoration: underline">Charges</h1><br>
            <p>REKKEN charges rate of 1.1% for every abount disburs/claim/refund from the Escrow Holding.</p>
            <h1 style="text-decoration: underline">Credeit</h1><br>
            <p>Credit is point generated for Payer after the Trust account is created.</p>
            <p>REKKEN will generate 1 credit point to Payer for every $1 allocate in the Trust Account.</p>
            <p>The credit point can be redeemed as money at rate of 0.1%.</p>

        </article>
    </section>
</div>
<footer class="bg-dark">
    @include('Layout/footer')
</footer>
</body>
</html>