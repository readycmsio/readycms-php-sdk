<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class MediaEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Get media information
    public function getMediaInfo(array $options = [])
    {
        return $this->client->get('/media/info', $options);
    }

    // Get  media
    public function getMedia(array $options = [])
    {
        return $this->client->get('/media', $options);
    }

    // Add new media folder
    public function addNewFolder(array $options = [])
    {
        return $this->client->post('/media/folder/add', $options);
    }

    // Rename media folder
    public function renameFolder(array $options = [])
    {
        return $this->client->post('/media/folder/rename', $options);
    }

    // Rename a media file
    public function renameFile(array $options = [])
    {
        return $this->client->post('/media/file/rename', $options);
    }

    // Get uncompressed files
    public function getUncompressedFiles(array $options = [])
    {
        return $this->client->get('/media/files/uncompressed', $options);
    }

    // Get specific folder
    public function getFolder(array $options = [])
    {
        return $this->client->get('/media/folder', $options);
    }

    // Zip files
    public function zipFiles(array $options = [])
    {
        return $this->client->post('/media/files/zip', $options);
    }

    // Add new media file
    public function addNewFile(array $options = [])
    {
        return $this->client->post('/media/files/add', $options);
    }

    // Rename multiple media files
    public function renameFiles(array $options = [])
    {
        return $this->client->post('/media/files/rename', $options);
    }

    // Get media files
    public function getFiles(array $options = [])
    {
        return $this->client->get('/media/files', $options);
    }

    // Remove background from image
    public function removeBackground(array $options = [])
    {
        return $this->client->post('/media/remove-background', $options);
    }

    // Zip media files
    public function zipMedia(array $options = [])
    {
        return $this->client->post('/media/zip', $options);
    }

    // Compress media files
    public function compressMedia(array $options = [])
    {
        return $this->client->post('/media/compress', $options);
    }
}
