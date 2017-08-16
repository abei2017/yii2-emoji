<?php
namespace abei2017\emoji;

use Yii;
use Emojione\Client;
use Emojione\Ruleset;

class Emoji {

    private static $client = false;
    private static $paramKeys = ['ascii','shortcodes','unicodeAlt','emojiSize','spriteSize','sprites','imagePathPNG'];

    static private function getClient(){
        if(self::$client == false){
            $object = (new Client(new Ruleset()));

            if(isset(Yii::$app->params['yii2Emoji']) && null !== ($emojiParams = Yii::$app->params['yii2Emoji'])){
                foreach($emojiParams as $key=>$param){
                    if(in_array($key,self::$paramKeys) && !empty($param)){
                        $object->$key = $param;
                    }
                }

                //  重新配置imagePathPNG参数
                $imagePathPNGArr = array_filter(explode('/',$object->imagePathPNG));
                if($imagePathPNGArr[count($imagePathPNGArr)] != $object->emojiSize){
                    $object->imagePathPNG = rtrim($object->imagePathPNG,end($imagePathPNGArr).'/').'/'.$object->emojiSize.'/';
                };
            }

            self::$client = $object;
        }

        return self::$client;
    }

    static public function toShort($string){
        return self::getClient()->toShort($string);
    }

    static public function unicodeToImage($string){
        return self::getClient()->unicodeToImage($string);
    }

    static public function toImage($string){
        return self::getClient()->toImage($string);
    }

    static public function shortnameToUnicode($string){
        return self::getClient()->shortnameToUnicode($string);
    }

    static public function shortnameToImage($string){
        return self::getClient()->shortnameToImage($string);
    }
}
