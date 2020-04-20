<span class="subtask-time-tracking">
    <?php if (! empty($subtask['time_spent'])): ?>
        <?= t('%sh spent', n($subtask['time_spent'])) ?>
    <?php endif ?>

    <?php if (! empty($subtask['time_spent']) && ! empty($subtask['time_estimated'])): ?>/<?php endif ?>

    <?php if (! empty($subtask['time_estimated'])): ?>
        <?= t('%sh estimated', n($subtask['time_estimated'])) ?>
    <?php endif ?>

    <?php if ($this->user->hasProjectAccess('SubtaskController', 'edit', $task['project_id']) && $subtask['user_id'] == $this->user->getId()): ?>
        <?= $this->subtask->renderTimer($task, $subtask) ?>
        <?= $this->modal->medium("clock-o", t('New'), 'TimeTrackingEditorController',
                'create', array(
                        'plugin' => 'Timetrackingeditor',
                        'task_id' => $task['id'],
                        'project_id' => $task['project_id'],
                        'subtask_id' => $subtask['id'])) ?>

    <?php endif ?>
</span>
