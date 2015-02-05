<?php
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.caption');

if (method_exists('JHtml','core')) 
	JHtml::core();
else
	JHtml::_('behavior.framework');

Artx::load("Artx_Content");

$component = new ArtxContent($this, $this->params);
$article = $component->article('category', $this->item, $this->item->params);

if (version_compare(JVERSION, '3.1.0') >= 0) {
    if ($this->params->get('show_tags', 1) && !empty($this->category->tags->itemTags)) {
        $this->category->tagLayout = new JLayoutFile('joomla.content.tags');
        $article->tags = $this->category->tagLayout->render($this->category->tags->itemTags);
    }
}

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
