<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2014 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Bundle\MediaBundle\Editor\Helper;

use Symfony\Cmf\Bundle\MediaBundle\Editor\BrowserEditorHelperInterface;
use Symfony\Component\Routing\RouterInterface;

class BrowserDefaultHelper implements BrowserEditorHelperInterface
{
    protected $router;
    protected $name;
    protected $parameters;
    protected $referenceType;

    /**
     * @param RouterInterface $router
     * @param string          $name          The name of the media browser route.
     * @param mixed           $parameters    An array of parameters for the route.
     * @param Boolean|string  $referenceType The type of reference to be generated
     *                                       (one of the RouterInterface constants).
     */
    public function __construct(
        RouterInterface $router,
        $name = null,
        array $parameters = array(),
        $referenceType = RouterInterface::ABSOLUTE_PATH)
    {
        $this->router        = $router;
        $this->name          = $name;
        $this->parameters    = $parameters;
        $this->referenceType = $referenceType;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        if (!$this->name) {
            return false;
        }

        return $this->router->generate($this->name, $this->parameters, $this->referenceType);
    }
}
