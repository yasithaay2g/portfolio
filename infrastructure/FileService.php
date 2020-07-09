<?php
/**
* Created by PhpStorm.
* User: sahan
* Date: 6/24/15
* Time: 11:47 PM
*/

namespace infrastructure;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class FileService
{

    protected $upload_path;

    public function __construct()
    {
        $this->upload_path = Config::get('filesystems.upload_path');
    }

    /**
    * get file contents of given file
    *
    * @param $path
    * @return string
    */
    public function getContents($path)
    {
        return file_get_contents($path);
    }

    public function up($file)
    {
        $renamed_uploaded_file = $this->makeName($file);

        if ($file->move($this->upload_path . '/', $renamed_uploaded_file)) {
            return $renamed_uploaded_file;
        }

    }

    /**
    * store given file in the given path
    *
    * @param $file
    * @param $name
    * @param $path
    * @param $mode
    */
    public function storeFile($file, $name, $path, $mode = null)
    {
        $contentOrFalseOnFailure = file_get_contents($file);
        file_put_contents($path . "/" . $name, $contentOrFalseOnFailure);
    }

    /**
    * Generate new name for uploaded file.
    *
    * @param $file
    *
    * @param null $url
    * @return string - The new name for file.
    */
    public function makeName($file = null, $url = null)
    {

        //Returns file name with extension if method contains a file in parameters
        if (!($file == null)) {
            return md5(date('yyyy-mm-dd hh:ss') . rand(0, 999)) . '.' . $file->getClientOriginalExtension();
        }

        //Returns file name with extension if method contains a url in parameters
        if (!($url == null)) {
            return md5(date('yyyy-mm-dd hh:ss') . $file . rand(0, 999)) . '.' . $this->getExt($url);
        }

        //Returns file name without extension if the $file parameter is null
        return md5(date('yyyy-mm-dd hh:ss') . $file . rand(0, 999));
    }

    /**
    * Generate given name for uploaded file.
    *
    * @param $file
    *
    * @param null $url
    * @return string - The new name for file.
    */
    public function makeGivenName($file = null, $name = null)
    {
        //Returns file name with extension if method contains a file in parameters
        if (($name != null) && ($file != null)) {
            return $name . '.' . $file->getClientOriginalExtension();
        }
        //Returns file name without extension if the $file parameter is null
        return 'false';
    }

    /**
    * Download the file from url
    * @param $url
    * @param $name
    * @param $target_path
    * @return string
    */
    public function download($url, $name, $target_path)
    {

        Storage::put($target_path . $name, file_get_contents($url), 'public');

        return $name;
    }

    /**
    * @return string
    */
    public function getFilePath()
    {
        return $this->upload_path;
    }

    /**
    * @param $file
    * @return mixed
    */
    public function getExt($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        if (strpos($ext, '?')) {
            return substr($ext, 0, strpos($ext, "?"));
        } else {
            return $ext;
        }
    }

    /**
    * @param $file
    * @return int
    */
    public function getSize($file)
    {
        $ch = curl_init($file);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

        curl_close($ch);

        return $size;
    }

    /**
    * Get name of given file
    * @param $file
    */
    public function getName($file)
    {
        return pathinfo($file)['basename'];
    }

    /**
    * Validate given extension with file
    * @param $file
    * @param $ext
    * @return bool
    */
    public function validateExt($file, $ext)
    {
        if (is_object($file)) {
            return $file->extension() == $ext;
        } else {
            return $this->getExt($file) == $ext;
        }
    }
}