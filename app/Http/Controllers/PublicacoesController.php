<?php

namespace App\Http\Controllers;

use App\Publicacao;
use App\Categoria;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


/**
 * Class PublicacoesController
 * @package App\Http\Controllers
 */
class PublicacoesController extends Controller
{

    /**
     * @var Publicacao
     */
    /**
     * @var Publicacao|User
     */
    /**
     * @var Categoria|Publicacao|User
     */
    private $publicacao, $user, $categoria;

    /**
     * PublicacoesController constructor.
     * @param Publicacao $publicacao
     * @param User $user
     * @param Categoria $categoria ]
     */

    public function __construct(Publicacao $publicacao, User $user, Categoria $categoria)
    {
        //obriga esta logado
        $this->middleware('auth');

        $this->publicacao = $publicacao;
        $this->user = $user;
        $this->categoria = $categoria;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $publicacao = Publicacao::where('situacao', '=', 1)->get();

        return view('publicacoes.index', ['publicacao' => $publicacao]);

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $publicacao = Publicacao::get();

        $list_user = $this->user->listUser();

        $list_categoria = $this->categoria->listCategoria();

        return view('publicacoes.create', compact('publicacao', 'list_user', 'list_categoria', 'userarquivo'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        if (blank($request->arquivo)) {
            return redirect()->action('PublicacoesController@controle')->with('error', 'Nenhum arquivo foi enviado.');

        }

        $publicacao = Publicacao::create($request->all());




        //verifica se o input arquivo esta preechido

        if ($request->hasFile('capa')) {
            $path = $request->capa->store('/capas');
            $ext = $request->capa->getMimeType();
            //Validar extensao do arquivo
          /*  if ($ext == 'image/jpeg' && 'image/jpg'){
                dd($path);
            }else{
                dd($ext);

            }*/
            $publicacao->capa = $path;
            $publicacao->save();

        }
        if ($request->hasFile('arquivo')) {
            $path = $request->arquivo->store('/arquivos');
            $ext = $request->arquivo->getClientOriginalExtension();
            $publicacao->arquivo = $path;
            $publicacao->save();
        }

        if ($publicacao) {
            return redirect()->action('PublicacoesController@controle')->with('sucesso', 'Publicação Salva!');
        }

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $tipousuario = auth()->user()->tipousuario;

        $publicacao = $this->publicacao;
        if ($tipousuario != 0) {
            $publicacao = $publicacao->where('publicacoes.userid', '=', auth()->user()->id)
                ->orderBy('situacao', 'asc')
                ->simplePaginate(100);
            return view('publicacoes.controle', compact('publicacao'));
        }
        $publicacao = $publicacao->orderBy('situacao', 'asc')->get();
        return view('admin.home', compact('publicacao'));
    }


    /**
     * @param Publicacao $publicacao
     * @return array
     */
    public function show(Publicacao $publicacao)
    {
        $limite = $this->publicacao->limite();
        return (compact('limite'));

    }


    /**
     * @param Publicacao $publicacao
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Publicacao $publicacao, $id)
    {
        $list_user = $this->user->listUser();
        $list_categoria = $this->categoria->listCategoria();
        $publicacao = Publicacao::find($id);
        return view('publicacoes.edit', compact('publicacao', 'list_user', 'list_categoria', 'userarquivo'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $publicacao = Publicacao::find($id);
        $file = $request->hasFile('arquivo');
        if ($file != "") {
            unlink(public_path('uploads/' . $publicacao->arquivo));
            $publicacao->delete();
            $path = $request->arquivo->store('/arquivos');
            $publicacao->arquivo = $path;
        }
        $publicacao->update($request->all());
        $publicacao->save();

        if ($publicacao) {
            return redirect()->action('PublicacoesController@controle')->with('sucesso', 'Publicação Atualizada!!');
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $publicacao = Publicacao::find($id);

        if ($publicacao->arquivo) {
            unlink(public_path('uploads/' . $publicacao->arquivo));
            $publicacao->delete();
        }

        $publicacao->delete();

        if ($publicacao) {
            return redirect()->action('PublicacoesController@controle')->with('sucesso', 'Publicação Excluida!');
        }
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function controle()
    {
        $tipousuario = auth()->user()->tipousuario;
        $publicacao = $this->publicacao;

        if ($tipousuario != 0) {
            $publicacao = $publicacao->where('publicacoes.userid', '=', auth()->user()->id)
                ->orderBy('situacao', 'asc')
                ->orderBy('created_at', 'desc');
        }

        $publicacao = $publicacao->orderBy('situacao', 'asc')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(6);
        return view('publicacoes.controle', compact('publicacao'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $pesquisa = $request->pesquisar;

        $publicacao = Publicacao::pesquisa($request->pesquisar);

        if ($publicacao == true) {

            $publicacao = Publicacao::orderBy('created_at', 'asc')->simplePaginate(6);

            return view('publicacoes/search', compact('publicacao', 'pesquisa'));
        } else {
            return redirect()->action('PublicacoesController@Controle')
                ->with("mensagem", "Resource not found");
        }

    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

}
