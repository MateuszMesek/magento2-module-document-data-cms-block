<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsBlock\Model\Command;

use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\ResourceModel\Block as BlockResource;
use MateuszMesek\DocumentDataApi\Model\Data\DocumentDataInterface;
use MateuszMesek\DocumentDataCmsBlock\Model\Command\GetDocumentData;

class GetDocumentDataByBlockIdAndStoreId
{
    public function __construct(
        private readonly BlockResource   $blockResource,
        private readonly BlockFactory    $blockFactory,
        private readonly GetDocumentData $getDocumentData
    )
    {
    }

    public function execute(int $blockId, int $storeId): ?DocumentDataInterface
    {
        $block = $this->blockFactory->create();
        $block->setStoreId($storeId);

        $this->blockResource->load($block, $blockId);

        return $this->getDocumentData->execute($block);
    }
}
