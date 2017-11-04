<p align="center" style="margin-bottom:0!important;">
    <a href="http://nai8.me" target="_blank">
        <img width="250" height="80" src="http://nai8.me/images/ext-logos/yii2-emoji-logo.png">
    </a>
</p>
<p align="center">
  <a href="https://github.com/abei2017/yii2-emoji/issues"><img src="https://img.shields.io/github/issues/abei2017/yii2-emoji.svg" alt="北哥开源扩展"></a>
  <a href="https://github.com/abei2017/yii2-emoji"><img src="https://img.shields.io/github/forks/abei2017/yii2-emoji.svg" alt="北哥开源扩展"></a>
  <a href="https://github.com/abei2017/yii2-emoji"><img src="https://img.shields.io/github/stars/abei2017/yii2-emoji.svg" alt="北哥开源扩展"></a>
</p>

<p align="center">
    这是一套供yii2框架使用的emoji表情库。
</p>

<p align="center" style="margin-bottom:0!important;">
    <p align="center">
    <a href="http://nai8.me" target="_blank">
        <img width="240" height="300" src="https://nai8.me/images/ext-logos/xcx.png">
    </a>
    </p>
</p>

# Install
$ composer require abei2017/yii2-emoji
> only used in yii2.

[Video](http://nai8.me/course-video.html?id=151)

# Usage
```php
use abei2017\emoji\Emoji;
Emoji::shortnameToImage('hello:smile:');// hello <img class="emojione" alt="😄" title=":smile:" src="https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f604.png">
Emoji::toShort('😄'); // :smile:
Emoji::unicodeToImage('😄'); // <img class="emojione" alt="😄" title=":smile:" src="https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f604.png">
Emoji::toImage(':smile:'); // <img class="emojione" alt="😄" title=":smile:" src="https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f604.png">
Emoji::shortnameToUnicode(':smile:'); // 😄
```
# Config
```php
// config/web.php
return [
    ...
    'yii2Emoji'=>[
        'emojiSize'=>'32',//32、64、128
    ]
];
```

# Use Behavior (>= v1.1.0)
```php
// in ActiveRecord
use abei2017\emoji\ValBehavior;
public function behaviors(){
     return [
         'hello'=>[
             'class'=>'abei2017\emoji\ValBehavior',
             'valAttribute'=>'content',// no set, default "content"
             'inFunc'=>'toShort'// no set, default "toShort", and you can set "shortnameToUnicode"
         ]
     ];
 }
```

# License
MIT
