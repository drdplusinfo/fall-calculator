<?php
namespace DrdPlus\Calculators\Fall;

use DrdPlus\CalculatorSkeleton\CalculatorConfiguration;
use DrdPlus\CalculatorSkeleton\CalculatorController;
use DrdPlus\RulesSkeleton\HtmlHelper;
use DrdPlus\RulesSkeleton\TracyDebugger;

\error_reporting(-1);
if ((!empty($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] === '127.0.0.1') || PHP_SAPI === 'cli') {
    \ini_set('display_errors', '1');
} else {
    \ini_set('display_errors', '0');
}
$documentRoot = $documentRoot ?? (PHP_SAPI !== 'cli' ? \rtrim(\dirname($_SERVER['SCRIPT_FILENAME']), '\/') : \getcwd());

/** @noinspection PhpIncludeInspection */
require_once $documentRoot . '/vendor/autoload.php';

$dirs = new FallDirs($documentRoot);
$htmlHelper = $htmlHelper ?? HtmlHelper::createFromGlobals($dirs);
if (\PHP_SAPI !== 'cli') {
    TracyDebugger::enable($htmlHelper->isInProduction());
}
$configuration = CalculatorConfiguration::createFromYml($dirs);
$servicesContainer = new FallServicesContainer($configuration, $htmlHelper);
/** @noinspection PhpUnusedLocalVariableInspection */
$controller = $controller ?? new CalculatorController($servicesContainer);

require __DIR__ . '/vendor/drdplus/calculator-skeleton/index.php';