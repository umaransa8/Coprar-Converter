<?php

declare (strict_types=1);
namespace RectorPrefix20211209\Helmich\TypoScriptParser\Parser\Printer;

use RectorPrefix20211209\Symfony\Component\Console\Output\OutputInterface;
interface ASTPrinterInterface
{
    /**
     * @param \Helmich\TypoScriptParser\Parser\AST\Statement[]  $statements
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return void
     */
    public function printStatements($statements, $output) : void;
    /**
     * @param PrettyPrinterConfiguration $prettyPrinterConfiguration
     */
    public function setPrettyPrinterConfiguration($prettyPrinterConfiguration) : void;
}
