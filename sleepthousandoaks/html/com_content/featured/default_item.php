<?php
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers'); 
JHtml::_('behavior.tooltip');

Artx::load("Artx_Content");

$component = new ArtxContent($this, $this->params);
$article = $component->article('featured', $this->item, $this->item->params);

$params = $article->getArticleViewParameters();
if (strlen($article->title)) {
    $params['header-text'] = $this->escape($article->title);
    if (strlen($article->titleLink))
        $params['header-link'] = $article->titleLink;
}
// Build article content
$content = '';
if (!$article->introVisible)
    $content .= $article->event('afterDisplayTitle');
$content .= $article->event('beforeDisplayContent');
if (strlen($article->images['intro']['image']))
    $content .= $article->image($article->images['intro']);
$content .= $article->intro(artxBalanceTags($article->intro));
if (strlen($article->readmore))
    $content .= $article->readmore($article->readmore, $article->readmoreLink);
$content .= $article->event('afterDisplayContent');
$params['content'] = $content;
// Change the order of ""if"" statements to change the order of article metadata footer items.
// Build tags 
if (strlen($article->tags))
    $params['metadata-footer-icons'][] = "<span class=\"art-posttagicon\">" . $article->tags . "</span>";

// Render article
echo $article->article($params);
