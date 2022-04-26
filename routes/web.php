<?php



use Illuminate\Support\Facades\Route;



use App\Models\Produto;
use Illuminate\Http\Request;



Route::get('/', function () {
    return view('Inicio');

});


Route::post('/cadastrar-produto', function (Request $request){



    Produto::create([

        'nome' => $request ->nome,
        'valor' => $request ->valor,
        'estoque' => $request ->estoque

    ]);

    echo "Produto criado com sucesso";

});

Route::get('/listar-produto/{id})', function($id){
    $produto= Produto::find($id);
    return view('listar',['produto' => $produto]);

});

Route::get('/editar-produto/{id})', function($id){
    $produto= Produto::find($id);
    return view('editar',['produto' => $produto]);
});

Route::get('/editar-produto/{id})', function(Request $request, $id){
    $produto = Produto::find($id);

    $produto->update([
        'nome' => $request->nome,
        'valor' => $request->valor,
        'estoque' => $request->estoque
    ]);

    echo "Produto editado com sucesso!";
}); 

Route::get('/excluir-produto/{id})', function($id){
    $produto= Produto::find($id);
    $produto->delete();

    echo "Produto excluido com sucesso!";
});