<?php namespace Anomaly\VariablesModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Field\FieldRouter;
use Anomaly\VariablesModule\Http\Controller\Admin\FieldsController;

/**
 * Class VariablesModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class VariablesModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Plugins provided by the addon.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\VariablesModule\VariablesModulePlugin',
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/variables'                                      => 'Anomaly\VariablesModule\Http\Controller\Admin\VariablesController@index',
        'admin/variables/edit/{id}'                            => 'Anomaly\VariablesModule\Http\Controller\Admin\VariablesController@edit',
        'admin/variables/groups'                               => 'Anomaly\VariablesModule\Http\Controller\Admin\GroupsController@index',
        'admin/variables/groups/create'                        => 'Anomaly\VariablesModule\Http\Controller\Admin\GroupsController@create',
        'admin/variables/groups/edit/{id}'                     => 'Anomaly\VariablesModule\Http\Controller\Admin\GroupsController@edit',
        'admin/variables/groups/assignments/{group}'           => 'Anomaly\VariablesModule\Http\Controller\Admin\AssignmentsController@index',
        'admin/variables/groups/assignments/{group}/choose'    => 'Anomaly\VariablesModule\Http\Controller\Admin\AssignmentsController@choose',
        'admin/variables/groups/assignments/{group}/create'    => 'Anomaly\VariablesModule\Http\Controller\Admin\AssignmentsController@create',
        'admin/variables/groups/assignments/{group}/edit/{id}' => 'Anomaly\VariablesModule\Http\Controller\Admin\AssignmentsController@edit',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\VariablesModule\Variable\Contract\VariableRepositoryInterface' => 'Anomaly\VariablesModule\Variable\VariableRepository',
    ];

    /**
     * Register the addon.
     *
     * @param FieldRouter $fields
     */
    public function register(FieldRouter $fields)
    {
        $fields->route($this->addon, FieldsController::class);
    }
}
