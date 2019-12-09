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

        if( $this->helper->projectRole->checkProjectAccess('TaskViewController', 'edit', $record['project_id']) )
            return true;

        return false;
    }

}