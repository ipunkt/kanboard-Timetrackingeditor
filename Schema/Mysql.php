<?php

namespace Kanboard\Plugin\Timetrackingeditor\Schema;

const VERSION = 1;

function version_1($pdo)
{
  $pdo->exec("ALTER TABLE subtask_time_tracking add comment TEXT");
  $pdo->exec("ALTER TABLE subtask_time_tracking add is_billable TINYINT");
}
