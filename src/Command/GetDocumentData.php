<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsBlock\Command;

use Magento\Cms\Api\Data\BlockInterface;
use MateuszMesek\DocumentDataApi\Command\GetDocumentDataInterface;
use MateuszMesek\DocumentDataApi\Data\DocumentDataInterface;
use MateuszMesek\DocumentDataCmsBlock\Data\InputFactory;

class GetDocumentData
{
    private InputFactory $inputFactory;
    private GetDocumentDataInterface $getDocumentData;

    public function __construct(
        InputFactory $inputFactory,
        GetDocumentDataInterface $getDocumentData
    )
    {
        $this->inputFactory = $inputFactory;
        $this->getDocumentData = $getDocumentData;
    }

    public function execute(BlockInterface $block): ?DocumentDataInterface
    {
        $input = $this->inputFactory->create(['block' => $block]);

        return $this->getDocumentData->execute('cms_block', $input);
    }
}
