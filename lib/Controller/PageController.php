<?php
namespace OCA\PhotoStorage\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

class PageController extends Controller {
	private $userId;

	public function __construct($AppName, IRequest $request, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
	}

	/**
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		return new TemplateResponse('photostorage', 'index');  // templates/index.php
	}

    /**
     * @NoAdminRequired
     *
     * Returns a list of all media files available to the authenticated user
     *
     *    * Authentication can be via a login/password or a token/(password)
     *    * For private galleries, it returns all media files, with the full path from the root
     *     folder For public galleries, the path starts from the folder the link gives access to
     *     (virtual root)
     *    * An exception is only caught in case something really wrong happens. As we don't test
     *     files before including them in the list, we may return some bad apples
     *
     * @param string $location a path representing the current album in the app
     * @param string $features the list of supported features
     * @param string $etag the last known etag in the client
     * @param string $mediatypes the list of supported media types
     *
     * @return array <string,array<string,string|int>>|Http\JSONResponse
     */
    public function getList($location, $features, $etag, $mediatypes) {
        $featuresArray = explode(';', $features);
        $mediaTypesArray = explode(';', $mediatypes);
        try {
            return $this->getFilesAndAlbums($location, $featuresArray, $etag, $mediaTypesArray);
        } catch (\Exception $exception) {
            return $this->jsonError($exception, $this->request, $this->logger);
        }
    }

    /**
     * @NoAdminRequired
     *
     * Sends the file matching the fileId
     *
     * @param int $fileId the ID of the file we want to download
     * @param string|null $filename
     *
     * @return ImageResponse
     */
    public function download($fileId, $filename = null) {
        try {
            $download = $this->getDownload($fileId, $filename);
        } catch (ServiceException $exception) {
            $code = $this->getHttpStatusCode($exception);
            $url = $this->urlGenerator->linkToRoute(
                $this->appName . '.page.error_page', ['code' => $code]
            );

            $response = new RedirectResponse($url);
            $response->addCookie('galleryErrorMessage', $exception->getMessage());

            return $response;
        }

        // That's the only exception out of all the image media types we serve
        if ($download['mimetype'] === 'image/svg+xml') {
            $download['mimetype'] = 'text/plain';
        }

        return new ImageResponse($download);
    }
}
