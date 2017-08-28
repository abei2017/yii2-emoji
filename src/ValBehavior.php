<?php
namespace abei2017\emoji;

use Yii;
use yii\base\InvalidCallException;
use yii\behaviors\AttributeBehavior;
use yii\db\BaseActiveRecord;

/**
 * To use ValBehavior, insert the following code to your ActiveRecord class:
 *
 * ```php
 * use abei2017\emoji\ValBehavior;
 * public function behaviors(){
 *      return [
 *          ValBehavior::className(),
 *          'valAttribute'=>'content',
 *          'inFunc'=>'toShort'
 *      ]
 * }
 * ```
 *
 *
 *
 * @author abei <abei@nai8.me>
 * @since 1.1.0
 */
class ValBehavior extends AttributeBehavior {

    public $valAttribute = 'content';

    public $value;

    public $inFunc = 'toShort';

    /**
     * @inheritdoc
     */
    public function init(){
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => $this->valAttribute,
                BaseActiveRecord::EVENT_BEFORE_UPDATE => $this->valAttribute,
            ];
        }
    }

    protected function getValue($event){
        $func = $this->inFunc;
        if(in_array($func,['shortnameToUnicode','toShort']) == false){
            return parent::getValue($event);
        }

        $attr = $this->valAttribute;
        return Emoji::{$func}($this->owner->{$attr});
    }
}