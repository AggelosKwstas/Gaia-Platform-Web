<?php

namespace app\models\pure;

use Imagine\Image\Box;
use Yii;
use yii\base\Exception;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

class File extends \app\models\generated\File
{

    public $file_input;
    public $files_input;

    public function rules()
    {
        return [
            [['name', 'path', 'size', 'file_type'], 'required'],
            [['size'], 'integer'],
            [['date_created', 'date_updated'], 'safe'],
            [['name'], 'string', 'max' => 256],
            [['path'], 'string', 'max' => 512],
            [['file_input'], 'file', 'skipOnEmpty' => true, 'maxSize' => 1024 * 1024 * 1024],
            [['files_input'], 'file', 'skipOnEmpty' => true, "maxFiles" => 10, 'maxSize' => 1024 * 1024 * 1024],
            [['file_type'], 'string', 'max' => 128],
            [['path'], 'unique'],
        ];
    }

    public function save($runValidation = true, $attributeNames = null)
    {


        if ($this->file_input instanceof UploadedFile || $this->file_input = UploadedFile::getInstance($this, 'file_input')) {
            if (Yii::$app->user->id) {

                try {
                    FileHelper::createDirectory("upload/file/" . Yii::$app->user->id);

                } catch (Exception $e) {

                }
            }


            $path = $this->getFilePath(false);
            $this->path = $path . "." . $this->file_input->extension;

            $this->file_type = $this->file_input->extension;


            $this->name = $this->file_input->name;
            $this->size = $this->file_input->size;


            if ($this->validate()) {

                $result = parent::save(false, $attributeNames); // TODO: Change the autogenerated stub

                if ($result) {


                    try {


                        $this->file_input->saveAs($this->path);

                    } catch (\Exception $e) {

                        return die($e->getMessage());
                    }
                }


                return $result;
            } else {
                die(json_encode($this->getFirstErrors()) . $this->image->extension);

            }


        } else if (!$this->isNewRecord) {
            die("couldn't save image please contact admin");
            return parent::save();
        }


        return false;
    }

    public function getFilePath($extension = true)
    {


        if (!$this->file_input) return "";
        $user_appender = !Yii::$app->user->isGuest && Yii::$app->user->id ? Yii::$app->user->id . "/" : "";
        $path = "upload/file/$user_appender" . strtotime("now") . rand();

        if ($extension)
            return $path . "." . $this->image->extension;
        return $path;

    }

    public function delete()
    {
        $result = parent::delete();
        if ($result && file_exists($this->path))
            unlink($this->path);
        return $result;

    }

    public function getFullFilePath()
    {

        if ($this->path)
            return Url::base(true) . "/$this->path";
        return "";

    }
}
