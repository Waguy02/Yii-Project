<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Date;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Comment extends  ActiveRecord
{




    public function getUsername(){
        $result =User::find()->where(['id'=>$this->user])->one()->username;

        return $result;

    }



}
