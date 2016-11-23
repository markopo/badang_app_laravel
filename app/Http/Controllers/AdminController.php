<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    public function index() {

        $imgPath = base_path() . '/img/';
        $allowedFileTypes = array("jpg", "png", "jpeg", "gif");
        $filesAlreadyUploaded = $this->readImages($imgPath, $allowedFileTypes);

        return view("admin.index", compact('filesAlreadyUploaded'));
    }

    /**
     * http://symfony.com/doc/current/controller/upload_file.html
     * @param Request $request
     */
    public function upload(Request $request) {

         $files = $request->file("files");


        if ($files != null && is_array($files)) {
            //    echo var_dump($files);
            $allowedFileTypes = array("jpg", "png", "jpeg", "gif");
            $imgPath = base_path() . '/img/';
            $ok = true;
            $filesToUpload = array();
            $flashMessage = "";

            // NOT ALLOWED FILEEXTENSIONS
            foreach ($files as $file) {
                $fileExtension = $file->guessExtension();
                $ok = in_array($fileExtension, $allowedFileTypes);
                if ($ok === false) {
                    $flashMessage .= "Not allowed filextension ." . $fileExtension . "<br />";
                    break;
                }
            }

            // CHECK IF EXISTS ALREADY
            $filesAlreadyUploaded = scandir($imgPath);

            //  echo var_dump($filesAlreadyUploaded); die();
            foreach ($files as $file) {
                $fName = $file->getClientOriginalName();
                $isAlreadyAdded = in_array($fName, $filesAlreadyUploaded);
                if (!$isAlreadyAdded) {
                    array_push($filesToUpload, $file);
                } else {
                    $flashMessage .= "File is already there " . $fName . "<br />";
                }
            }


            if ($ok === true) {

                $filesJustUploaded = array();

                foreach ($filesToUpload as $file) {
                    // md5(uniqid())
                    $fileName = $file->getClientOriginalName();
                    //. '.' . $file->guessExtension();
                    $file->move($imgPath, $fileName);
                    array_push($filesJustUploaded, $fileName);
                }


                foreach ($filesJustUploaded as $img) {
                    $this->makeSmallerImage($img);
                }


            }

            \Session::flash('message', $flashMessage);

        }

        return redirect('/admin');
    }

    /**
     * @param $img
     * @return void
     */
    private function makeSmallerImage($img) {
        $theImage = Image::make('img/'.$img);
        $newWidth = $theImage->width() / 2;
        $newHeight = $theImage->height() / 2;
        $theImage->fit($newWidth, $newHeight);
        $theImage->save('img/smaller/'.$img);
    }

    /**
     * @param $path
     * @param $allowedFileTypes
     * @return array
     */
    private function readImages($path, $allowedFileTypes):array {
        $filesAlreadyUploaded = scandir($path);
        $images = array();

        foreach ($filesAlreadyUploaded as $f) {
            if($this->isImage($f, $allowedFileTypes)) {
                array_push($images, $f);
            }
        }

        return $images;
    }

    /**
     * @param $img
     * @param $ends
     * @return bool
     */
    private function isImage($img, $ends):bool {
        foreach ($ends as $try) {
            if (substr($img, -1*strlen($try))===$try) return $try;
        }
        return false;
    }


    public function show(Request $request){

        $img = $request->get("img");
        if($img != null) {
            $theImage = Image::make('img/'.$img);
            $newWidth = $theImage->width() / 2;
            $newHeight = $theImage->height() / 2;
            $theImage->fit($newWidth, $newHeight);
            $theImage->save('img/smaller/'.$img);
            return $theImage->response();
        }

        return "";
    }

}
