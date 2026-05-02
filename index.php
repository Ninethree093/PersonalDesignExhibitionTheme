<?php $this->need('header.php'); ?>

<?php
// 获取置顶文章作为焦点区（单独查询，不污染主循环）
$this->widget('Widget_Archive@index-featured', 'pageSize=1&type=single sticky=1')->to($featured);
$featuredCid = 0;
if ($featured->have()) {
    $featuredCid = $featured->cid;
}
?>

<?php if ($featuredCid > 0): ?>
<section class="featured-section">
    <a href="<?php $featured->permalink(); ?>" class="featured-card" data-page-transition>
        <?php
        $img = getFirstImage($featured->content);
        if ($img) {
            echo '<img src="' . $img . '" alt="' . htmlspecialchars($featured->title, ENT_QUOTES, 'UTF-8') . '" class="featured-image">';
        }
        ?>
        <div class="featured-info">
            <span class="label">FEATURED</span>
            <h1 class="featured-title"><?php $featured->title(); ?></h1>
            <span class="text-secondary"><?php $featured->category(' &middot; '); ?> · <?php $featured->date('Y'); ?></span>
        </div>
    </a>
</section>
<?php endif; ?>

<?php $filterAll = $this->options->labelFilterAll ? htmlspecialchars($this->options->labelFilterAll, ENT_QUOTES, 'UTF-8') : '全部'; ?>
<div class="filter-bar" id="filter-bar">
    <button class="filter-btn active" data-category="all"><?php echo $filterAll; ?></button>
    <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
    <?php while ($categories->next()): ?>
        <button class="filter-btn" data-category="<?php $categories->slug(); ?>"><?php $categories->name(); ?></button>
    <?php endwhile; ?>
</div>

<section class="works-grid">
    <?php while ($this->next()): ?>
    <?php if ($this->cid == $featuredCid) continue; ?>
    <?php $workCategories = $this->categories; ?>
    <article class="work-card reveal" data-category="<?php echo isset($workCategories[0]) ? $workCategories[0]['slug'] : ''; ?>" data-page-transition>
        <a href="<?php $this->permalink(); ?>" class="card-link">
            <div class="card-image-wrap">
                <?php
                $img = getFirstImage($this->content);
                if ($img) {
                    echo '<img src="' . $img . '" alt="' . htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8') . '" class="card-image" loading="lazy">';
                }
                ?>
                <div class="card-overlay">
                    <span class="card-overlay-title"><?php $this->title(); ?></span>
                    <span class="card-overlay-meta"><?php $this->category(); ?></span>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-title"><?php $this->title(); ?></h3>
                <span class="text-secondary"><?php $this->category(); ?> · <?php $this->date('Y'); ?></span>
            </div>
        </a>
    </article>
    <?php endwhile; ?>
</section>

<?php $this->need('footer.php'); ?>
