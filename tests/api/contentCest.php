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

	/**
	 * Test if you get an single article from the API
	 *
	 * @param ApiTester $I
	 */
	public function testCrudOnArticle(ApiTester $I)
	{
		$I->amHttpAuthenticated('admin', 'admin');
		$I->haveHttpHeader('Content-Type', 'application/json');
		$I->haveHttpHeader('Accept', 'application/vnd.api+json');
		$I->sendPOST('/article', ['title' => 'Just for you', 'catid' => 1, 'articletext' => 'A dummy article to save to the database', 'metakey' => '', 'metadesc' => '', 'language' => '*', 'alias' => 'tobias']);
		$I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED);

		$I->amHttpAuthenticated('admin', 'admin');
		$I->haveHttpHeader('Accept', 'application/vnd.api+json');
		$I->sendGET('/article/1');
		$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

		$I->amHttpAuthenticated('admin', 'admin');
		$I->haveHttpHeader('Content-Type', 'application/json');
		$I->haveHttpHeader('Accept', 'application/vnd.api+json');
		$I->sendGET('/article/1', ['title' => 'Another Title']);
		$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);

		$I->amHttpAuthenticated('admin', 'admin');
		$I->haveHttpHeader('Accept', 'application/vnd.api+json');
		$I->sendDELETE('/article/1');
		$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
	}
}
