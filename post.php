<?php $this->need('header.php'); ?>

<article class="post-detail">
    <?php $backLabel = $this->options->labelBack ? htmlspecialchars($this->options->labelBack, ENT_QUOTES, 'UTF-8') : '← 返回作品集'; ?>
    <a href="<?php $this->options->siteUrl(); ?>" class="back-link"><?php echo $backLabel; ?></a>

    <?php $heroImg = getFirstImage($this->content); ?>
    <?php if ($heroImg): ?>
    <div class="post-hero">
        <img src="<?php echo $heroImg; ?>" alt="<?php echo htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8'); ?>" class="post-hero-image">
    </div>
    <?php endif; ?>

    <div class="post-content">
        <h1 class="post-title"><?php $this->title(); ?></h1>
        <div class="post-meta">
            <span class="text-secondary"><?php $this->category(); ?></span>
            <span class="meta-dot">·</span>
            <span class="text-secondary"><?php $this->date('Y'); ?></span>
            <span class="tag-list"><?php $this->tags(' '); ?></span>
        </div>

        <div class="post-body">
            <?php echo preg_replace('/<img[^>]+>/', '', $this->content); ?>
        </div>
    </div>

</article>

<?php
ob_start(); $this->theNext('%s'); $nextHtml = ob_get_clean();
ob_start(); $this->thePrev('%s'); $prevHtml = ob_get_clean();
$hasNext = !empty(trim($nextHtml));
$hasPrev = !empty(trim($prevHtml));
$nextUrl = $nextTitle = '';
$prevUrl = $prevTitle = '';
if ($hasNext && preg_match('/href="([^"]+)".*?>([^<]+)</', $nextHtml, $m)) { $nextUrl = htmlspecialchars($m[1], ENT_QUOTES, 'UTF-8'); $nextTitle = htmlspecialchars($m[2], ENT_QUOTES, 'UTF-8'); }
if ($hasPrev && preg_match('/href="([^"]+)".*?>([^<]+)</', $prevHtml, $m)) { $prevUrl = htmlspecialchars($m[1], ENT_QUOTES, 'UTF-8'); $prevTitle = htmlspecialchars($m[2], ENT_QUOTES, 'UTF-8'); }
$prevLabel = $this->options->labelPrev ? htmlspecialchars($this->options->labelPrev, ENT_QUOTES, 'UTF-8') : '← 上一个作品';
$nextLabel = $this->options->labelNext ? htmlspecialchars($this->options->labelNext, ENT_QUOTES, 'UTF-8') : '下一个作品 →';
?>
<?php if ($hasNext || $hasPrev): ?>
<nav class="post-nav">
    <?php if ($hasNext): ?>
    <div class="post-nav-item">
        <a href="<?php echo $nextUrl; ?>" class="post-nav-label"><?php echo $prevLabel; ?></a>
        <span class="post-nav-title"><?php echo $nextTitle; ?></span>
    </div>
    <?php endif; ?>
    <?php if ($hasPrev): ?>
    <div class="post-nav-item post-nav-next">
        <a href="<?php echo $prevUrl; ?>" class="post-nav-label"><?php echo $nextLabel; ?></a>
        <span class="post-nav-title"><?php echo $prevTitle; ?></span>
    </div>
    <?php endif; ?>
</nav>
<?php endif; ?>

<?php $this->need('footer.php'); ?>
