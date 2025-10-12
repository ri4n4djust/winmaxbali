<?php
// helper to generate a table of contents from HTML content.
// returns ['toc' => '<ul>...</ul>', 'content' => '<p>modified headings with ids</p>']
if (!function_exists('generate_toc_from_content')) {
    function generate_toc_from_content(string $html, int $minLevel = 2, int $maxLevel = 6): array
    {
        // normalize level bounds
        $minLevel = max(1, min(6, $minLevel));
        $maxLevel = max($minLevel, min(6, $maxLevel));

        libxml_use_internal_errors(true);
        $doc = new DOMDocument();
        // ensure UTF-8 handling for fragments
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $xpath = new DOMXPath($doc);

        // build xpath to select headings in range
        $exprParts = [];
        for ($i = $minLevel; $i <= $maxLevel; $i++) $exprParts[] = "h{$i}";
        $xpathExpr = '//' . implode(' | //', $exprParts);

        $existingIds = [];
        // collect headings
        $headings = [];
        foreach ($xpath->query($xpathExpr) as $node) {
            if (!$node instanceof DOMElement) continue;
            $level = intval(substr($node->nodeName, 1)); // h2 -> 2
            $text = trim($node->textContent);
            if ($text === '') continue;

            // ensure unique id
            $id = $node->getAttribute('id');
            if ($id === '') {
                $base = slugify($text);
                $id = $base === '' ? 'heading' : $base;
                $suffix = 1;
                while (in_array($id, $existingIds, true)) {
                    $id = $base . '-' . $suffix++;
                }
                $node->setAttribute('id', $id);
            }
            $existingIds[] = $id;

            $headings[] = [
                'level' => $level,
                'id' => $id,
                'text' => $text,
            ];
        }

        // build nested UL markup
        $toc = '';
        $prevLevel = null;
        foreach ($headings as $h) {
            $lvl = $h['level'];
            if ($prevLevel === null) {
                // open initial lists
                for ($i = $minLevel; $i < $lvl; $i++) { $toc .= '<ul>'; }
                $toc .= '<ul>';
            } else {
                if ($lvl > $prevLevel) {
                    for ($i = $prevLevel; $i < $lvl; $i++) { $toc .= '<ul>'; }
                } elseif ($lvl < $prevLevel) {
                    for ($i = $lvl; $i < $prevLevel; $i++) { $toc .= '</li></ul>'; }
                    $toc .= '</li>';
                } else {
                    $toc .= '</li>';
                }
            }
            $toc .= '<li><a href="#' . htmlspecialchars($h['id'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '">' . htmlspecialchars($h['text'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</a>';
            $prevLevel = $lvl;
        }
        if ($prevLevel !== null) {
            // close remaining open lists
            for ($i = $minLevel; $i <= $prevLevel; $i++) { $toc .= '</li></ul>'; }
            // tidy possible mismatched tags
            $toc = preg_replace('#</ul></li>$#', '</ul>', $toc);
        }

        // get modified content (innerHTML of body)
        $body = $doc->getElementsByTagName('body')->item(0);
        $modified = '';
        if ($body) {
            foreach ($body->childNodes as $child) {
                $modified .= $doc->saveHTML($child);
            }
        } else {
            // fallback
            $modified = $doc->saveHTML();
        }

        libxml_clear_errors();

        return ['toc' => $toc === '' ? '' : $toc, 'content' => $modified];
    }
}

if (!function_exists('slugify')) {
    function slugify(string $text): string
    {
        // transliterate
        $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
        // to lowercase
        $text = strtolower($text);
        // replace non alnum with hyphens
        $text = preg_replace('/[^a-z0-9]+/', '-', $text);
        $text = trim($text, '-');
        return $text;
    }
}