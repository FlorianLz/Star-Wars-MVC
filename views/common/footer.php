        </div>
        <?php if(!\utils\SessionHelpers::isInBackOffice()){ ?>
        <footer class="footer">
            <div class="container">
                <div class="footer--content">
                    <nav class="footer--link">
                        <a class="footer--link_item" href="/films">* films</a>
                        <a class="footer--link_item" href="/actors">% acteurs</a>
                        <a class="footer--link_item" href="/galerie">$ galerie</a>
                    </nav>
                    <p class="footer--text">© 2023 - Star Wars ECV</p>
                    <img id="easter-egg" class="easter--egg" src="/public/images/millenium.png">
                </div>
            </div>
        </footer>
        <?php } ?>
        <script src="/public/js/script.js" ></script>
    </body>
</html>
