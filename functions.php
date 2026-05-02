<?php
/**
 * Portfolio Theme Functions
 */

/**
 * 从正文中提取第一张图片的 src
 */
function getFirstImage($content) {
    if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/', $content, $matches)) {
        return htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8');
    }
    return '';
}

/**
 * 主题配置
 */
function themeConfig($form) {
    // Navigation
    $navWorksLabel = new Typecho_Widget_Helper_Form_Element_Text('navWorksLabel', NULL, '作品', _t('首页导航标签'));
    $form->addInput($navWorksLabel);

    $navAboutSlug = new Typecho_Widget_Helper_Form_Element_Text('navAboutSlug', NULL, 'about', _t('关于页 Slug（留空则使用页面标题）'));
    $form->addInput($navAboutSlug);

    $navAboutLabel = new Typecho_Widget_Helper_Form_Element_Text('navAboutLabel', NULL, '关于', _t('关于页导航标签'));
    $form->addInput($navAboutLabel);

    // Post detail labels
    $labelBack = new Typecho_Widget_Helper_Form_Element_Text('labelBack', NULL, '← 返回作品集', _t('详情页返回链接文案'));
    $form->addInput($labelBack);

    $labelPrev = new Typecho_Widget_Helper_Form_Element_Text('labelPrev', NULL, '← 上一个作品', _t('上一个作品链接文案'));
    $form->addInput($labelPrev);

    $labelNext = new Typecho_Widget_Helper_Form_Element_Text('labelNext', NULL, '下一个作品 →', _t('下一个作品链接文案'));
    $form->addInput($labelNext);

    // Index page
    $labelFilterAll = new Typecho_Widget_Helper_Form_Element_Text('labelFilterAll', NULL, '全部', _t('筛选栏「全部」按钮文案'));
    $form->addInput($labelFilterAll);

    // Social links
    $socialLinks = new Typecho_Widget_Helper_Form_Element_Textarea('socialLinks', NULL, "Instagram|https://instagram.com\nBehance|https://behance.net\nDribbble|https://dribbble.com", _t('社交链接'), _t('每行一个，格式：名称|链接地址'));
    $form->addInput($socialLinks);
}
