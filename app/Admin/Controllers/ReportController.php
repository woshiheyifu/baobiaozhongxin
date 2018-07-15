<?php

namespace App\Admin\Controllers;

use App\Model\Report;

use App\Model\ReportCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ReportController extends Controller
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

            $content->body($this->form()->edit($id));
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
        return Admin::grid(Report::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->reportCategory()->name('分类');
            $grid->img_url('图片')->image('',100,100);
            $grid->description('描述')->style('width:500px');
            $grid->created_at('创建时间')->style('width:100px');
            $grid->updated_at('修改时间')->style('width:100px');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Report::class, function (Form $form) {

            $form->text('title', '标题');
            $form->textarea('description', '描述')->rules('nullable');
            $form->file('file_url', '文件');
            $form->multipleImage('img_url','图片')->rules('max:1024')->help('首页图请放在第一位')->removable();
            $form->select('category_id', '分类')->options('/admin/getReportCategory')->options(function ($id){
                if ($id){
                    $category = ReportCategory::find($id);
                    if ($category){
                        return  [$category->id=>$category->name];
                    }
                }else{
                    return [0=>'无'];
                }
            });
        });
    }
}
