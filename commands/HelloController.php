<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionSentryDebug()
    {
        \Sentry\init(['dsn' => 'https://39b4f102ecec4cdd81d1465cd886325e@o1021769.ingest.sentry.io/6158295']);

        try {
            $this->functionFailsForSure();
        } catch (\Throwable $exception) {
            \Sentry\captureException($exception);
            echo "Done Send to Sentry \n";
        }
    }
}
