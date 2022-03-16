<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsBlock\Data;

use Magento\Cms\Api\Data\BlockInterface;
use MateuszMesek\DocumentDataApi\InputInterface;

class Input implements InputInterface
{
    private BlockInterface $block;

    public function __construct(
        BlockInterface $block
    )
    {
        $this->block = $block;
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
