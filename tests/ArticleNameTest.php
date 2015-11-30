<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

/**
 * @covers \Dark\PW\Productconfigurator\ArticleName
 */
class ArticleNameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotBeEmpty()
    {
        new ArticleName('');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Empty name is not allowed
     */
    public function testNameCanNotContainOnlySpaces()
    {
        new ArticleName('   ');
    }

    public function testNameCanBeRetrieved()
    {
        $articleName = new ArticleName('Test Article');

        $this->assertSame('Test Article', $articleName->getName());
    }

    /**
     * @depends testNameCanBeRetrieved
     */
    public function testWhitespacesWillBeTrimmed()
    {
        $articleName = new ArticleName('  Test Article  ');

        $this->assertSame('Test Article', $articleName->getName());
    }

}