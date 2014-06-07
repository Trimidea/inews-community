<?php

namespace Helper;


class Url
{
    public static function parseEmbed($url)
    {
        $embed = array();
        if (preg_match('/http:\/\/v.youku.com\/v_show\/id_([a-zA-Z0-9]+).html/', $url, $m)) {
            $embed = array(
                'type' => 'html',
                'url'  => 'http://player.youku.com/embed/' . $m[1] . ''
            );
        }

        $embed['html'] = self::parseEmbedHtml($embed);
        return $embed;
    }

    public static function parseEmbedHtml($embed)
    {
        if (!$embed) return;

        switch ($embed['type']) {
            case 'html':
                return '<iframe src="' . $embed['url'] . '" height=498 width=510 ></iframe>';
                break;
        }

        return '';
    }
}
