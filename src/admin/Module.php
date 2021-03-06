<?php

namespace johnnymcweed\event\admin;

/**
 * Event Admin Module.
 *
 * @author Alexander Schmid <alex.schmid@stud.unibas.ch>
 * @since 1.0.0
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-event-event' => 'johnnymcweed\event\admin\apis\EventController',
        'api-event-cat' => 'johnnymcweed\event\admin\apis\CatController'
    ];

    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node(self::t('event'), 'event')
            ->group('Group')
            ->itemApi(self::t('event'), 'eventadmin/event/index', 'event_available', 'api-event-event')
            ->itemApi(self::t('cat'), 'eventadmin/cat/index', 'event_note', 'api-event-cat');
    }

    public static function onLoad()
    {
        self::registerTranslation('eventadmin', '@eventadmin/messages', [
            'eventadmin' => 'eventadmin.php',
        ]);
    }

    /**
     * Translat news messages.
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('eventadmin', $message, $params);
    }
}