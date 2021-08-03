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
            <h1 style="text-decoration: underline">Aims</h1><br>
            <p><strong class="color-red">We strive to secure trust in business dealings.</strong></p>
            <p>The prevailing situation of Payment disputes are commonly instigated when there
                is embezzlement between Payer & Payee, such as:
            <ul>
                <li>Failure to receive Goods & Services after Deposit Payment.</li>
                <li>Failure to receive Payment after the delivery of Goods & Services.</li>
            </ul>
            </p>
            <p>We strive to re-establish Trust in business dealing by:
            <ul>
                <li>Eliminating Disputes.</li>
                <li>Building Confidence.</li>
                <li>Implementing Trust/Holding account using web/movile-app platform for business transactions, which can be managed at convenience.</li>
            </ul>
            </p>

        </article>
    </section>
</div>
<footer class="bg-dark">
    @include('Layout/footer')
</footer>
</body>
</html>
