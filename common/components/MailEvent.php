<?php
/**
 * 邮件事件类
 */

namespace common\components;
use yii\base\Event;

class MailEvent extends Event
{
    public $email;
    public $subject;
    public $content;
}