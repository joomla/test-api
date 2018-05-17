<?php

/**
 * Class basicCest
 *
 * Basic API function tests
 */
class basicCest
{
	public function _before(ApiTester $I)
	{
	}

	public function _after(ApiTester $I)
	{
	}

	/**
	 * Test logging in with wrong credentials
	 *
	 * @param ApiTester $I
	 *
	 * @skip  Currently turns 200 only with  the correct error message
	 */
	public function testWrongCredentials(ApiTester $I)
	{
		$I->amHttpAuthenticated('admin', 'wrong');
		$I->haveHttpHeader('Accept', 'application/vnd.api+json');
		$I->sendGET('/article/1');
		$I->seeResponseCodeIs(Codeception\Util\HttpCode::UNAUTHORIZED);
	}

	/**
	 * Test content negotation fails when accepting no json
	 *
	 * @param ApiTester $I
	 */
	public function testContentNegotation(ApiTester $I)
	{
		$I->amHttpAuthenticated('admin', 'admin');
		$I->haveHttpHeader('Accept', 'text/xml');
		$I->sendGET('/article/1');
		$I->seeResponseCodeIs(Codeception\Util\HttpCode::NOT_ACCEPTABLE);
	}

	/**
	 * Test not found Resources return 404
	 *
	 * @param ApiTester $I
	 *
	 * @skip Currently returns 200 and only the error message contains the correct code (404)
	 */
	public function testRouteNotFound(ApiTester $I)
	{
		$I->amHttpAuthenticated('admin', 'admin');
		$I->haveHttpHeader('Accept', 'application/vnd.api+json');
		$I->sendGET('/not/existing/1');
		$I->seeResponseCodeIs(Codeception\Util\HttpCode::NOT_FOUND);
	}
}
