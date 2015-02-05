<?php
defined('_JEXEC') or die;

require_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'functions.php';

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.caption');

Artx::load("Artx_Content");

$component = new ArtxContent($this, $this->params);
$article = $component->article('article', $this->item, $this->item->params, array('print' => $this->print));

echo $component->beginPageContainer('item-page');
if (strlen($article->pageHeading))
    echo $component->pageHeading($article->pageHeading);
$params = $article->getArticleViewParameters();
if (strlen($article->title)) {
    $params['header-text'] = $this->escape($article->title);
    if (strlen($article->titleLink))
        $params['header-link'] = $article->titleLink;
}
// Build article content
$content = '';
if ('above full article' === $article->paginationPosition)
    $content .= $article->pagination();
if (!$article->introVisible)
    $content .= $article->event('afterDisplayTitle');
$content .= $article->event('beforeDisplayContent');
if (strlen($article->toc))
    $content .= $article->toc($article->toc);
if (strlen($article->text)) {
    if (strlen($article->images['fulltext']['image']))
        $content .= $article->image($article->images['fulltext']);
    if ('above text' === $article->paginationPosition)
        $content .= $article->pagination();
    $content .= $article->text($article->text);
    if ('below text' === $article->paginationPosition)
        $content .= $article->pagination();
    if ($article->showLinks)
        $content .= $this->loadTemplate('links');
}
if ($article->introVisible)
    $content .= $article->intro($article->intro);
if (strlen($article->readmore))
    $content .= $article->readmore($article->readmore, $article->readmoreLink);
if ('below full article' === $article->paginationPosition)
    $content .= $article->pagination();
$content .= $article->event('afterDisplayContent');
$params['content'] = $content;
// Change the order of ""if"" statements to change the order of article metadata footer items.
// Build tags 
if (strlen($article->tags))
    $params['metadata-footer-icons'][] = "<span class=\"art-posttagicon\">" . $article->tags . "</span>";

// Render article
echo $article->article($params);
echo $component->endPageContainer();
