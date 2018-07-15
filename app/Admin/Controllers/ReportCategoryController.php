<?php

namespace App\Admin\Controllers;

use App\Model\ReportCategory;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ReportCategoryController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form($id)->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(ReportCategory::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('名称');
            $grid->note('备注');
            $grid->column('所属分类')->display(function (){
                $data = ReportCategory::find($this->parent_id);
                if ($data['name']){
                    return $data['name'];
                }else{
                    return '无';
                }

            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id=0)
    {
        return Admin::form(ReportCategory::class, function (Form $form) use ($id) {

            $form->text('name', '名称');
            $form->text('note', '');
            $form->select('parent_id', '所属分类')
                ->setWidth(2)
                ->options("/admin/getReportCategory/$id/!=")
                ->options(function () {
                    return [0 => '无'];
                });
        });
    }
}
