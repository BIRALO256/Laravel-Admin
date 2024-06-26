<?php

namespace App\Admin\Controllers;

use App\Models\room;
use App\Models\building;
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

        $form->text('name', __('Name'))->rules('required|min:4');

        $form->radio('avaliability', __('Avaliability'))->options([
            'Available' =>'Available',
            'Not available' =>'Not available',
        ])->rules('required');

        $buildings = Building::all()->pluck('name','id');//storing the  building got from the database in buldings varaible
        $form->select('building_id','select Building')->options($buildings);

        $form->number('price', __('Price'));
        $form->textarea('services', __('Services'));
        $form->textarea('details', __('Details'));

        $form->confirm('Are you sure you want to save this page?', 'edit');
        
        // $form->text('Biralo', 'label')->rules('required|min:10');

        $form->tools(function (Form\Tools $tools) { // if you want to control the tools on your page

            // Disable `List` btn.
            // $tools->disableList();
        
            // Disable `Delete` btn.
            $tools->disableDelete();
        
            // Disable `Veiw` btn.
            // $tools->disableView();
        
            // Add a button, the argument can be a string, or an instance of the object that implements the Renderable or Htmlable interface
            $tools->add('<a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;jovic</a>');
        });
        


        
                $form->footer(function ($footer) {

                    // disable reset btn
                    $footer->disableReset();

                    // disable submit btn
                    // $footer->disableSubmit();

                    // disable `View` checkbox
                    

                    // disable `Continue editing` checkbox
                    $footer->disableEditingCheck();

                    // disable `Continue Creating` checkbox
                    $footer->disableCreatingCheck();

                });


                
        return $form;
    }
}
