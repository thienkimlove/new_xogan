<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailsController extends AdminController
{

    public $model = 'details';

    public $validator = [
        'status' => 'required',
    ];
    private function init()
    {
        return '\\App\\' . ucfirst(str_singular($this->model));
    }
    public function index(Request $request)
    {

        $searchContent = null;
        $searchCate = null;
        $modelClass = $this->init();

        $customUrl = '/admin/details';

        $contents = $modelClass::latest('created_at');
        if ($request->input('q')) {
            $searchContent = urldecode($request->input('q'));
            $contents = $contents->where('name', 'LIKE', '%'. $searchContent. '%');
            $customUrl .= '&q='.$request->input('q');
        }

        $contents = $contents->paginate(10);
        $contents->setPath($customUrl);

        return view('admin.'.$this->model.'.index', compact('contents', 'searchContent', 'searchCate'))->with('model', $this->model);
    }

    public function create()
    {
        $modelClass = $this->init();
        $content = new $modelClass;
        return view('admin.'.$this->model.'.form', compact('content'))->with('model', $this->model);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validator);
        if ($validator->fails()) {
            return redirect('admin/'.$this->model.'/create')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();

        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'));
        } else {
            unset($data['image']);
        }


        $modelClass = $this->init();
        $content = $modelClass::create($data);

        flash()->success('Success created!');
        return redirect('admin/'.$this->model);
    }
    public function edit($id)
    {
        $modelClass = $this->init();
        $content = $modelClass::find($id);
        return view('admin.'.$this->model.'.form', compact('content'))->with('model', $this->model);
    }
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), $this->validator);
        if ($validator->fails()) {
            return redirect('admin/'.$this->model.'/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $modelClass = $this->init();
        $content = $modelClass::find($id);
        $data = $request->all();
        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'), $content->image);
        } else {
            unset($data['image']);
        }
        $content->update($data);

        flash()->success('Success edited!');
        return redirect('admin/'.$this->model);
    }
    public function destroy($id)
    {
        $modelClass = $this->init();
        $content = $modelClass::find($id);
        $content->delete();
        flash()->success('Success Deleted!');
        return redirect('admin/'.$this->model);
    }
}
