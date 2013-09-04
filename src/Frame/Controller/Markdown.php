<?php

namespace Frame\Controller;

use dflydev\markdown\MarkdownParser;

/**
 * Class Markdown
 * A controller that automatically renders markdown.
 *
 * @package Frame\Controller
 */
class Markdown extends Base {

    public function _render($out, $args) {
        parent::_render($out, $args);

        $parser = new MarkdownParser();

        return $parser->transformMarkdown($out);
    }

}
