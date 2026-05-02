<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
    <?php $this->header(); ?>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a href="<?php $this->options->siteUrl(); ?>" class="logo"><?php $this->options->title(); ?></a>
            <nav class="main-nav">
                <?php $worksLabel = $this->options->navWorksLabel ? htmlspecialchars($this->options->navWorksLabel, ENT_QUOTES, 'UTF-8') : '作品'; ?>
                <a href="<?php $this->options->siteUrl(); ?>" class="nav-link<?php if ($this->is('index')): ?> active<?php endif; ?>"><?php echo $worksLabel; ?></a>
                <?php $aboutSlug = $this->options->navAboutSlug; ?>
                <?php $aboutLabel = $this->options->navAboutLabel ? htmlspecialchars($this->options->navAboutLabel, ENT_QUOTES, 'UTF-8') : '关于'; ?>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while ($pages->next()): ?>
                    <?php $navLabel = ($aboutSlug && $pages->slug === $aboutSlug) ? $aboutLabel : $pages->title(); ?>
                    <a href="<?php $pages->permalink(); ?>" class="nav-link<?php if ($this->is('page', $pages->slug)): ?> active<?php endif; ?>"><?php echo $navLabel; ?></a>
                <?php endwhile; ?>
            </nav>
            <button class="hamburger" aria-label="Menu" id="menu-toggle">
                <span></span><span></span><span></span>
            </button>
        </div>
        <!-- Mobile sidebar -->
        <div class="mobile-nav-overlay" id="mobile-overlay"></div>
        <nav class="mobile-nav" id="mobile-nav">
            <a href="<?php $this->options->siteUrl(); ?>" class="mobile-nav-link"><?php echo $worksLabel; ?></a>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while ($pages->next()): ?>
                <?php $navLabel = ($aboutSlug && $pages->slug === $aboutSlug) ? $aboutLabel : $pages->title(); ?>
                <a href="<?php $pages->permalink(); ?>" class="mobile-nav-link"><?php echo $navLabel; ?></a>
            <?php endwhile; ?>
        </nav>
    </header>
    <main class="site-main">
