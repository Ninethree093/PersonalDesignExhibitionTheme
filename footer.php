    </main>
    <footer class="site-footer">
        <div class="footer-inner">
            <span class="footer-copyright">&copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?></span>
            <?php $socialLinks = $this->options->socialLinks; ?>
            <?php if (!empty($socialLinks)): ?>
            <div class="footer-social">
                <?php foreach (explode("\n", $socialLinks) as $line):
                    $line = trim($line);
                    if (empty($line)) continue;
                    $parts = explode('|', $line, 2);
                    $label = trim($parts[0]);
                    $url = isset($parts[1]) ? trim($parts[1]) : $this->options->siteUrl();
                    if (empty($label) || empty($url)) continue;
                ?>
                <a href="<?php echo htmlspecialchars($url); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($label); ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <?php $this->footer(); ?>
    <script src="<?php $this->options->themeUrl(); ?>/assets/js/mobile-nav.js"></script>
    <script src="<?php $this->options->themeUrl(); ?>/assets/js/page-transition.js"></script>
    <script src="<?php $this->options->themeUrl(); ?>/assets/js/filter.js"></script>
    <script src="<?php $this->options->themeUrl(); ?>/assets/js/scroll-reveal.js"></script>
    <script src="<?php $this->options->themeUrl(); ?>/assets/js/hero-orientation.js"></script>
</body>
</html>
