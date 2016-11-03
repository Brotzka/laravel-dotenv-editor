<?php
/**
 * Created by PhpStorm.
 * User: Fabian
 * Date: 19.07.16
 * Time: 06:17
 */

namespace Brotzka\DotenvEditor\Http\Controller;

use Brotzka\DotenvEditor\Exceptions\DotEnvException;
use Illuminate\Routing\Controller as BaseController;

use Brotzka\DotenvEditor\DotenvEditor as Env;
use Brotzka\DotenvEditor\Exceptions\DotEnvExeption;
use Illuminate\Http\Request;

class EnvController extends BaseController
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Shows the overview, where you can visually edit your .env-file.
     */
    public function overview(Request $request)
    {
        $env = new Env();
        $data['values'] = $env->getContent();
        //$data['json'] = json_encode($data['values']);
        try{
            $data['backups'] = $env->getBackupVersions();
        } catch(DotEnvException $e){
            $data['backups'] = false;
        }

        $data['url'] = $request->path();
        return view('dotenv-editor::overview', $data);
    }

    /**
     * @param Request $request
     *
     * Adds a new entry to your .env-file.
     */
    public function add(Request $request)
    {
        $env = new Env();
        $env->addData([
            $request->key   => $request->value,
        ]);
    }

    /**
     * @param Request $request
     *
     * Updates the given entry from your .env.
     */
    public function update(Request $request)
    {
        $env = new Env();
        $env->changeEnv([
            $request->key => $request->value
        ]);
    }

    /**
     * @param null $timestamp
     * @return string
     *
     * Returns the content as JSON
     */
    public function getDetails($timestamp = NULL)
    {
        $env = new Env();
        return $env->getAsJson($timestamp);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     *
     * Creates a backup of the current .env.
     */
    public function createBackup()
    {
        $env = new Env();
        $env->createBackup();
        return back()->with('dotenv', trans('dotenv-editor::views.controller_backup_created'));
    }

    /**
     * @param $timestamp
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBackup($timestamp)
    {
        $env = new Env();
        $env->deleteBackup($timestamp);
        return back()->with('dotenv', trans('dotenv-editor::views.controller_backup_deleted'));
    }

    /**
     * @param $backuptimestamp
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * Restore a backup
     */
    public function restore($backuptimestamp)
    {
        $env = new Env();
        $env->restoreBackup($backuptimestamp);
        return redirect(config('dotenveditor.route'));
    }

    /**
     * @param Request $request
     *
     * Deletes the given entry from your .env-file
     */
    public function delete(Request $request)
    {
        $env = new Env();
        $env->deleteData([$request->key]);
    }

    /**
     * @param bool $filename
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     *
     * Lets you download the choosen backup-file.
     */
    public function download($filename = false)
    {
        $env = new Env();
        if($filename){
            $file = $env->getBackupPath() . $filename . "_env";
            return response()->download($file, $filename . ".env");
        }
        return response()->download(base_path() . "/.env", ".env");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * Upload a .env-file and replace the current one
     */
    public function upload(Request $request)
    {
        $file = $request->file('backup');
        $file->move(base_path(), ".env");
        return redirect(config('dotenveditor.route'));
    }
}
