<?php
/**
 * Helper Functions
 *
 * Filename:        helpers.php
 * Location:        /
 * Project:         XXX-SaaS-Vanilla-MVC-YYYY-SN
 * Date Created:    13/03/2025
 *
 * Author:          Adrian Gould <Adrian.Gould@nmtafe.wa.edu.au>
 *
 */

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\HTMLToMarkdown\HtmlConverter;

/**
 * Get the base path
 *
 * BasePath function to provide accurate paths to files
 *
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}


/**
 * Load a view
 *
 * @param string $name
 * @return void
 */
function loadView($name, $data = [])
{
    $viewPath = basePath("App/Views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name} not found!'";
    }
}


/**
 * Load a partial
 *
 * @param string $name
 * @return string
 *
 */
function loadPartial($name, $data = [])
{
    $partialPath = basePath("App/Views/partials/{$name}.view.php");

    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial '{$name} not found!'";
    }
}


/**
 * Inspect a value(s)
 *
 * @param mixed $value
 * @return void
 */
function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    /**
     * Inspect a value(s) and die
     *
     * @param mixed $value
     * @return void
     */
    function inspectAndDie($value)
    {
        inspect($value);
        die();
    }

    echo '</pre>';
}


/**
 * Dump the values of one or more variables, objects or similar.
 *
 * @return void
 */
function dump(): void
{
    echo "<pre class='bg-gray-100 color-black m-2 p-2 rounded shadow flex-grow text-sm'>";
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
    echo "</pre>";
}


/**
 * Dump the values of one or more variables, objects or similar, then terminate the script.
 *
 * @return void
 */
function dd(): void
{
    echo "<pre class='bg-gray-100 color-black m-2 p-2 rounded shadow flex-grow text-sm'>";
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
    echo "</pre>";
    die();
}


/**
 * Sanitize Data
 *
 * @param string $dirty
 * @return string
 */
function sanitize($dirty)
{
    return filter_var(trim($dirty), FILTER_SANITIZE_SPECIAL_CHARS);
}


/**
 * Redirect to a given url
 *
 * @param string $url
 * @return void
 */
function redirect($url)
{
    header("Location: {$url}");
    exit;
}


/**
 * Convert HTML to Markdown
 *
 * @param string $html HTML content to convert
 * @return string Markdown content
 */
if (!function_exists('htmlToMarkdown')) {
    function htmlToMarkdown($html)
    {
        $converter = new HtmlConverter([
            'header_style' => 'atx', // This ensures # style headers
            'strip_tags' => false,
            'remove_nodes' => 'script style',
        ]);
        return $converter->convert($html);
    }
}


/**
 * Convert Markdown to HTML
 *
 * @param string $markdown Markdown content to convert
 * @return string HTML content
 */
if (!function_exists('markdownToHtml')) {
    function markdownToHtml($markdown)
    {
        $config = [
            'html_input' => 'allow', // this ensures our font colours are displayed in the submissions view
            'allow_unsafe_links' => false,
        ];

        $converter = new GithubFlavoredMarkdownConverter($config);
        return $converter->convert($markdown);
    }
}


/**
 * Convert RGB (Decimal) to OKLCH colour
 *
 * @param $r
 * @param $g
 * @param $b
 * @return float[]
 *
 * Reference: Request for community contributions: Converting RGB values to OKLCH ·
 * Issue #15419 · filamentphp/filament. (2025). GitHub. https://github.com/filamentphp/filament/issues/15419
 */
function rgbToOklab($r, $g, $b)
{
    // Normalize RGB values to the range [0, 1]
    $r = $r / 255;
    $g = $g / 255;
    $b = $b / 255;

    // Linearize RGB values
    $r = $r <= 0.04045 ? $r / 12.92 : pow(($r + 0.055) / 1.055, 2.4);
    $g = $g <= 0.04045 ? $g / 12.92 : pow(($g + 0.055) / 1.055, 2.4);
    $b = $b <= 0.04045 ? $b / 12.92 : pow(($b + 0.055) / 1.055, 2.4);

    // Convert to linear light values
    $l = 0.4122214708 * $r + 0.5363325363 * $g + 0.0514459929 * $b;
    $m = 0.2119034982 * $r + 0.6806995451 * $g + 0.1073969566 * $b;
    $s = 0.0883024619 * $r + 0.2817188376 * $g + 0.6299787005 * $b;

    // Apply the OKLab transformation
    $l_ = pow($l, 1 / 3);
    $m_ = pow($m, 1 / 3);
    $s_ = pow($s, 1 / 3);

    $L = 0.2104542553 * $l_ + 0.7936177850 * $m_ - 0.0040720468 * $s_;
    $a = 1.9779984951 * $l_ - 2.4285922050 * $m_ + 0.4505937099 * $s_;
    $b = 0.0259040371 * $l_ + 0.7827717662 * $m_ - 0.8086757660 * $s_;

    return ['L' => $L, 'a' => $a, 'b' => $b];
}

/**
 * Convert Lab Colour to OKLCH Colour
 *
 * @param $L
 * @param $a
 * @param $b
 * @return array
 *
 *  Reference: Request for community contributions: Converting RGB values to OKLCH ·
 *  Issue #15419 · filamentphp/filament. (2025). GitHub. https://github.com/filamentphp/filament/issues/15419
 */
function oklabToOklch($L, $a, $b)
{
    $C = sqrt($a * $a + $b * $b); // Chroma
    $h = atan2($b, $a); // Hue in radians

    // Convert hue to degrees and ensure it's in [0, 360)
    $H = rad2deg($h);
    if ($H < 0) {
        $H += 360;
    }

    return ['L' => $L, 'C' => $C, 'H' => $H];
}

/**
 * Convert RGB to OKLCH Colour
 *
 * Example use:
 * $rgb = [197, 193, 105]; // Amber color
 * $oklch = rgbToOklch($rgb[0], $rgb[1], $rgb[2]);
 *
 * @param $r
 * @param $g
 * @param $b
 * @return array
 *
 *  Reference: Request for community contributions: Converting RGB values to OKLCH ·
 *  Issue #15419 · filamentphp/filament. (2025). GitHub. https://github.com/filamentphp/filament/issues/15419
 */
function rgbToOklch($r, $g, $b)
{
    $oklab = rgbToOklab($r, $g, $b);
    return oklabToOklch($oklab['L'], $oklab['a'], $oklab['b']);
}

/**
 * Convert HEX RGB into Decimal RGB array
 *
 * @param $hex_code
 * @return array
 */
function hexRgbToDec($hex_code)
{
    $r = $hex_code[0] . $hex_code[1];
    $g = $hex_code[2] . $hex_code[3];
    $b = $hex_code[4] . $hex_code[5];

    return [hexdec($r), hexdec($g), hexdec($b)];
}


/**
 * Hexadecimal RGB to OKLCH Colour
 *
 * @param $hex_code
 * @return array
 */
function hexRgbToOklch($hex_code)
{
    $rgb = hexRgbToDec($hex_code);

    $r = $rgb[0];
    $g = $rgb[1];
    $b = $rgb[2];

    $oklab = rgbToOklab($r, $g, $b);
    return oklabToOklch($oklab['L'], $oklab['a'], $oklab['b']);
}