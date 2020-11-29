<?php

namespace App\Http\Controllers;

use App\Article;
use App\Shade;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = [];
        $categories = [];
        if($request->has('article_no')){
            return Article::where('article_no',$request->article_no)->first();
        }
        return view('v1.colorpro.company.article',compact('units','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'article_no'            => 'required | unique:articles',
            'customer_id'           => 'required|numeric',
        ]);
        $article = new Article;
        $article->company_id                = $request->val;
        $article->article_no                = $request->article_no;
        $article->customer_id               = $request->customer_id;
        $article->weight_factor             = $request->weight_factor;
        $article->desc                      = $request->desc;
        $article->assortment_yn             = $request->assortment_yn;
        $article->tkt                       = $request->tkt;
        $article->length                    = $request->length;
        $article->carton_no                 = $request->carton_no;
        $article->clu                       = $request->clu;
        $article->clu_per_carton            = $request->clu_per_carton;
        $article->no_box                    = $request->no_box;
        $article->no_carton                 = $request->no_carton;
        $article->no_tube_per_box           = $request->no_tube_per_box;
        $article->thread_qlty               = $request->thread_qlty;
        $article->gauge                     = $request->gauge;
        $article->min_lenhth                = $request->min_lenhth;
        $article->max_length                = $request->max_length;
        $article->weight                    = $request->weight;
        $article->color                     = $request->color;
        $article->count                     = $request->count;
        $article->thread_type               = $request->thread_type;
        $article->no_of_cop_per_tray        = $request->no_of_cop_per_tray;
        $article->no_cops_per_tray_line     = $request->no_cops_per_tray_line;
        $article->per_shift_production      = $request->per_shift_production;
        $article->box_per_g2y               = $request->box_per_g2y;
        $article->no_of_spindle             = $request->no_of_spindle;
        $article->grey_yarn_no              = $request->grey_yarn_no;
        $article->billing_name              = $request->billing_name;
        $article->count1                    = $request->count1;
        $article->wbc                       = $request->wbc;
        $article->save();

        return response(['message' => 'successfully saved'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'article_no'            => 'required',
            'id'                    => 'required|numeric',
            'customer_id'           => 'required|numeric',
        ]);
        $article->company_id                = $request->val;
        $article->article_no                = $request->article_no;
        $article->customer_id               = $request->customer_id;
        $article->weight_factor             = $request->weight_factor;
        $article->desc                      = $request->desc;
        $article->assortment_yn             = $request->assortment_yn;
        $article->tkt                       = $request->tkt;
        $article->length                    = $request->length;
        $article->carton_no                 = $request->carton_no;
        $article->clu                       = $request->clu;
        $article->clu_per_carton            = $request->clu_per_carton;
        $article->no_box                    = $request->no_box;
        $article->no_carton                 = $request->no_carton;
        $article->no_tube_per_box           = $request->no_tube_per_box;
        $article->thread_qlty               = $request->thread_qlty;
        $article->gauge                     = $request->gauge;
        $article->min_lenhth                = $request->min_lenhth;
        $article->max_length                = $request->max_length;
        $article->weight                    = $request->weight;
        $article->color                     = $request->color;
        $article->count                     = $request->count;
        $article->thread_type               = $request->thread_type;
        $article->no_of_cop_per_tray        = $request->no_of_cop_per_tray;
        $article->no_cops_per_tray_line     = $request->no_cops_per_tray_line;
        $article->per_shift_production      = $request->per_shift_production;
        $article->box_per_g2y               = $request->box_per_g2y;
        $article->no_of_spindle             = $request->no_of_spindle;
        $article->grey_yarn_no              = $request->grey_yarn_no;
        $article->billing_name              = $request->billing_name;
        $article->count1                    = $request->count1;
        $article->wbc                       = $request->wbc;
        $article->save();

        return response(['message' => 'successfully Updated'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
