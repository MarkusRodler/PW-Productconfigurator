<?php
declare(strict_types = 1);

namespace Dark\PW\Productconfigurator;

class ArticleName
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name Must contain at least one character. Whitespaces will be trimmed
     */
    public function __construct(string $name)
    {
        $name = trim($name);

        $this->ensureNameIsNotEmpty($name);

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws \InvalidArgumentException
     */
    private function ensureNameIsNotEmpty(string $name) {
        if (strlen($name) === 0) {
            throw new \InvalidArgumentException('Empty name is not allowed');
        }
    }
}