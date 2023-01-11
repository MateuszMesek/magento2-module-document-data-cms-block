<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsBlock\Model\Data;

use Magento\Cms\Api\Data\BlockInterface;
use MateuszMesek\DocumentDataApi\Model\InputInterface;

class Input implements InputInterface
{
    public function __construct(
        private readonly BlockInterface $block
    )
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return (string)$this->block->getId();
    }

    /**
     * @return \Magento\Cms\Api\Data\BlockInterface
     */
    public function getBlock(): BlockInterface
    {
        return $this->block;
    }
}
