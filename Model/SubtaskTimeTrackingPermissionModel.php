<?php

namespace Kanboard\Plugin\TimetrackingEditor\Model;

use Closure;
use Kanboard\Core\Base;
use Kanboard\Model\UserModel;

/**
 * @author Thomas Stinner
 */

class SubtaskTimeTrackingPermissionModel extends Base
{
    protected $recordUserId;

    /**
     * @var Closure
     */
    protected $checker;

    protected $projectId;

    public function forRecordUser($user_id)
    {
        $this->recordUserId = $user_id;

        return $this;
    }

    public function canEdit()
    {
        $this->checker = function() {
            if( $this->userModel->isCurrentUser($this->recordUserId) )
                return true;
        };
    }

    public function forProject($project_id)
    {
        $this->projectId = $project_id;

        $checker = $this->checker;
        return $checker();
    }
}
