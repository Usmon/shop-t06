<?php

namespace app\models\car;

use Yii;
use yii\base\Model;

/**
 * ModelFilterForm is the model behind the contact form.
 */
class ModelFilterForm extends Model
{
    /**
     * @var integer
     */
    public $drive;
    
    /**
     * @var integer
     */
    public $engine;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['drive', 'engine'], 'integer'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'drive' => 'Drive',
            'engine' => 'Engine'
        ];
    }
}
