<?php


namespace app\helpers;


class Formatter extends \yii\i18n\Formatter
{

    /**
     * Format seconds in mm:ss or h:mm:ss format
     * 
     * @param int $value seconds
     * @return string
     */
    public function asVideoDuration($value)
    {
        $zeroDateTime = (new \DateTime())->setTimestamp(0);
        $valueDateTime = (new \DateTime())->setTimestamp(abs($value));
        $interval = $valueDateTime->diff($zeroDateTime);
        
        if ($interval->h > 0) {
            $time = sprintf("%d:%02d:%02d", $interval->h, $interval->i, $interval->s);
        } else {
            $time = sprintf("%02d:%02d", $interval->i, $interval->s);
        }
        
        return $time;        
    }
    
    public function asVideoAddTime($value)
    {
        return $this->asDatetime($value, 'dd.MM.yyyy HH:mm:ss');
    }
    
}