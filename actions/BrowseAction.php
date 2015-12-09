<?php

namespace bajadev\ckeditor\actions;

use Yii;
use yii\web\ViewAction;
use yii\helpers\Inflector;
use bajadev\ckeditor\BrowseAssets;
use Imagine\Image\Box;
use yii\imagine\Image;

/**
 * Class BrowseAction
 * @package bajadev\ckeditor\actions
 */
class BrowseAction extends ViewAction
{

    public $url;
    public $path;
    public $maxWidth = 800;
    public $maxHeight = 800;

    /**
     * @inheritdoc
     */
    public function run()
    {

        if(Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if(!empty($post['method'])) {
                $file = basename($post['file']);

                if(file_exists($this->getPath().$file)) {
                    unlink($this->getPath().$file);
                }

            } else {
                $image = \yii\web\UploadedFile::getInstanceByName('upload');
                $imageFileType = strtolower(pathinfo($image->name, PATHINFO_EXTENSION));
                $allowed = ['png', 'jpg', 'gif', 'jpeg'];
                if(!empty($image) and in_array($imageFileType, $allowed)) {
                    $fileName = Inflector::slug(str_replace($imageFileType, '',$image->name), '_');
                    $fileName = $fileName.'.'.$imageFileType;
                    $image->saveAs($this->getPath().$fileName);
					
					$imagine = Image::getImagine();
					$photo = $imagine->open($this->getPath().$fileName);
					$photo->thumbnail(new Box($this->maxWidth, $this->maxHeight))
						->save($this->getPath().$fileName, ['quality' => 90]);
                }
            }
        }

        BrowseAssets::register($this->controller->view);
        $this->controller->layout = '@vendor/bajadev/yii2-ckeditor/views/layout/image';

        return $this->controller->render('@vendor/bajadev/yii2-ckeditor/views/browse', [
            'file_style' => $this->getFileStyle(),
            'images' => $this->loadImages()
        ]);
    }

    /**
     * @return string
     */
    private function getUrl()
    {
        return Yii::getAlias($this->url);
    }

    /**
     * @return string
     */
    private function getPath()
    {
        return Yii::getAlias($this->path);
    }

    /**
     * @return string
     */
    private function getFileStyle()
    {
        if (!isset($_COOKIE["file_style"])) {
            return "block";
        } else {
            return $_COOKIE["file_style"];
        }
    }

    /**
     * @return string
     */
    private function getFileExt()
    {
        if (!isset($_COOKIE["file_extens"])) {
            return "no";
        } else {
            return $_COOKIE["file_extens"];
        }
    }

    /**
     *
     */
    private function loadImages()
    {

        if (file_exists($this->getPath())) {

            $filesizefinal = 0;
            $count = 0;

            $dir = $this->getPath();
            $files = glob("$dir*.{jpg,jpeg,png,gif,ico}", GLOB_BRACE);
            usort($files, create_function('$a,$b', 'return filemtime($a) - filemtime($b);'));
            for ($i = count($files) - 1; $i >= 0; $i--):
                $image = $files[$i];
                $image_pathinfo = pathinfo($image);
                $image_extension = $image_pathinfo['extension'];
                $image_filename = $image_pathinfo['filename'];
                $size = getimagesize($image);
                $image_height = $size[0];
                $file_size_byte = filesize($image);
                $file_size_kilobyte = ($file_size_byte / 1024);
                $file_size_kilobyte_rounded = round($file_size_kilobyte, 1);
                $filesizetemp = $file_size_kilobyte_rounded;
                $filesizefinal = round($filesizefinal + $filesizetemp) . " KB";
                $calcsize = round($filesizefinal + $filesizetemp);
                $count = ++$count;

                if ($this->getFileStyle() == "block") { ?>
                    <div class="fileDiv"
                         onclick="showEditBar('<?php echo $this->getUrl(); ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>','<?php echo $image_height; ?>','<?php echo $count; ?>');"
                         ondblclick="showImage('<?php echo $this->getUrl(); ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>','<?php echo $image_height; ?>');"
                         data-imgid="<?php echo $count; ?>">
                        <div class="imgDiv"><img class="fileImg lazy"
                                                 data-original="<?php echo $this->getUrl(); ?><?php echo $image_filename; ?>.<?php echo $image_extension; ?>">
                        </div>
                        <p class="fileDescription"><span
                                class="fileMime"><?php echo $image_extension; ?></span> <?php echo $image_filename; ?><?php if ($this->getFileExt() == "yes") {
                                echo ".$image_extension";
                            } ?></p>

                        <p class="fileTime"><?php echo date("F d Y H:i", filemtime($image)); ?></p>

                        <p class="fileTime"><?php echo $filesizetemp; ?> KB</p>
                    </div>
                <?php } elseif ($this->getFileStyle() == "list") { ?>
                    <div class="fullWidthFileDiv"
                         onclick="showEditBar('<?php echo $image; ?>','<?php echo $image_height; ?>','<?php echo $count; ?>');"
                         ondblclick="showImage('<?php echo $image; ?>','<?php echo $image_height; ?>');"
                         data-imgid="<?php echo $count; ?>">
                        <div class="fullWidthimgDiv"><img class="fullWidthfileImg lazy"
                                                          data-original="<?php echo $image; ?>"></div>
                        <p class="fullWidthfileDescription"><?php echo $image_filename; ?><?php if ($this->getFileExt() == "yes") {
                                echo ".$image_extension";
                            } ?></p>

                        <div class="qEditIconsDiv">
                            <img title="Delete File" src="img/cd-icon-qtrash.png" class="qEditIconsImg"
                                 onclick="window.location.href = 'imgdelete.php?img=<?php echo $image; ?>'">
                        </div>

                        <p class="fullWidthfileTime fullWidthfileMime fullWidthlastChild"><?php echo $image_extension; ?></p>

                        <p class="fullWidthfileTime"><?php echo $filesizetemp; ?> KB</p>

                        <p class="fullWidthfileTime fullWidth30percent"><?php echo date("F d Y H:i",
                                filemtime($image)); ?></p>
                    </div>
                <?php }

            endfor;
            if ($count == 0) {
                $calcsize = 0;
            }
            if ($calcsize == 0) {
                $filesizefinal = "0 KB";
            }
            if ($calcsize >= 1024) {
                $filesizefinal = round($filesizefinal / 1024, 1) . " MB";
            }
            echo "
        ";
        } else {
            echo '<div id="folderError">The folder <b>' . $this->getPath() . '</b> could not be found.</div>';
        }

    }
}
