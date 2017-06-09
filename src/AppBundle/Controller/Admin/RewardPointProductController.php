<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Common\Paginator;
use Symfony\Component\HttpFoundation\Request;

class RewardPointProductController extends BaseController
{
    public function indexAction(Request $request)
    {
        $conditions = $request->query->all();

        $paginator = new Paginator(
            $request,
            $this->getRewardPointProductService()->countProducts($conditions),
            20);

        $products = $this->getRewardPointProductService()->searchProducts(
            $conditions,
            array('createdTime' => 'DESC'),
            $paginator->getOffsetCount(),
            $paginator->getPerPageCount()
        );

        return $this->render(
            'admin/reward-point-product/index.html.twig',
            array(
                'products' => $products,
                'paginator' => $paginator,
            )
        );
    }

    public function createAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $fields = $request->request->all();
            $this->getRewardPointProductService()->createProduct($fields);

            return $this->redirect(
                $this->generateUrl('admin_reward_point_product', array(
                )));
        }

        return $this->render(
            'admin/reward-point-product/base-info.html.twig',
            array(
                'product' => array('id' => 0),
            )
        );
    }

    public function updateAction(Request $request, $id)
    {
        $product = $this->getRewardPointProductService()->getProduct($id);

        if ($request->getMethod() == 'POST') {
            $this->getRewardPointProductService()->updateProduct($id, $request->request->all());

            return $this->redirect($this->generateUrl('admin_reward_point_product', array(
            )));
        }

        return $this->render(
            'admin/reward-point-product/base-info.html.twig',
            array(
                'product' => $product,
            )
        );
    }

    public function upShelvesAction(Request $request, $id)
    {
        $product = $this->getRewardPointProductService()->upShelves($id);

        return $this->render(
            'admin/reward-point-product/list-tr.html.twig',
            array(
                'product' => $product,
            )
        );
    }

    public function downShelvesAction(Request $request, $id)
    {
        $product = $this->getRewardPointProductService()->downShelves($id);

        return $this->render(
            'admin/reward-point-product/list-tr.html.twig',
            array(
                'product' => $product,
            )
        );
    }

    public function coverAction(Request $request)
    {
        $formData = $request->request->all();
        $fileId = $request->getSession()->get('fileId');
        list($pictureUrl, $naturalSize, $scaledSize) = $this->getFileService()->getImgFileMetaInfo($fileId, 360, 360);

        return $this->render('admin/reward-point-product/cover-crop.html.twig', array(
            'pictureUrl' => $pictureUrl,
            'naturalSize' => $naturalSize,
            'scaledSize' => $scaledSize,
            'product' => $formData,
        ));
    }

    public function coverCropAction(Request $request)
    {
        $fields = $request->request->all();

        $fileId = $fields['image'][0]['id'];
        $file = $this->getFileService()->getFile($fileId);
        $fileParse = $this->getFileService()->parseFileUri($file['uri']);

        $filePath = '/files/'.$fileParse['path'];
        $product = $fields;
        $product['img'] = $filePath;
        $product['file'] = $file;

        return $this->createJsonResponse($product);
    }

    /**
     * @return FileService
     */
    protected function getFileService()
    {
        return $this->createService('Content:FileService');
    }

    /**
     * @return RewardPointProductService
     */
    protected function getRewardPointProductService()
    {
        return $this->createService('RewardPoint:ProductService');
    }
}
