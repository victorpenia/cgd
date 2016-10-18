<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BankAccountRepository;
use App\Http\Requests;
use App\Http\Requests\BankAccountRequest;
use App\Bank;
use App\BankAccount;
class BankAccountsController extends Controller
{
    protected $bank_accounts;
    
    public function __construct(BankAccountRepository $bank_accounts) {
        $this->bank_accounts = $bank_accounts;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bank_id)
    {
        $bank = Bank::find($bank_id);
        return view('bankAccounts.index')
            ->with('bank_accounts', $this->bank_accounts->getbankAccountforBank($bank_id))
            ->with('bank', $bank)
            ->with('bank_id', $bank_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($bank_id)
    {
        $bank = Bank::find($bank_id);
        return view('bankAccounts.create')
                ->with('bank', $bank)
                ->with('bank_id', $bank_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountRequest $request, $bank_id)
    {
        $bank_account = new BankAccount($request->all());
        $bank_account->user_id = \Auth::user()->id;
        $bank_account->bank_id = $bank_id;
        $bank_account->save();
        
        flash('La cuenta bancaria '.  $bank_account->number_account . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('bankAccounts.index', $bank_id);
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
    public function edit($bank_id, $id)
    {
        $bank = Bank::find($bank_id);
        $bank_account = BankAccount::find($id);
        return view('bankAccounts.edit')
                ->with('bank', $bank)
                ->with('bank_id', $bank_id)
                ->with('bank_account', $bank_account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankAccountRequest $request, $id)
    {
        $bank_account = BankAccount::find($id);
        $bank_account->fill($request->all());
        $bank_account->user_id = \Auth::user()->id;
        $bank_account->save();
        
        flash('La cuenta bancaria ' . $bank_account->number_account . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('bankAccounts.index', $bank_account->bank_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bank_id, $id)
    {
        $bank_account = BankAccount::find($id);
        $bank_account->delete();
        
        flash('La cuenta bancaria '.  $bank_account->number_account . ' ha sido eliminado de forma exitosa!', 'danger')->important();
        return redirect()->route('bankAccounts.index', $bank_id);
    }
}
