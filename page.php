<?php $this->need('header.php'); ?>

<section class="about-page">
    <div class="about-grid">
        <div class="about-photo">
            <?php
            $content = $this->content;
            if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/', $content, $matches)) {
                echo '<img src="' . htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8') . '">';
            }
            ?>
        </div>
        <div class="about-content">
            <h1 class="about-name"><?php $this->title(); ?></h1>
            <div class="about-body">
                <?php
                $body = preg_replace('/<img[^>]+>/', '', $this->content, 1);
                echo $body;
                ?>
            </div>
        </div>
    </div>
</section>

<?php $this->need('footer.php'); ?>
