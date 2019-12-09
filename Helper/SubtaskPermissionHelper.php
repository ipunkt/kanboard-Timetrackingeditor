<?php

namespace Kanboard\Plugin\Timetrackingeditor\Helper;

use Kanboard\Core\Base;

/**
 * Class SubtaskHelper
 */
class SubtaskPermissionHelper extends Base
{
    public function canEdit($record)
    {
        if( $this->helper->user->isCurrentUser($record['user_id']) )
            return true;
        if( $this->helper->projectRole->getProjectUserRole( $record['project_id'] ) === 'project-manager' )
            return true;

        return false;
    }

}