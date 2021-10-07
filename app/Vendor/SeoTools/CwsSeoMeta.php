<?php


namespace App\Vendor\SEOTools;


use Artesaos\SEOTools\SEOMeta;
use Illuminate\Support\Arr;

class CwsSEOMeta extends SEOMeta
{
    public function generate($minify = false)
    {
        $this->loadWebMasterTags();

        $description = $this->getDescription();
        $keywords = $this->getKeywords();
        $metatags = $this->getMetatags();
        $canonical = $this->getCanonical();
        $amphtml = $this->getAmpHtml();
        $prev = $this->getPrev();
        $next = $this->getNext();
        $languages = $this->getAlternateLanguages();
        $robots = $this->getRobots();

        $html = [];


        if ($description) {
            $html[] = "<meta name=\"description\" content=\"{$description}\">";
        }

        if (!empty($keywords)) {

            if($keywords instanceof \Illuminate\Support\Collection){
                $keywords = $keywords->toArray();
            }

            $keywords = implode(', ', $keywords);
            $html[] = "<meta name=\"keywords\" content=\"{$keywords}\">";
        }

        foreach ($metatags as $key => $value) {
            $name = $value[0];
            $content = $value[1];

            // if $content is empty jump to nest
            if (empty($content)) {
                continue;
            }

            $html[] = "<meta {$name}=\"{$key}\" content=\"{$content}\">";
        }

        if ($canonical) {
            $html[] = "<link rel=\"canonical\" href=\"{$canonical}\"/>";
        }

        if ($amphtml) {
            $html[] = "<link rel=\"amphtml\" href=\"{$amphtml}\"/>";
        }

        if ($prev) {
            $html[] = "<link rel=\"prev\" href=\"{$prev}\"/>";
        }

        if ($next) {
            $html[] = "<link rel=\"next\" href=\"{$next}\"/>";
        }

        foreach ($languages as $lang) {
            $html[] = "<link rel=\"alternate\" hreflang=\"{$lang['lang']}\" href=\"{$lang['url']}\"/>";
        }

        if ($robots) {
            $html[] = "<meta name=\"robots\" content=\"{$robots}\">";
        }

        return ($minify) ? implode('', $html) : implode(PHP_EOL, $html);
    }


    public function generateTitle()
    {
        $title = $this->getTitle();

        $html = [];

        if ($title) {
            $html[] = Arr::get($this->config, 'add_notranslate_class', false) ? "<title class=\"notranslate\">$title</title>" : "<title>$title</title>";
        }

        return implode(PHP_EOL, $html);
    }


}
