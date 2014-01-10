<?php

/**
 * This is the model class for table "mail_settings'".
 *
 * The followings are the available columns in table 'mail_settings':
 * @property integer $mail_id
 * @property string $title
 * @property string $mail_to
 * @property string $content
 */
class MailSettings extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'mail_settings';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('mail_id', 'required'),
            array('title', 'numerical', 'integerOnly'=>true),
            array('mail_to', 'email'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'mail_id' => 'ID',
            'title' => '标题',
            'mail_to' => '发送给',
            'content' => '内容',
        );
    }


    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MailSettings the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
