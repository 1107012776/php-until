<?php

namespace Lys\Until\Test;

use Lys\Until\Img\ImgQuality;

use PHPUnit\Framework\TestCase;

$file_load_path = __DIR__.'/../../../autoload.php';
if (file_exists($file_load_path)) {
    include $file_load_path;
} else {
    $vendor = __DIR__.'/../vendor/autoload.php';
    include $vendor;
}

ini_set('date.timezone', 'Asia/Shanghai');
/**
 * @method assertEquals($a, $b)
 */
class ImgTest extends TestCase
{


    /**
     * php vendor/bin/phpunit tests/DemoTest.php --filter testResize
     * @throws
     */
    public function testResize()
    {
        $quality = new ImgQuality('./5.39M.png','./img/'.uniqid(date('YmdHis')).'.jpg',10);
        $res = $quality->toJpg(90,1024*1024);
        var_dump($res,$quality->getErrorMsg());
    }

    /**
     * php vendor/bin/phpunit tests/DemoTest.php --filter testResize1
     * @throws
     */
    public function testResize1()
    {
        $quality = new ImgQuality('./5.39M.png','./img/'.uniqid(date('YmdHis')).'.jpg',5);
        $res = $quality->toJpg(90,1024*1024);
        var_dump($res,$quality->getErrorMsg());
    }

    /**
     * php vendor/bin/phpunit tests/DemoTest.php --filter testResize3
     * @throws
     */
    public function testResize3()
    {

        var_dump(filesize('./img/20211123190206619cca2e54d2c.jpg')/1024/1024);
    }
    /**
     * png转化jpg会损失文件大小
     * php vendor/bin/phpunit tests/DemoTest.php --filter testResize3
     * @throws
     */
    public function testResize4()
    {
        $quality = new ImgQuality('./77k.png','./img/'.uniqid(date('YmdHis')).'.jpg',5);
        $tmp_path = $quality->toJpg(100);

        $quality = new ImgQuality($tmp_path,'./img/'.uniqid(date('YmdHis')).'.jpg',5);
        var_dump($quality->fillSize());
    }


}
