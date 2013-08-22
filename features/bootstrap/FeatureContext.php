<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
   require_once 'PHPUnit/Autoload.php';
   require_once 'PHPUnit/Framework/Assert/Functions.php';

$Delimiter = ':';
$CWD = getcwd();
$CurrentIncludePath = ini_get('include_path');
$Includes = array();
$Includes[] = '.';
$Includes[] = '/usr/share/pear';
$Includes[] = $CWD;
$Includes[] = $CWD."/../../";
$Includes[] = $CurrentIncludePath;

$NewIncludePath = implode($Delimiter, $Includes);
ini_set('include_path',$NewIncludePath);

require_once('BaseConverter.php');

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
		$this->Converter = new BaseConverter();
    }


	/**
	 * @When /^I convert "([^"]*)" I expect "([^"]*)"$/
	 */
	public function iConvertIExpect($arg1,$arg2)
	{
			echo $arg1." ".$arg2."\n";
		assertEquals($arg2, $this->Converter->Convert($arg1));
	}

	/**
	 * @When /^I convert back "([^"]*)" I expect "([^"]*)"$/
	 */
	public function iConvertBackIExpect($arg1,$arg2)
	{
		assertEquals($arg2, $this->Converter->ConvertBack($arg1));
	}


   

}
