<?php

namespace app\controllers;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    // DefaultController.php
    public function actions()
{
    return [
        'image-upload' => [
            'class' => 'vova07\imperavi\actions\UploadFileAction',
            'url' => 'http://localhost:8080/img/uploads/', // Directory URL address, where files are stored.
            'path' => '@app/web/img/uploads', // Or absolute path to directory where files are stored.
        ],
        'images-get' => [
            'class' => 'vova07\imperavi\actions\GetImagesAction',
            'url' => 'http://localhost:8080/img/uploads/', // Directory URL address, where files are stored.
            'path' => '@app/web/img/uploads', // Or absolute path to directory where files are stored.
            'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
        ],
        'file-upload' => [
           'class' => 'vova07\imperavi\actions\UploadFileAction',
           'url' => 'http://localhost:8080/files/', // Directory URL address, where files are stored.
           'path' => '@app/web/files', // Or absolute path to directory where files are stored.
           'uploadOnlyImage' => false, // For any kind of files uploading.
       ],
        'files-get' => [
           'class' => 'vova07\imperavi\actions\GetFilesAction',
           'url' => 'http://localhost:8080/files/', // Directory URL address, where files are stored.
           'path' => '@app/web/files', // Or absolute path to directory where files are stored.
           'options' => ['only' => ['*.pdf', '*.doc', '*.docx', '*.xls', '*.xlsx', '*.txt', '*.md']], // These options are by default.
       ],
    ];
}


}
