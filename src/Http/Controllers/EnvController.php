<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 19.07.16
 * Time: 06:17
 */

namespace Brotzka\DotenvEditor\Http\Controllers;

use Brotzka\DotenvEditor\DotenvEditor as Env;
use Brotzka\DotenvEditor\Exceptions\DotEnvException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class EnvController extends BaseController
{
    protected $env;
    /**
     * [__construct description]
     *
     * @param Env $env DotenvEditor
     */
    public function __construct(Env $env)
    {
        $this->env = $env;
    }

    /**
     * Shows the overview, where you can visually edit your .env-file.
     *
     * @param Request $request request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function overview(Request $request)
    {
        $data['values'] = $this->env->getContent();
        //$data['json'] = json_encode($data['values']);
        try {
            $data['backups'] = $this->env->getBackupVersions();
        } catch (DotEnvException $e) {
            $data['backups'] = false;
        }

        $data['url'] = $request->path();
        return view(config('dotenveditor.overview'), $data);
    }

    /**
     * Adds a new entry to your .env-file.
     *
     * @param Request $request request
     *
     * @return none
     */
    public function add(Request $request)
    {
        $this->env->addData(
            [
                $request->key => $request->value,
            ]
        );
        return response()->json([]);
    }

    /**
     * Updates the given entry from your .env.
     *
     * @param Request $request request
     *
     * @return void
     */
    public function update(Request $request)
    {
        $this->env->changeEnv(
            [
                $request->key => $request->value,
            ]
        );
        return response()->json([]);
    }

    /**
     * Returns the content as JSON
     *
     * @param null $timestamp timespamp
     *
     * @return string
     */
    public function getDetails($timestamp = null)
    {
        return $this->env->getAsJson($timestamp);
    }

    /**
     * Creates a backup of the current .env.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createBackup()
    {
        $this->env->createBackup();
        return back()->with('dotenv', trans('dotenv-editor::views.controller_backup_created'));
    }

    /**
     * Delete Backup
     *
     * @param string $timestamp timestamp
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBackup($timestamp)
    {
        $this->env->deleteBackup($timestamp);
        return back()->with('dotenv', trans('dotenv-editor::views.controller_backup_deleted'));
    }

    /**
     * Restore a backup
     *
     * @param void $backuptimestamp backuptimestamp
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($backuptimestamp)
    {
        $this->env->restoreBackup($backuptimestamp);
        return redirect(config('dotenveditor.route.prefix'));
    }

    /**
     * Deletes the given entry from your .env-file
     *
     * @param Request $request request
     *
     * @return void
     */
    public function delete(Request $request)
    {
        $this->env->deleteData([$request->key]);
    }

    /**
     * Lets you download the choosen backup-file.
     *
     * @param bool $filename filename
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($filename = false)
    {
        if ($filename) {
            $file = $this->env->getBackupPath() . $filename . '_env';
            return response()->download($file, $filename . '.env');
        }
        return response()->download(base_path('.env'), '.env');
    }

    /**
     * Upload a .env-file and replace the current one
     *
     * @param Request $request request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function upload(Request $request)
    {
        $file = $request->file('backup');
        $file->move(base_path(), '.env');
        return redirect(config('dotenveditor.route.prefix'));
    }
}
