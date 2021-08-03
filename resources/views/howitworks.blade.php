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
            <h1 style="text-decoration: underline">How does it Work</h1><br>
            <p>Simply register to be a user. Registration is Free.</p>
            <p>Read the document attached 'How does it Work' and 'User Agreement'.</p>
            <p>For ease of operation and execution, we have alse provided 'User Manual'.</p>
            <p>When submitting your application to become registered user, you have agreed and accepted the Terms & Conditions provided.</p>
            <ul>
                <li><a class="text-color1" href="#"><strong>Download 'How It Works'.</strong></a></li>
                <li><a class="text-color1" href="#"><strong>Download 'User Agreement'.</strong></a></li>
                <li><a class="text-color1" href="#"><strong>Download 'User Manual'.</strong></a></li>
            </ul>

        </article>
    </section>
</div>
<footer class="bg-dark">
    @include('Layout/footer')
</footer>
</body>
</html>