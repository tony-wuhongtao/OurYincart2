<?php

namespace star\marketing\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "coupon".
 *
 * @property integer $coupon_id
 * @property string $coupon_no
 * @property integer $rule_id
 * @property integer $order_id
 * @property integer $user_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $start_at
 * @property integer $end_at
 * @property integer $star_id
 */
class Coupon extends \yii\db\ActiveRecord
{
    const STATUS_USELESS = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_USED = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coupon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_at', 'end_at'], 'required'],
            [['rule_id', 'order_id', 'user_id', 'status', 'created_at', 'updated_at', 'star_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coupon_id' => Yii::t('coupon', 'Coupon ID'),
            'coupon_no' => Yii::t('coupon', 'Coupon No'),
            'rule_id' => Yii::t('coupon', 'Rule ID'),
            'order_id' => Yii::t('coupon', 'Order ID'),
            'user_id' => Yii::t('coupon', 'User ID'),
            'status' => Yii::t('coupon', 'Status'),
            'created_at' => Yii::t('coupon', 'Created At'),
            'updated_at' => Yii::t('coupon', 'Updated At'),
            'start_at' => Yii::t('coupon', 'Start At'),
            'end_at' => Yii::t('coupon', 'End At'),
            'star_id' => Yii::t('coupon', 'Star ID'),
        ];
    }


    public function getCouponRule()
    {
        return $this->hasOne(CouponRule::className(), ['rule_id' => 'rule_id']);
    }

    public function behaviors()
    {
        return [
            'time' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ]
        ];
    }
    
}
