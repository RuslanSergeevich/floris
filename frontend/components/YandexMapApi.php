<?php
/**
 * Class YandexMapApi
 */

namespace frontend\components;

use Yii;
use yii\base\Action;
use yii\web\Response;
use common\models\Geography;
use yii\helpers\Json;
use yii\caching\DbDependency;

/**
 * Class YandexMapApi
 * @package frontend\components
 */
class YandexMapApi extends Action{

    /**
     * key in Memcached
     */
    const KEY = 'yandex_data';
    /**
     * data storage time in the cache
     */
    const MONTH = 2419200;
    public $data = [];

    /**
     * @return object
     * @throws \yii\base\InvalidConfigException
     */
    public function run()
    {
        $cache = Yii::$app->cache;
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_at) FROM geography'
        ]);
        $this->data = $cache->get(self::KEY);
        if ($this->data === false) {
            if($addresses = Geography::getDataJSON()){
                foreach($addresses as $address){
                    $full_address = $address['country'] . ',' . $address['city'] . ',' . $address['address'];
                    $this->data[] = [
                                        'coords'      => $this->_geocode($full_address),
                                        'phone'       => $address['phone'],
                                        'mode'        => $address['mode'],
                                        'shop_name'   => $address['shop_name'],
                                        'images'      => $address['geographyImages'],
                                    ];
                }

            }
            $cache->set(self::KEY, $this->data, self::MONTH, $dependency);
        }
        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => Response::FORMAT_JSON,
            'data' => [
                'features' => $this->data,
            ],
        ]);
    }

    /**
     * @param $full_address
     * @return string
     */
    private function _geocode($full_address)
    {
        $json_data = Json::decode(file_get_contents('https://geocode-maps.yandex.ru/1.x/?format=json&geocode=' . $full_address));
        $coords = explode(' ',$json_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['boundedBy']['Envelope']['lowerCorner']);
        return [$coords[1],$coords[0]];
    }

} 