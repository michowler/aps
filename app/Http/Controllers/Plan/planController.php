<?php

namespace App\Http\Controllers\plan;

use Auth;
use DB;
use App\plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\payments;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;


class planController extends Controller
{
    public function index(){
    	return view('owner.upgrade');
    }

    public function  checkout(){
    	return view ('payment.create');
    }

    private $_api_context;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
            ));
        $this->_api_context->setConfig($paypal_conf['settings']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $payments = new Payments;

        //     $payments -> amount = '100';
        //     $payments -> first_name =   $request ->first_name;
        //     $payments -> last_name  =   $request ->last_name;
        //     $payments -> billing_address    =   $request ->billing_address;
        //     $payments -> city   = $request ->city;
        //     $payments -> country    = $request ->country;
        //     $payments -> postal_code    = $request ->postal_code;
        //     $payments -> name_on_card   = $request ->name_on_card;
        //     $payments -> card_num   = $request ->card_num;
        //     $payments -> card_expiry    = $request ->card_expiry;
        //     $payments -> sec_code   = $request ->sec_code;
        //     $payments -> users_id = Auth::user() -> users_id;

        //     $payments -> save();

    }


    public function payWithpaypal(Request $request){

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item1 = new Item();
        $item1->setName('Premium Package')
            ->setCurrency('MYR')
            ->setQuantity(1)
            // ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice($request->get('amount'));

        $itemList = new ItemList();
        $itemList->setItems(array($item1));


        $amount = new Amount();
        $amount->setCurrency('MYR')
            ->setTotal($request->get('amount'));


        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Payment description');
            // ->setInvoiceNumber(uniqid());

        // $baseUrl = getBaseUrl();
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status'))
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        // $request = clone $payment;

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if(\Config::get('app.debug')){

                \Session::put('error','Connection timeout');
                return Redirect::route('/create');

            }else{

                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('/create');

            }
        }

        // $approvalUrl = $payment->getApprovalLink();

        // ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url'){

                $redirect_url = $link->getHref();
                break;

            }
        }

        Session::put('paypal_payment_id',$payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('/create');


    }

        public function getPaymentStatus(){

             $payment_id = Session::get('paypal_payment_id');

             Session::forget('paypal_payment_id');

             if (empty(Input::get('PayerID')) || empty(Input::get('token'))){
                \Session::put('error','Payment failed');
                return Redirect::route('/create');
             }


                $payment = Payment::get($paymentId, $this->_api_context);

                $execution = new PaymentExecution();
                $execution->setPayerId(Input::get('PayerID'));

                $result = $payment -> execute($execution, $this -> _api_context);

                if($result -> getState() == 'approved'){

                    \Session::put('success', 'Payment success');
                    return Redirect::route('/create');

                }

                \Session::put('error','Payment failed');
                return Redirect::route('/create');

        }


}
