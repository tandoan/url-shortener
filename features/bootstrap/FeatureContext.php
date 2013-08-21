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
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

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
		require_once('../../baseconverter.php');
        // Initialize your context here
		$this->Converter = new baseconverter();
    }


	/**
	 * @When /^I <input> a positive number$/
	 */
	public function iInputAPositiveNumber()
	{
		//	throw new PendingException();
	}

	/**
	 * @Then /^I should <get> this output$/
	 */
	public function iShouldGetThisOutput($input)
	{
			return $get = $this->Converter->convert($input);
	}

}
