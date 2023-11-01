<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timesheet".
 *
 * @property int $id
 * @property int $employee_id
 * @property string|null $date
 * @property string $time_from
 * @property string $time_to
 * @property string $comment
 * @property string|null $date_submitted
 */
class Timesheet extends \yii\db\ActiveRecord
{
    public $count_days;
    public $count_hours;
    public $count_days_off;
    public $list_day;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timesheet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'time_from', 'time_to', 'comment'], 'required'],
            [['employee_id'], 'integer'],
            [['date', 'date_submitted'], 'safe'],
            [['time_from', 'time_to'], 'string', 'max' => 6],
            [['comment'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'date' => 'Ngày',
            'time_from' => 'Giờ bắt đầu',
            'time_to' => 'Giờ kết thúc',
            'comment' => 'Ghi chú',
            'date_submitted' => 'Date Submitted',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TimesheetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TimesheetQuery(get_called_class());
    }
}
