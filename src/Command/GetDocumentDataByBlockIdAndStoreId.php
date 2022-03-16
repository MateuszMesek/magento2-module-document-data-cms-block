<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsBlock\Command;

use Magento\Cms\Model\BlockFactory;
use Magento\Cms\Model\ResourceModel\Block as BlockResource;

class GetDocumentDataByBlockIdAndStoreId
{
    private BlockResource $blockResource;
    private BlockFactory $blockFactory;
    private GetDocumentData $getDocumentData;

    public function __construct(
        BlockResource   $blockResource,
        BlockFactory    $blockFactory,
        GetDocumentData $getDocumentData
    )
    {
        $this->blockResource = $blockResource;
        $this->blockFactory = $blockFactory;
        $this->getDocumentData = $getDocumentData;
    }

    public function execute(int $blockId, int $storeId): array
    {
        $block = $this->blockFactory->create();
        $block->setStoreId($storeId);

        $this->blockResource->load($block, $blockId);

        return $this->getDocumentData->execute($block);
    }
}
