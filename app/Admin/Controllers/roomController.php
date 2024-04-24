<?php

namespace App\Admin\Controllers;

use App\Models\room;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class roomController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Room';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new room());

        // $grid->column('id', __('Id'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        $grid->column('name', __('Name'));
        $grid->column('avaliability', __('Avaliability'));
        $grid->column('price', __('Price'));
        $grid->column('services', __('Services'));
        $grid->column('details', __('Details'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(room::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('avaliability', __('Avaliability'));
        $show->field('price', __('Price'));
        $show->field('services', __('Services'));
        $show->field('details', __('Details'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new room());

        $form->textarea('name', __('Name'));
        $form->text('avaliability', __('Avaliability'));
        $form->number('price', __('Price'));
        $form->textarea('services', __('Services'));
        $form->textarea('details', __('Details'));

        $form->tools(function (Form\Tools $tools) {

            // Disable `List` btn.
            // $tools->disableList();
        
            // Disable `Delete` btn.
            $tools->disableDelete();
        
            // Disable `Veiw` btn.
            // $tools->disableView();
        
            // Add a button, the argument can be a string, or an instance of the object that implements the Renderable or Htmlable interface
            // $tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;delete</a>');
        });
        


        return $form;
    }
}
