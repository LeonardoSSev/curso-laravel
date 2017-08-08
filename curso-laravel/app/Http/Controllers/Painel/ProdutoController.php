<?php

namespace App\Http\Controllers\Painel;

use App\Http\Requests\Painel\ProductFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Listagem dos Produtos";
        $products = $this->product->all();
        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar Novo Produto";
        $category = ['eletronicos', 'moveis','limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        //dd($request->all());
        //dd($request->only('nome'));
        //dd($request->except('_token', 'category'));

        //pegando valores do form
        $dataForm = $request->all();
        $dataForm['active'] = (!isset($dataForm['active']) == '' ) ? 1 : 0;

        //validando dados
        //$this->validate($request, $this->product->rules);
        /*
        $messages = [
            'name.required'         => 'O campo nome é de preenchimento obrigatório!',
            'name.min'              => 'O campo nome deve ser preenchido pelo menos com 3 caracteres!',
            'name.max'              => 'O campo nome deve ser preenchido com no máximo 100 caracteres!',
            'number.required'       => 'O campo número é de preenchimento obrigatório!',
            'number.numeric'        => 'O campo número deve ser preenchido somente com números!',
            'category.required'     => 'O campo categoria é de preenchimento obrigatório!',
            'description.min'       => 'O campo de descrição, se preenchido, deve conter pelo menos 3 caracteres!',
            'description.max'       => 'O campo de descrição, se preenchido, deve conter até 1000 caracteres!'
        ];
        $validate = validator($dataForm, $this->product->rules, $messages);
        if($validate->fails()){
            return redirect()
                ->route('produtos.create')
                ->withErrors($validate)
                ->withInput();
        }
    */

        //cadastrando no banco
        $insert = $this->product->create($dataForm);

        if ($insert)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.create');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        $category = ['eletronicos', 'moveis','limpeza', 'banho'];

        $title = "Editando produto $product->name";


        return view('painel.products.create-edit', compact('product', 'title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "Editando produto $id";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests(){

        /*

        $prod = $this->product;
        $prod->name = 'Nome do produto';
        $prod->number = '12312';
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Description do produto';
        $insert = $prod->save();

        if($insert){
            return "Produto cadastrado com sucesso";
        } else{
            return "Produto não foi cadastrado";
        }
        */

        /*
        $insert = $this->product->create([
                        'name'          => 'Nome do produto 2',
                        'number'        => 1234,
                        'active'        => true,
                        'category'      => 'eletronicos',
                        'description'   => 'Descriçao do produto'
        ]);

        if($insert){
            return "Produto cadastrado com sucesso. Id = {$insert->id}";
        } else{
            return "Produto não foi cadastrado";
        }
        */

        /*
        $prod = $this->product->find(5);
        $prod->name = 'Update';
        $prod->number = '12312';
        $update = $prod->save();

        if ($update){
            return "Atualizado com sucesso";
        } else{
            return "Erro ao atualizar";
        }
        */

        /*

        $prod = $this->product->find(6);
        $update = $prod->update([
                        'name'          => 'Update true',
                        'number'        => 1,
                        'active'        => false
        ]);

        if ($update){
            return "Atualizado com sucesso";
        } else{
            return "Erro ao atualizar";
        }

        */

        /*
        $update = $this->product
                      ->where('number', 1)
                      ->update([
                                'name'          => 'Update test',
                                'number'        => 5,
                                'active'        => true
                                ]);

        if ($update){
            return "Atualizado com sucesso";
        } else{
            return "Erro ao atualizar";
        }
        */

        $delete = $this->product
                        ->where('number', 12312)
                        ->delete();

        if($delete){
            return "Deletado com sucesso";
        } else{
            return "Falha ao deletar";
        }
    }
}
