<?php

/**
 * Class contentCest
 *
 * Basic com_content (article) tests
 */
class contentCest
{
	public function _before(ApiTester $I)
	{
	}

	public function _after(ApiTester $I)
	{
	}

	// tests

	/**
	 * Test if you get an single article from the API
	 *
	 * @param ApiTester $I
	 */
	public function getSingleArticleStatus200(ApiTester $I)
	{
		$I->amHttpAuthenticated('admin', 'admin');
		$I->haveHttpHeader('Content-Type', 'application/vnd.api+json');
		$I->haveHttpHeader('Accept', 'application/vnd.api+json');
		$I->sendGET('/article/1');
		$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
	}
}
